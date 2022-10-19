<?php
    include_once "../app/config.php";
?>
<!doctype html>
<head>
    <title>Clientes</title>
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
                                <h4 class="mb-sm-0">Clientes</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="">Home</a></li>
                                        <li class="breadcrumb-item active">Clientes</li>
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
                                    <h4 class="card-title mb-0">Lista de Clientes</h4>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div id="customerList">
                                        <div class="row g-4 mb-3">
                                            <div class="col-sm-auto">
                                                <div>
                                                    <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#añadirModal"><i class="ri-add-line align-bottom me-1"></i>Añadir Cliente</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive table-card mt-3 mb-1">
                                            <table class="table align-middle table-nowrap" id="customerTable">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col" style="width: 40px;">
                                                        <th>Nombre</th>
                                                        <th>Correo</th>
                                                        <th>Accion</th>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list form-check-all">
                                                    <tr>
                                                        <th scope="row">
                                                        </th>
                                                        <td >Nombre del cliente</td>
                                                        <td >Correo del cliente</td>
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
                                </div><!-- end card -->
                            </div>                   
                        </div>        
                    </div>
                  </div>
                </div>
            </div>
             <!-- Footer de la pagina -->
            <?php include "../layouts/footer.template.php" ?>
        </div>
        <!-- end main content-->
    </div>

    <!--Modal Alta Product-->
    <div class="modal fade" id="añadirModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="añadirModalLabel"> Datos del cliente </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="" action="" enctype="multipart/form-data">
                    <div class="modal-body">
                        <span class="input-group-text" id="name">Nombre Completo</span>
                        <input type="text" id="name" name="name" class="form-control" placeholder="">
                        <span class="input-group-text" id="email">Correo</span>
                        <input type="text" id="email" name="email" class="form-control" placeholder="">       
                        <span class="input-group-text" id="phone_number">Numero de telefono</span>
                        <input type="text" id="phone_number" name="phone_number" class="form-control" placeholder="">  
                        <h5 class="modal-title">Direccion</h5>
                        <span class="input-group-text" id="street_and_use_number">Calle</span>
                        <input type="text" id="street_and_use_number" name="street_and_use_number" class="form-control" placeholder="">
                        <span class="input-group-text" id="postal_code">Codigo postal</span>
                        <input type="text" id="postal_code" name="postal_code" class="form-control" placeholder="">
                        <span class="input-group-text" id="city">Ciudad</span>
                        <input type="text" id="city" name="city" class="form-control" placeholder="">
                        <span class="input-group-text" id="province">Provincia</span>
                        <input type="text" id="province" name="province" class="form-control" placeholder="">     
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