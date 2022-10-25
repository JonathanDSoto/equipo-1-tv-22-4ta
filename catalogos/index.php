<?php
    include_once "../app/config.php";
    include("../app/CategorieController.php");
    include("../app/BrandController.php");

    $categoriesController = new CategorieController();
    $categories = $categoriesController->GetCategories();

    $brandsController = new BrandsController();
    $brands = $brandsController->getBrands();

?>
<!doctype html>
<head>
    <title>Catalogos</title>
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
                                <h4 class="mb-sm-0">Catalogos</h4>
                            </div>
                        </div>
                    </div>
                    <!-- Categorias -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Lista de categorias</h4>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div id="customerList">
                                        <div class="row g-4 mb-3">
                                            <div class="col-sm-auto">
                                                <div>
                                                    <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#añadirModal"><i class="ri-add-line align-bottom me-1"></i>Añadir categoria</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive table-card mt-3 mb-1">
                                            <table class="table align-middle table-nowrap" id="categoriesTable">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col" style="width: 40px;">
        
                                                        <th>Nombre</th>
                                                        <th>Accion</th>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list form-check-all">
                                                    <?php foreach ($categories as $categorie): ?>
                                                    <tr>
                                                        <th scope="row">
                                                        </th>
                                                        <td ><?= $categorie->name ?></td>
                                                     
                                                        <td>
                                                            <div class="d-flex gap-3">
                                                                <div class="view">
                                                                <a href="detalles_presentacion.php?id=<?= $categorie->id ?>" class="btn btn-info">
                                                                    <i class="bx bx-show"></i>
                                                                </a>
                                                                </div>
                                                                <div class="edit">
                                                                <button data-categorie='<?= json_encode($categorie) ?>' onclick="editar_categoria(this)" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#añadirModal">
                                                                    <i class="ri-edit-2-line"></i>
                                                                </button>
                                                                </div>
                                                                <button class="btn btn-danger" onclick="eliminar_categoria(<?= $categorie->id ?>)">
                                                                    <i class="bx bx-trash-alt"></i>
                                                                </button>
                                                                <input type="hidden" id="super_token" value="<?= $_SESSION['super_token']?>">
                                                                <input type="hidden" id="bp" value="<?= BASE_PATH ?>">
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
                    <!-- Marcas -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Lista de marcas</h4>
                                </div><!-- end card header -->
                                <div class="card-body">
                                    <div id="customerList">
                                        <div class="row g-4 mb-3">
                                            <div class="col-sm-auto">
                                                <div>
                                                    <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#añadirBrandModal"><i class="ri-add-line align-bottom me-1"></i>Añadir Marca</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive table-card mt-3 mb-1">
                                            <table class="table align-middle table-nowrap" id="brandTable">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col" style="width: 40px;">
                                                        <th>Nombre</th>
                                                        <th>Accion</th>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list form-check-all">
                                                    <?php foreach ($brands as $brand): ?>
                                                        <tr>
                                                            <th scope="row">
                                                            </th>
                                                            <td ><?= $brand->name ?></td>
                                                            <td>
                                                                <div class="d-flex gap-3">
                                                                    <div class="view">
                                                                        <a href="" class="btn btn-info ">Ver</a>
                                                                    </div>
                                                                    <div class="edit">
                                                                        <button data-marca='<?= json_encode($brand) ?>' onclick="editar_marca(this)" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#añadirBrandModal">
                                                                            <i class="ri-edit-2-line"></i>
                                                                        </button>
                                                                    </div>
                                                                    <div class="remove">
                                                                        <button class="btn btn-danger" onclick="eliminar_brand(<?= $brand->id ?>)">Remove</button>
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
                     <!-- Tags -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Lista de tags</h4>
                                </div><!-- end card header -->
                                <div class="card-body">
                                    <div id="customerList">
                                        <div class="row g-4 mb-3">
                                            <div class="col-sm-auto">
                                                <div>
                                                    <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#añadirModal"><i class="ri-add-line align-bottom me-1"></i>Añadir tag</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive table-card mt-3 mb-1">
                                            <table class="table align-middle table-nowrap" id="customerTable">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col" style="width: 40px;">
                                                        <th>Nombre</th>
                                                        <th>Accion</th>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list form-check-all">
                                                    <tr>
                                                        <th scope="row">
                                                        </th>
                                                        <td >Nombre del tag</td>
                                                     
                                                        <td>
                                                            <div class="d-flex gap-3">
                                                                <div class="view">
                                                                    <a href="" class="btn btn-info " data-bs-toggle="modal" data-bs-target="">Ver</a>
                                                                </div>
                                                                <div class="edit">
                                                                    <button class="btn btn-warning " data-bs-toggle="modal" data-bs-target="#añadirModal">Edit</button>
                                                                </div>
                                                                <div class="remove">
                                                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="">Remove</button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
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
             <!-- Footer de la pagina -->
            <?php include "../layouts/footer.template.php" ?>

    <!--Modal Alta Categoria y Editar-->
    <div class="modal fade" id="añadirModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="añadirModalLabel"> Introdusca los datos</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="<?= BASE_PATH?>app/CategorieController.php" enctype="multipart/form-data" id="categories_form">
                    <div class="modal-body">

                        <span class="input-group-text">Nombre</span>
                        <input type="text" id="name" name="name" class="form-control">

                        <span class="input-group-text">Descripción</span>
                        <input type="text" id="description" name="description" class="form-control">

                        <span class="input-group-text">Id Categoría</span>
                        <input type="text" id="category_id" name="category_id" class="form-control">

                    </div>

                    <input type="hidden" name="action" id="action" value="create">
                    <input type="hidden" name="id" id="id" value="<?= $categorie->id ?>">
                    <input type="hidden" name="super_token" id="super_token" value="<?= $_SESSION['super_token'] ?>">
                    

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Modal Alta Marca y Editar-->
    <div class="modal fade" id="añadirBrandModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="añadirModalLabel"> Introduzca los datos de la marca</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="<?= BASE_PATH?>app/BrandController.php" enctype="multipart/form-data" id="brands_form">
                    <div class="modal-body">

                        <span class="input-group-text">Nombre</span>
                        <input type="text" id="brand_name" name="name" class="form-control">

                        <span class="input-group-text">Descripción</span>
                        <input type="text" id="brand_description" name="description" class="form-control">

                    </div>

                    <input type="hidden" name="action" id="action" value="create">
                    <input type="hidden" name="brand_id" id="brand_id" value="<?= $brand->id ?>">
                    <input type="hidden" name="super_token" id="super_token" value="<?= $_SESSION['super_token'] ?>">
                    

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
    <script>

        let categories_form = document.getElementById("categories_form")
        let brands_form = document.getElementById("brands_form")
        let tags_form = document.getElementById("tags_form")

        // Categoríes
        let name = document.getElementById("name")
        let description = document.getElementById("description")
        let category_id = document.getElementById("category_id")
        let action = document.getElementById("action")
        let id = document.getElementById("id")

        // Brands
        let brand_name = document.getElementById("brand_name")
        let brand_description = document.getElementById("brand_description")
        let brand_id = document.getElementById("brand_id")
        
        let super_token = document.getElementById("super_token")

        
        // C A T E G O R I E S
        categories_form.addEventListener("submit", (e) => {
            e.preventDefault();
            
            const data = new FormData();
            data.append("name", name.value);
            data.append("description", description.value);
            data.append("category_id", category_id.value);
            data.append("action", action.value);
            data.append("id", id.value);
            data.append("super_token", super_token.value);

            axios({
                method: "POST",
                url: "../app/CategorieController.php",
                data,
                headers: {
                "Content-Type": "multipart/form-data",
                },
            }).then((response)=> {

                if (response.data.code > 0) {
                        Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: 'Categoría creada con éxito',
                        showConfirmButton: false,
                        timer: 1500
                        })
                        function greet() {
                            location.href = "index.php"
                        }
                        setTimeout(greet, 1800);
                } else if (response.data) {
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: 'Categoría actualizada con éxito',
                        showConfirmButton: false,
                        timer: 1500
                        })
                        function greet() {
                            location.href = "index.php"
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

        function eliminar_categoria(id) {
            
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

                axios.post('../app/CategorieController.php', bodyFormData)
                .then(function (response) {

                    if (response.data) {
                        swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                        });
                        location.href = base_path+"catalogos/index.php"
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

        function editar_categoria(target) {

            let categorie = JSON.parse( target.dataset.categorie )

            id.value = categorie.id
            name.value = categorie.name
            description.value = categorie.description 
            category_id.value = categorie.category_id
            action.value = 'update'

        }
        
        // B R A N D S
        brands_form.addEventListener("submit", (e) => {
            e.preventDefault();

            if (action.value == "update") {
                const data = new FormData();
                data.append("brand_name", brand_name.value);
                data.append("brand_description", brand_description.value);
                data.append("brand_id", brand_id.value);
                data.append("action", action.value);
                data.append("super_token", super_token.value);

                axios({
                    method: "POST",
                    url: "../app/BrandController.php",
                    data,
                    headers: {
                    "Content-Type": "multipart/form-data",
                    },
                }).then((response)=> {

                    if (response.data.code > 0) {
                        Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'Marca actualizada con éxito',
                            showConfirmButton: false,
                            timer: 1500
                            })
                            function greet() {
                                location.href = "index.php"
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

            } else {
                console.log(action.value)
                
                const data = new FormData();
                data.append("brand_name", brand_name.value);
                data.append("brand_description", brand_description.value);
                data.append("brand_id", brand_id.value);
                data.append("action", action.value);
                data.append("super_token", super_token.value);
    
                axios({
                    method: "POST",
                    url: "../app/BrandController.php",
                    data,
                    headers: {
                    "Content-Type": "multipart/form-data",
                    },
                }).then((response)=> {
    
                    if (response.data.code > 0) {
                            Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'Marca creada con éxito',
                            showConfirmButton: false,
                            timer: 1500
                            })
                            function greet() {
                                location.href = "index.php"
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

        function editar_marca(target) {

            let brands = JSON.parse( target.dataset.marca )

            brand_name.value = brands.name
            brand_description.value = brands.description 
            brand_id.value = brands.id
            action.value = 'update'

        }

        function eliminar_brand(id) {
            
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

                axios.post('../app/BrandController.php', bodyFormData)
                .then(function (response) {

                    if (response.data) {
                        swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                        });
                        location.href = base_path+"catalogos/index.php"
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

        // T A G S
        

        $(document).ready(function () {
            $('#categoriesTable').DataTable();
            $('#brandTable').DataTable();
        });

    </script>
</body>
</html>