<?php
include_once "../app/config.php";

include("../app/ProductController.php");

$slug = $_GET['slug'];
$productController = new ProductsController();
$product = $productController->details($slug);

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

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Detalle de producto</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="">Productos</a></li>
                                    <li class="breadcrumb-item active">Product Details</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row gx-lg-5">
                                    <div class="col-xl-4 col-md-8 mx-auto">
                                        <div class="product-img-slider sticky-side-div">
                                            <div class="swiper product-thumbnail-slider p-2 rounded bg-light">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <img src="<?= $product->cover; ?>" alt="" class="img-fluid d-block" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->
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
                                                                    <i class="ri-money-dollar-circle-fill"></i>
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <p class="text-muted mb-1">Precio :</p>
                                                                <h5 class="mb-0">$120.40</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end col -->
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
                                                <!-- end col -->
                                                <div class="col-lg-3 col-sm-6">
                                                    <div class="p-2 border border-dashed rounded">
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar-sm me-2">
                                                                <div class="avatar-title rounded bg-transparent text-success fs-24">
                                                                    <i class="ri-stack-fill"></i>
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <p class="text-muted mb-1">Stock disponible :</p>
                                                                <h5 class="mb-0">1,230</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end row -->
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
                                                <?php  foreach($product->categories as $c): ?>
                                                    <p><?= $c->name; ?></p>
                                                <?php  endforeach; ?>
                                            </div>

                                            <div class="mt-4 text-muted">
                                                <h5 class="fs-14">Marca</h5>
                                                <p>Aqui va el nombre de la marca del producto</p>
                                            </div>

                                            <!-- product-content -->
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row -->
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        <!-- Footer de la pagina -->
        <?php include "../layouts/footer.template.php" ?>
        <!-- JAVASCRIPT -->
        <?php include "../layouts/scripts.template.php" ?>
</body>

</html>