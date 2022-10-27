<?php
include_once "../app/config.php";

include("../app/ProductController.php");
include("../app/PresentationController.php");

$slug = $_GET['slug'];
$productController = new ProductsController();
$product = $productController->details($slug);

$presentationController = new PresentationController();
$presentation = $presentationController->GetPresentation($product->id);

?>
<!doctype html>

<head>
    <title>Detalles</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../layouts/head.template.php" ?>
</head>

<body>
    <!-- NAVAR -->
    <?php include "../layouts/nav.template.php" ?>
    <!-- SIDEBAR -->
    <?php include "../layouts/side.template.php" ?>
    <!-- TODO EL CONTENIDO -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Detalle de producto</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="<?= BASE_PATH . "products/" ?>">Productos</a></li>
                                    <li class="breadcrumb-item active">Product Details</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row gx-lg-5">
                                    <div class="col-xl-4 col-md-8 mx-auto">
                                        <div class="product-img-slider sticky-side-div">
                                            <div class="swiper product-thumbnail-slider p-2 rounded bg-light">
                                                <div class="swiper-slide">
                                                    <img src="<?= $product->cover; ?>" alt="" class="img-fluid d-block" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-8">
                                        <div class="mt-xl-0 mt-5">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <h4><?= $product->name ?></h4>
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                            
                                                <div class="col-lg-3 col-sm-6">
                                                    <div class="p-2 border border-dashed rounded">
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar-sm me-2">
                                                                <div class="avatar-title rounded bg-transparent text-success fs-24">
                                                                    <i class="ri-file-copy-2-fill"></i>
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <p class="text-muted mb-1">Numero de ordenes :</p>
                                                                <h5 class="mb-0">2,234</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                    
                                            </div>
                                       
                                            <div class="mt-4 text-muted">
                                                <h5 class="fs-14">Descripcion :</h5>
                                                <p><?= $product->description ?></p>
                                            </div>

                                            <div class="mt-4 text-muted">
                                                <h5 class="fs-14">Caracteristicas</h5>
                                                <p><?= $product->features ?></p>
                                            </div>

                                            <div class="mt-4 text-muted">
                                                <h5 class="fs-14">Categoria</h5>
                                                <?php foreach ($product->categories as $c) : ?>
                                                    <p><?= $c->name; ?></p>
                                                <?php endforeach; ?>
                                            </div>

                                            <div class="mt-4 text-muted">
                                                <h5 class="fs-14">Marca</h5>
                                                <?php if(!is_null($product->brand) ): ?>
                                                    <p><?= $product->brand->name ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="fs-14">Presentaciones</h5>
                                    <div class="card-body">
                                        <div id="customerList">
                                            <div class="row g-4 mb-3">

                                                <div class="d-flex justify-content-end ">
                                                    <button type="button" class="btn btn-success add-btn" style="margin-right: 85px;" data-bs-toggle="modal" id="create-btn" data-bs-target="#añadirModal"><i class="ri-add-line align-bottom me-1"></i>Añadir presentacion</button>
                                                </div>

                                            </div>
                                            <div class="table-responsive table-card mt-3 mb-1">
                                                <div class="mt-4 text-muted">
                                                </div>
                                                <table class="table align-middle table-nowrap" id="customerTable">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th scope="col" style="width: 40px;">
                                                            <th>Imagen</th>
                                                            <th>Nombre</th>
                                                            <th>Status</th>
                                                            <th>Monto</th>
                                                            <th>Accion</th>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="list form-check-all">
                                                        <?php foreach ($presentation as $p): ?>
                                                            <tr>
                                                                <th scope="row">
                                                                    </th>
                                                                    <td class="customer_name"> <img class="rounded-2" style="width:150px; height:70px;" src="<?= $p->cover ?>" alt="Card image cap"></td>
                                                                    <td><?= $p->description ?></td>
                                                                    <td><?= $p->status ?></td>
                                                                    <?php if(!is_null($p->current_price) ): ?>
                                                                        <td>$ <?= $p->current_price->amount ?></td>
                                                                    <?php endif; ?>

                                                                <td>
                                                                    <div class="d-flex gap-3">
                                                                        <div class="view">
                                                                            <a href="detallesPresentaciones.php?id=<?= $p->id ?>" class="btn btn-info">
                                                                                <i class="bx bx-show"></i>
                                                                            </a>
                                                                        </div>
                                                                        <div class="edit">
                                                                            <button data-presentation='<?= json_encode($p) ?>' onclick="editar_presentacion(this)" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#añadirModal">
                                                                                <i class="ri-edit-2-line"></i>
                                                                            </button>
                                                                        </div>
                                                                        <div class="remove">
                                                                            <button class="btn btn-danger" onclick="eliminar_presentacion(<?= $p->id ?>)">
                                                                                <i class="bx bx-trash-alt"></i>
                                                                            </button>
                                                                            <input type="hidden" id="super_token" value="<?= $_SESSION['super_token']?>">
                                                                            <input type="hidden" id="bp" value="<?= BASE_PATH ?>">
                                                                        </div>
                                                                    </div>
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
    <!--Modal Alta Presentaciones-->
    <div class="modal fade" id="añadirModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="añadirModalLabel"> Datos de la presentacion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="<?= BASE_PATH?>app/PresentationController.php" enctype="multipart/form-data" id="presentation_form">
                    <div class="modal-body">

                        <span class="input-group-text" id="label_img">Imagen de la presentación</span>
                        <input type="file" id="cover" name="cover" accept="image/*">

                        <span class="input-group-text">Descripcion</span>
                        <input type="text" id="description" name="description" class="form-control">

                        <span class="input-group-text">Codigo</span>
                        <input type="text" id="code" name="code" class="form-control">

                        <span class="input-group-text">Peso(g)</span>
                        <input type="text" id="weight" name="weight" class="form-control">
                        
                        <span class="input-group-text" id="estado_label">Estado</span>
                        <input type="text" id="estado" name="status" class="form-control">

                        <span class="input-group-text">Cantidad de productos</span>
                        <input type="text" id="stock" name="stock" class="form-control">

                        <span class="input-group-text">Cantidad de productos minimo</span>
                        <input type="text" id="stock_min" name="stock_min" class="form-control">

                        <span class="input-group-text">Cantidad de productos maximo</span>
                        <input type="text" id="stock_max" name="stock_max" class="form-control">
                        
                    </div>

                    <input type="hidden" name="action" id="action" value="create">
                    <input type="hidden" name="product_id" id="product_id" value="<?= $product->id ?>">
                    <input type="hidden" name="presentation_id" id="presentation_id" value="">
                    <input type="hidden" name="super_token" id="super_token" value="<?= $_SESSION['super_token'] ?>">
                    <input type="hidden" id="slug" value="<?= $_GET['slug'] ?>">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 

    <!-- Footer de la pagina -->
    <?php include "../layouts/footer.template.php" ?>
    <!-- JAVASCRIPT -->
    <?php include "../layouts/scripts.template.php" ?>
    <script>

        let create_btn = document.getElementById("create-btn")
        let form = document.getElementById("presentation_form")
        let label_cover = document.getElementById('label_img')
        let cover = document.getElementById("cover")
        let description = document.getElementById("description")
        let code = document.getElementById("code")
        let weight = document.getElementById("weight")
        let stock = document.getElementById("stock")
        let stock_min = document.getElementById("stock_min")
        let stock_max = document.getElementById("stock_max")
        let action = document.getElementById("action")
        let product_id = document.getElementById('product_id')
        let presentation_id = document.getElementById('presentation_id')
        let super_token = document.getElementById("super_token")
        let slug = document.getElementById("slug")

        let status_label = document.getElementById("estado_label")
        let status = document.getElementById("estado")

        create_btn.addEventListener("click", () => {
            label_cover.style.display = "block"
            cover.style.display = "block"
            status_label.style.display = "none"
            status.style.display = "none"
        })
        
        form.addEventListener("submit", (e) => {
            e.preventDefault();
            
            const data = new FormData();
                data.append("cover", cover.files[0]);
                data.append("description", description.value);
                data.append("code", code.value);
                data.append("weight", weight.value);
                data.append("stock", stock.value);
                data.append("stock_min", stock_min.value);
                data.append("stock_max", stock_max.value);
                data.append("action", action.value);
                data.append("product_id", product_id.value);
                data.append("super_token", super_token.value);
                data.append("status", status.value);
                data.append("presentation_id", presentation_id.value);
                data.append("slug", slug.value);
    
                axios({
                    method: "POST",
                    url: "../app/PresentationController.php",
                    data,
                    headers: {
                    "Content-Type": "multipart/form-data",
                    },
                }).then((response)=> {
    
                    if (response.data.code > 0) {
                            Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'Presentacion creada con exito',
                            showConfirmButton: false,
                            timer: 1500
                            })
                            function greet() {
                                location.href = "detalles.php?slug=" + slug.value
                            }
                            setTimeout(greet, 1800);
                    } else if (response.message != "") {
                            Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'Presentacion actualizada exitosamente',
                            showConfirmButton: false,
                            timer: 1500
                            })
                            function greet() {
                                location.href = "detalles.php?slug=" + slug.value
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

        });

        function eliminar_presentacion(id) {
            
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

                axios.post('../app/PresentationController.php', bodyFormData)
                .then(function (response) {

                    if (response.data) {
                        swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                        });
                        location.href = base_path+"products/detalles.php?slug=" + slug.value
                        /* location.href = "detalles.php?slug=" + slug.value */
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

        function editar_presentacion(target) {

            label_cover.style.display = "none"
            cover.style.display = "none"
            status_label.style.display = "block"
            status.style.display = "block"

            let presentation = JSON.parse( target.dataset.presentation )

            description.value = presentation.description 
            code.value = presentation.code
            weight.value = presentation.weight_in_grams
            status.value = presentation.status
            stock.value = presentation.stock
            stock_min.value = presentation.stock_min
            stock_max.value = presentation.stock_max
            product_id.value = presentation.product_id
            presentation_id.value = presentation.id
            action.value = 'update'

        }
    </script>
</body>

</html>