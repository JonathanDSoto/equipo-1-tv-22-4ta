<?php
    include_once "../app/config.php";
    include "../layouts/Authentication.templade.php";
    include("../app/productController.php");
    include("../app/BrandController.php");

    $productsController = new ProductsController();
    $products = $productsController->getProducts();

    $brandsController = new BrandsController();
    $brands = $brandsController->getBrands();
?>

<!doctype html>
<head>
    <title>Shop</title>
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
    <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Productos</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?= BASE_PATH . 'products' ?>">Home</a></li>
                                        <li class="breadcrumb-item active">Productos</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Lista de productos</h4>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div id="customerList">
                                        <div class="row g-4 mb-3">
                                            <div class="col-sm-auto">
                                                <div>
                                                    <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#añadirModal"><i class="ri-add-line align-bottom me-1"></i>Añadir Productos</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive table-card mt-3 mb-1">
                                            <table class="table align-middle table-nowrap" id="product_table">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col" style="width: 40px;">
                                                        <th>Producto</th>
                                                        <th>Acción</th>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list form-check-all">
                                                    <?php foreach($products as $product): ?>
                                                    <tr>
                                                        <td class="customer_name"> <img class="rounded-2" style="width:200px; height:100px; " src="<?= $product->cover; ?>" alt="Card image cap"></td>
                                                        <td ><?= $product->name ?></td>
                                                        <td>
                                                            <div class="d-flex gap-3">
                                                                <div class="view">
                                                                    <a href="<?= BASE_PATH ?>prod/<?= $product->slug ?>" class="btn btn-info">Ver</a>
                                                                </div>
                                                                <div class="edit">
                                                                    <button data-product='<?= json_encode($product) ?>' onclick="editar_producto(this)" class="btn btn-warning " data-bs-toggle="modal" data-bs-target="#añadirModal">Edit</button>
                                                                </div>
                                                                <div class="remove">
                                                                    <button class="btn btn-danger" onclick="eliminar(<?= $product->id ?>)">Remove</button>
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
                                </div><!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                    </div>
                    <!-- end preloader-menu -->
                </div>
            </div>
                <!-- Footer de la pagina -->
                <?php include "../layouts/footer.template.php" ?>

    <!--Modal Alta Product-->
    <div class="modal fade" id="añadirModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">  
                    <h5 class="modal-title" id="añadirModalLabel"> Nuevo Producto </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="<?= BASE_PATH?>prod" enctype="multipart/form-data" id="formu" >
                    <div class="modal-body">
                        <span class="input-group-text" id="addon-wrapping">Imagen del producto</span>
                        <input type="file" id="img_product" name="img_producto" accept="image/*"  >

                        <span class="input-group-text" id="addon-wrapping">Nombre</span>
                        <input type="text" id="name" name="name" class="form-control" placeholder="..." required   >

                        <span class="input-group-text" id="addon-wrapping">Descripcion</span>
                        <input type="text" id="description" name="description" class="form-control" placeholder="..." required   >

                        <span class="input-group-text" id="addon-wrapping">Caracteristicas</span>
                        <input type="text" id="features" name="features" class="form-control" placeholder="..."  required   >
                        
                        <span class="input-group-text" id="addon-wrapping">Marca</span>
                        <select class="form-select" aria-label="Default select example" id="brand_id" name="brand_id" required > 
                            <?php foreach($brands as $brand): ?>
                                <option value="<?= $brand->id ?>"><?= $brand->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <input type="hidden" name="action" id="action" value="create">
                    <input type="hidden" name="id" id="id_product">
                    <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
      
    <!-- JAVASCRIPT -->
    <?php include "../layouts/scripts.template.php" ?>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

    <script>

        // Funcion para mostrar modales en base al GET obtenido
        // modal = true - modal = false
       
        function getQueryVariable(variable) {
            var query = window.location.search.substring(1);
            var vars = query.split("&");
            for (let i = 0; i < vars.length; i++) {
                let pair = vars[i].split("=");
                if (pair[0].toUpperCase() == variable.toUpperCase()) {
                return pair[1];
                }
            }
            return null;
        } 


        var validarRe = /^[a-zA-Z0-9\_\-]+$/ ;                   
        var nam = document.getElementById('name');
        var des = document.getElementById('description');
        var fea = document.getElementById('features');
        
        function validarRe() {
            if(!validarRe.test(des.value)){
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                footer: '<a href="">Why do I have this issue?</a>'
                })
            }
            
        }
        
        $(document).ready(function() {
            if (getQueryVariable("modal") == "true") {
                Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Producto registrado con exito',
                showConfirmButton: false,
                timer: 1500
                })
                function tiempo() { // Aqui va la ruta que apunta al index de productos
                    location.href = "index.php";
                }
                setTimeout(tiempo, 1500);
            }
            if(getQueryVariable("modal") == "false"){
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Algo salio mal, no se puedo agregar el producto!',
                
                })
                function tiempo() { // Aqui va la ruta que apunta al index de productos
                    location.href = "index.php";
                }
                setTimeout(tiempo, 1500);
            }
        
        });      

        function eliminar(id) {

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

                axios.post('../app/ProductController.php', bodyFormData)
                .then(function (response) {

                    if (response.data) {
                        swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                        });
                        location.href = base_path+'products'
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

        function editar_producto(target) {

            let product = JSON.parse( target.dataset.product )

            document.getElementById('id_product').value = product.id
            document.getElementById('name').value = product.name
            document.getElementById('description').value = product.description
            document.getElementById('features').value = product.features
            document.getElementById('brand_id').value = product.brand_id
            document.getElementById('action').value = 'update'

        }

        $(document).ready(function () {
            $('#product_table').DataTable();
        });

    </script>
</body>

</html>