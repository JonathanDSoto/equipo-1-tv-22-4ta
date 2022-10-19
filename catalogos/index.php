<?php
    include_once "../app/config.php";
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
                                                        <td >Nombre de categoria</td>
                                                     
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
                                                    <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#añadirModal"><i class="ri-add-line align-bottom me-1"></i>Añadir Marca</button>
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
                                                        <td >Nombre de la marca</td>
                                                     
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
                <form method="" action="" enctype="multipart/form-data">
                    <div class="modal-body">
                        <span class="input-group-text" id="name">Nombre</span>
                        <input type="text" id="name" name="name" class="form-control" placeholder=""> 
                    </div>
                    <input type="hidden" name="action" value="create">
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
</body>
</html>