<?php
    include_once "../app/config.php";
    include "../layouts/Authentication.templade.php";
    include ("../app/ClientsController.php");

    $id = $_GET['id'];

    $clientsController = new ClientsController();
    $client = $clientsController->SpecifictClient($id);
?>
<!doctype html>

<head>
    <meta charset="utf-8" />
    <title>Detalles</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <?php include "../layouts/head.template.php" ?>
</head>

<body>
    <!-- NAVAR -->
    <?php include "../layouts/nav.template.php" ?>
    <!-- SIDEBAR -->
    <?php include "../layouts/side.template.php" ?>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="profile-foreground position-relative mx-n4 mt-n4">
                    <div class="profile-wid-bg">
                        <img src="../public/assets/images/nft/bg-home.jpg" alt="" class="profile-wid-img" />
                    </div>
                </div>
                <div class="pt-4 ">
                    <div class="row g-4">
                        <!--end col-->
                        <div class="col-xxl-12">
                            <div class="p-2">
                                <h3 class="text-white mb-1"><?= $client->name ?></h3>
                                <p class="text-white-75">Nivel del cliente: <?= $client->level->name ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div>
                            <div class="tab-content pt-4 text-muted">
                                <div class="tab-pane active" id="overview-tab" role="tabpanel">
                                    <div class="row">
                                        <div class="col-xxl-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-3">Información</h5>
                                                    <div class="table-responsive">
                                                        <table class="table table-borderless mb-0">
                                                            <tbody>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Nombre Completo:</th>
                                                                    <td class="text-muted"><?= $client->name ?></td>
                                                                </tr>

                                                                <tr>
                                                                    <th class="ps-0" scope="row">E-mail:</th>
                                                                    <td class="text-muted"><?= $client->email ?></td>
                                                                </tr>

                                                                <tr>
                                                                    <th class="ps-0" scope="row">Numero de telefono</th>
                                                                    <td class="text-muted"><?= $client->phone_number ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <hr>
                                                        <h5 class="card-title mb-3">Widget total de compras</h5>
                                                        <table class="table table-borderless mb-0">
                                                            <div class="col-xl-3 col-md-6">
                                                                <!-- card -->
                                                                <div class="card card-animate bg-info">
                                                                    <div class="card-body">
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="flex-grow-1">
                                                                                <p class="text-uppercase fw-medium text-white-50 mb-0">Total de compras</p>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                                                            <div>
                                                                                <h4 class="fs-22 fw-semibold ff-secondary mb-4 text-white"><span class="counter-value" data-target="36894">0</span></h4>
                                                                                <a href="#" class="text-decoration-underline text-white-50">Ver todas las compras</a>
                                                                            </div>
                                                                            <div class="avatar-sm flex-shrink-0">
                                                                                <span class="avatar-title bg-soft-light rounded fs-3 shadow">
                                                                                    <i class="bx bx-shopping-bag text-white"></i>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div><!-- end card body -->
                                                                </div><!-- end card -->
                                                            </div><!-- end col -->
                                                        </table>
                                                        <hr>
                                                        <h5 class="card-title mb-3">Ordenes</h5>
                                                        
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Folio</th>
                                                                    <th scope="col">Total</th>
                                                                    <th scope="col">Estado del pago</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($client->orders as $order): ?>
                                                                    <tr>
                                                                        <td><?= $order->folio ?></td>
                                                                        <td><?= $order->total ?></td>
                                                                        <td><span class="badge bg-success"><?= $order->order_status_id ?></span></td>
                                                                        <td><a href="<?= BASE_PATH ?>ordenes/detalles.php?id<?= $order->id ?>" class="btn btn-info">Ver</a></td>
                                                                    </td>
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                            </tbody>
                                                        </table> 
                                                        <h5 class="card-title mb-3">Direcciones registradas</h5>
                                                        <button class="btn btn-primary btn-label waves-effect waves-light mb-3" data-bs-target="#añadirAddressModal" data-bs-toggle="modal" type="button" id="add-btn"><i class="bx bx-plus label-icon align-middle fs-16 me-2"></i> Añadir direccion</button>
                                                        <table class="table table-borderless mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Calle y número</th>
                                                                    <th scope="col">Codigo postal</th>
                                                                    <th scope="col">Ciudad</th>
                                                                    <th scope="col">Provincia</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($client->addresses as $address): ?>
                                                                    <tr>
                                                                        <td><?= $address->street_and_use_number ?></td>
                                                                        <td><?= $address->postal_code ?></td>
                                                                        <td><?= $address->city ?></td>
                                                                        <td><?= $address->province ?></td>
                                                                        <td>
                                                                            <a href="<?= BASE_PATH ?>clientes/detallesDirecciones.php?id=<?= $address->id ?>" class="btn btn-info">Ver</a>
                                                                            
                                                                            <button data-address='<?= json_encode($address) ?>' onclick="editar_address(this)" class="btn btn-warning btn-border" data-bs-target="#añadirAddressModal" data-bs-toggle="modal" id="edit-btn">Editar</button> 

                                                                            <button onclick="eliminar_address(<?= $address->id ?>)" class="btn btn-danger btn-border">Eliminar</button>

                                                                            <input type="hidden" id="super_token" value="<?= $_SESSION['super_token']?>">
                                                                            <input type="hidden" id="bp" value="<?= BASE_PATH ?>">
                                                                        </td>

                                                                    </tr>
                                                                <?php endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
              
                </div>
            
            </div>
         
        </div>
       
    </div>

    <div class="modal fade" id="añadirAddressModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="añadirAddressModal">Introduzca los datos</h5><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                </div>
                <form method="POST" action="<?= BASE_PATH?>app/AddressController.php" enctype="multipart/form-data" id="address_form">
                    <div class="modal-body">

                        
                        <span class="input-group-text">Nombre</span>
                        <input class="form-control" id="first_name" name="first_name" type="text">

                        <span class="input-group-text">Apellido</span>
                        <input class="form-control" id="last_name" name="last_name" type="text">

                        <span class="input-group-text">Nombre de calle y numero</span>
                        <input class="form-control" id="street_and_use_number" name="street_and_use_number" type="text">

                        <span class="input-group-text">Codigo postal</span>
                        <input class="form-control" id="postal_code" name="postal_code" type="text">

                        <span class="input-group-text">Ciudad</span>
                        <input class="form-control" id="city" name="city" type="text">

                        <span class="input-group-text">Provincia</span>
                        <input class="form-control" id="province" name="province" type="text">

                        <span class="input-group-text">Numero de celular</span>
                        <input class="form-control" id="phone_number" name="phone_number" type="text">

                        <span class="input-group-text" id="billing">¿Billing?</span>
                        <input class="form-control" id="is_billing" name="is_billing" type="text">

                        <input id="action"  name="action" type="hidden" value="create">
                        <input type="hidden" name="client_id" id="client_id" value="<?= $client->id ?>">

                        <?php  if(is_null($client->addresses)): ?>
                            <input type="hidden" name="address_id" id="address_id" value="">
                        <?php  else: ?>
                            <?php foreach ($client->addresses as $address):?>   
                            <input type="hidden" name="address_id" id="address_id" value="<?= $address->id?>">
                            <?php endforeach; ?>
                        <?php  endif; ?>
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
   
    <?php include "../layouts/footer.template.php" ?>
    <!-- JAVASCRIPT -->
    <?php include "../layouts/scripts.template.php" ?>
    <script>
        let address_form = document.getElementById("address_form")
        let add_btn = document.getElementById("add-btn")
        let edit_btn = document.getElementById("edit-btn")

        let first_name = document.getElementById("first_name")
        let last_name = document.getElementById("last_name")
        let street_and_use_number = document.getElementById("street_and_use_number")
        let postal_code = document.getElementById("postal_code")
        let city = document.getElementById("city")
        let province = document.getElementById("province")
        let phone_number = document.getElementById("phone_number")

        let billing = document.getElementById("billing")
        let is_billing = document.getElementById("is_billing")
        
        let client_id = document.getElementById("client_id")
        let address_id = document.getElementById("address_id")
        let action = document.getElementById("action")
        let super_token = document.getElementById("super_token")

        add_btn.addEventListener('click', () => {
            billing.style.display = "none"
            is_billing.style.display = "none"
        });

        edit_btn.addEventListener('click', () => {
            billing.style.display = "block"
            is_billing.style.display = "block"
        });

        address_form.addEventListener("submit", (e) => {
            e.preventDefault();

            const data = new FormData();
            data.append("first_name", first_name.value);
            data.append("last_name", last_name.value);
            data.append("street_and_use_number", street_and_use_number.value);
            data.append("postal_code", postal_code.value);
            data.append("city", city.value);
            data.append("province", province.value);
            data.append("phone_number", phone_number.value);
            data.append("is_billing", is_billing.value);
            data.append("client_id", client_id.value);
            data.append("address_id", address_id.value);
            data.append("action", action.value);
            data.append("super_token", super_token.value);
            var texto= /^[a-zA-ZÀ-ÿ\s]+$/; // Letras y espacios, pueden llevar acentos
            var telefono= /^\d{10,14}$/ ;// 7 a 14 numeros.
            var postal= /^\d{5,5}$/ ;// 7 a 14 numeros.
            ent =true;
            
            if(!texto.test(first_name.value) || !texto.test(last_name.value) || !postal.test(postal_code.value)
                || !texto.test(province.value) || !telefono.test(phone_number.value)){
                Swal.fire({ 
                    position: 'center',
                    icon: 'error',
                    title: 'Error Campos incorretos',
                    showConfirmButton: false,
                    timer: 1500
                })
                ent=false;
            }
            if(ent){
            axios({
                method: "POST",
                url: "../app/AddressController.php",
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
                    title: 'Dirección añadida con exito',
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
                    title: 'Dirección actualizada con exito',
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

        function editar_address(target) {

            let address = JSON.parse( target.dataset.address )

            first_name.value = address.first_name
            last_name.value = address.last_name 
            street_and_use_number.value = address.street_and_use_number
            postal_code.value = address.postal_code
            city.value = address.city
            province.value = address.province
            phone_number.value = address.phone_number
            is_billing.value = address.is_billing_address
            action.value = 'update'

        }

        function eliminar_address(id) {
            
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

                axios.post('../app/AddressController.php', bodyFormData)
                .then(function (response) {

                    if (response.data) {
                        swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                        });
                        location.href = "detalles.php?id=" + client_id.value
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
</body>
</html>