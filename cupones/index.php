<?php
    include_once "../app/config.php";
    include "../layouts/Authentication.templade.php";
    include("../app/CouponesController.php");

    $couponesController = new CouponesController();
    $coupones = $couponesController->GetCoupones();

?>
<!DOCTYPE html>
<head>
    <title>Catalogos</title>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <?php include "../layouts/head.template.php" ?>
</head>
<body>
    <!-- NAVAR -->
    <?php include "../layouts/nav.template.php" ?>
    <!-- SIDEBAR -->
    <?php include "../layouts/side.template.php" ?>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid" >
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Cupones</h4>
                        </div>
                    </div>
                </div><!-- Buttons with Label -->
                <button class="btn btn-primary btn-label waves-effect waves-light mb-3" data-bs-target="#añadirCouponModal" data-bs-toggle="modal" type="button" id="add-btn"><i class="bx bx-plus label-icon align-middle fs-16 me-2"></i> Añadir cupon</button>
                <div class="container-fluid text-center">
                    <div class="justify-content-center row row-cols-1 row-cols-lg-5 g-3 g-lg-3" >
                        
                            <?php foreach ($coupones as $coupon): ?>
                                <div class="card card-primary m-1" style="width:600px;">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0"><img alt="" class="avatar-md" src="../public/assets/images/cupones.png"></div>
                                            <div class="flex-grow-1 ms-3">
                                                <h5 class="card-title"><?= $coupon->name ?></h5>
                                                <h3 class="text-muted"><?= $coupon->code ?></h3>
                                                <p class="text-muted">fecha de lanzamiento</p>
                                                <p class="text-muted"><?= $coupon->start_date ?></p>  
                                                <p class="text-muted">fecha de caducidad</p>
                                                <p class="text-muted"><?= $coupon->end_date ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <!-- Border Buttons -->
                                        <div class="hstack flex-wrap justify-content-center gap-2 mb-3 mb-lg-0">
                                            <a href="<?= BASE_PATH ?>cupon/<?= $coupon->id ?>" class="btn  btn-success btn-border">Ver</a>

                                            <button data-coupon='<?= json_encode($coupon) ?>' onclick="editar_cupon(this)" class="btn  btn-warning btn-border" data-bs-target="#añadirCouponModal" data-bs-toggle="modal" id="edit-btn">Editar</button> 

                                            <button onclick="eliminar_cupon(<?= $coupon->id ?>)" class="btn  btn-danger btn-border">Eliminar</button>

                                            <input type="hidden" id="super_token" value="<?= $_SESSION['super_token']?>">
                                            <input type="hidden" id="bp" value="<?= BASE_PATH ?>">
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div><!-- Footer de la pagina -->
        <?php include "../layouts/footer.template.php" ?>
        <!-- MODAL DE AÑADIR Y EDITAR -->
        <div class="modal fade" id="añadirCouponModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="añadirModalLabel">Introduzca los datos</h5><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                    </div>
                    <form method="POST" action="<?= BASE_PATH?>cuponc" enctype="multipart/form-data" id="coupon_form">
                        <div class="modal-body">

                            <span class="input-group-text">Nombre</span>
                            <input class="form-control" id="name" name="name" type="text" required placeholder="...">

                            <span class="input-group-text">Codigo</span>
                            <input class="form-control" id="code" name="code" type="text" required  placeholder="0000">

                            <span class="input-group-text">Porcentaje de descuento</span>
                            <input class="form-control" id="percentage_discount" name="percentage_discount" type="text" required placeholder="50">

                            <span class="input-group-text">Monto minimo requerido</span>
                            <input class="form-control" id="min_amount_required" name="min_amount_required" type="text" required placeholder="100">

                            <span class="input-group-text">Monto minimo de productos</span>
                            <input class="form-control" id="min_product_required" name="min_product_required" type="text" required placeholder="2">

                            <span class="input-group-text">Fecha de inicio</span>
                            <input class="form-control" id="start_date" name="start_date" type="date" required>

                            <span class="input-group-text">Fecha de vencimiento</span>
                            <input class="form-control" id="end_date" name="end_date" type="date" required>

                            <span class="input-group-text">Cantidad maxima de usos</span>
                            <input class="form-control" id="max_uses" name="max_uses" type="text" required placeholder="10">
                            
                            <!-- Solo en editar -->
                            <span class="input-group-text" id="label_count_uses">Cantidad de usos</span>
                            <input class="form-control" id="count_uses" name="count_uses" type="text">

                            <span class="input-group-text">Valido unicamente en la primera compra?</span>
                            <input class="form-control" id="valid" name="valid" type="text" value="1">

                            <!-- Solo en editar -->
                            <span class="input-group-text" id="label_status">Estado</span>
                            <input class="form-control" id="estado" name="status" type="text">
                            
                            <input id="action" id="name" name="action" type="hidden" value="create">
                            <input type="hidden" name="coupon_id" id="coupon_id" value="">
                            <input type="hidden" name="super_token" id="super_token" value="<?= $_SESSION['super_token'] ?>">

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Cancelar</button>
                            <button class="btn btn-primary" type="submit">Guardar cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- JAVASCRIPT -->
        <?php include "../layouts/scripts.template.php" ?>
        <script>
            let coupon_form = document.getElementById("coupon_form")
            let add_btn = document.getElementById("add-btn")
            let edit_btn = document.getElementById("edit-btn")

            let name = document.getElementById("name")
            let code = document.getElementById("code")
            let percentage_discount = document.getElementById("percentage_discount")
            let min_amount_required = document.getElementById("min_amount_required")
            let min_product_required = document.getElementById("min_product_required")
            let start_date = document.getElementById("start_date")
            let end_date = document.getElementById("end_date")
            let max_uses = document.getElementById("max_uses")

            let label_count_uses = document.getElementById("label_count_uses")
            let count_uses = document.getElementById("count_uses")
            let coupon_id = document.getElementById("coupon_id")

            let valid = document.getElementById("valid")

            let label_status = document.getElementById("label_status")
            let status = document.getElementById("estado")

            let action = document.getElementById("action")
            let super_token = document.getElementById("super_token")

            add_btn.addEventListener('click', () => {
                label_count_uses.style.display = "none"
                count_uses.style.display = "none"

                label_status.style.display = "none"
                status.style.display = "none"
            });

            edit_btn.addEventListener('click', () => {
                label_count_uses.style.display = "block"
                count_uses.style.display = "block"

                label_status.style.display = "block"
                status.style.display = "block"
            });

            coupon_form.addEventListener("submit", (e) => {
                e.preventDefault();

                const data = new FormData();
                data.append("name", name.value);
                data.append("code", code.value);
                data.append("percentage_discount", percentage_discount.value);
                data.append("min_amount_required", min_amount_required.value);
                data.append("min_product_required", min_product_required.value);
                data.append("start_date", start_date.value);
                data.append("end_date", end_date.value);
                data.append("max_uses", max_uses.value);
                data.append("count_uses", count_uses.value);
                data.append("valid", valid.value);
                data.append("status", status.value);
                data.append("coupon_id", coupon_id.value);
                data.append("action", action.value);
                data.append("super_token", super_token.value);

                var txt= /^[a-zA-Z0-9\s]+$/; // Letras y espacios, pueden llevar acentos
                var porcentaje= /^.{1,100}$/; // 4 a 12 digitos.
                ent=true;

                if(!txt.test(name.value) 
                    || !porcentaje.test(percentage_discount.value) 
                    || !porcentaje.test(min_product_required.value)
                    || !porcentaje.test(min_amount_required.value) 
                    || !txt.test(code.value)
                    || !porcentaje.test(max_uses.value) 
                    || valid.value != 1){
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Error en campos',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        ent=false;
                }
                if(ent){

                    axios({
                        method: "POST",
                        url: "../app/CouponesController.php",
                        data,
                        headers: {
                        "Content-Type": "multipart/form-data",
                        },
                    }).then((response)=> {
    
                        let res = JSON.stringify(response)
                        res = JSON.parse(res)
    
                        if (res.data[0].code > 0 && res.data.update == false) {
                            Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'Cupon añadido con exito',
                            showConfirmButton: false,
                            timer: 1500
                            })
                            function greet() {
                                location.reload();
                            }
                            setTimeout(greet, 1800);
                        } else if (res.data[0].code > 0 && res.data.update) {
                            Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'Cupon actualizado con exito',
                            showConfirmButton: false,
                            timer: 1500
                            })
                            function greet() {
                                location.reload();
                            }
                            setTimeout(greet, 1800);
                        } else {
                            console.log(response.message);
    
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Error',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        } 
                        }).catch((error) => {
                        if (error.response) {
                            console.log(error.message);
                        }
                        });
                }
            });

            function editar_cupon(target) {

                let coupon = JSON.parse( target.dataset.coupon )

                name.value = coupon.name
                code.value = coupon.code 
                percentage_discount.value = coupon.percentage_discount
                min_amount_required.value = coupon.min_amount_required
                min_product_required.value = coupon.min_product_required
                start_date.value = coupon.start_date
                end_date.value = coupon.end_date
                max_uses.value = coupon.max_uses
                count_uses.value = coupon.count_uses
                valid.value = coupon.valid_only_first_purchase
                status.value = coupon.status
                coupon_id.value = coupon.id
                action.value = 'update'

            }

            function eliminar_cupon(id) {
                
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                    let super_token = document.getElementById('super_token').value;
                    let base_path = document.getElementById('bp').value;

                    var bodyFormData = new FormData();
                    bodyFormData.append('id', id);
                    bodyFormData.append('action', 'delete');
                    bodyFormData.append('sprtoken', super_token);

                    axios.post('../app/CouponesController.php', bodyFormData)
                    .then(function (response) {

                        if (response.data) {
                            swal("Poof! Your imaginary file has been deleted!", {
                                icon: "success",
                            });
                            location.reload();
                        } else {
                            swal("Error", {
                                icon: "error",
                            });;
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

                    } else {
                    swal("Your imaginary file is safe!");
                    }
                });
            }

        </script>
    </div>
</body>
