<?php
    include_once "../app/config.php";

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
                            <h4 class="mb-sm-0">Detalles</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Productos</a></li>
                                    <li class="breadcrumb-item active">Detalles</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- CARRUSEL DE LAS IMAGENES DEL PRODUCTO -->
                                <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    </div>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active" data-bs-interval="10000" style="text-align: center;">
                                            <img src="../public/assets/images/products/img-6.png" class="w-50" alt="...">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                                 <!-- DATOS DEL PRODUCTO -->
                                <div class="col-xl-8">
                                    <div class="mt-xl-0 mt-5">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <h4>Nombre del producto</h4>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="p-2 border border-dashed rounded">
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-sm me-1">
                                                            <div class="avatar-title rounded bg-transparent text-success fs-24">
                                                                <i class="ri-money-dollar-circle-fill"></i>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <p class="text-muted mb-1">Precio :</p>
                                                            <h5 class="mb-0">$100</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                
                                    <div class="mt-4 text-muted">
                                        <h5 class="fs-14">Descripcion del producto</h5>
                                        <p>Aqui va toda la descripcion del producto</p>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mt-3">
                                                <h5 class="fs-14">Caracteristicas :</h5>
                                                <ul class="list-unstyled">
                                                    <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> Caracteristas del producto</li>
                                                </ul>

                                                <h5 class="fs-14">Categorias:</h5>
                                                <ul class="list-unstyled">
                                                    <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> Categorias del prodicuto</li>
                                                </ul>

                                                <h5 class="fs-14">Marca:</h5>
                                                <ul class="list-unstyled">
                                                    <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i>Marca del producto</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <!-- Tabla de ordenes -->
                                <h5 class="fs-14">Ordenes:</h5>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Descripcion del producto</th>
                                                <th scope="col">Monto</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Aqui val la descripcion del producto</td>
                                                <td>Precio del producto</td>
                                                <td><span class="badge bg-success">Estatus del producto</span></td>
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
    <!-- JAVASCRIPT -->
    <?php include "../layouts/scripts.template.php" ?>
</body>
</html>