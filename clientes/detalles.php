<?php
include_once "../app/config.php";
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

    <!-- ============================================================== -->
    <!-- TODO EL CONTENIDO -->
    <!-- ============================================================== -->
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
                        <div class="col-auto">
                            <div class="avatar-lg">
                                <img src="../public/assets/images/users/avatar-8.jpg" alt="user-img" class="img-thumbnail rounded-circle" />
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col">
                            <div class="p-2">
                                <h3 class="text-white mb-1">Nombre del cliente</h3>
                                <p class="text-white-75">Nivel del cliente:</p>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div>
                            <!-- Tab panes -->
                            <div class="tab-content pt-4 text-muted">
                                <div class="tab-pane active" id="overview-tab" role="tabpanel">
                                    <div class="row">
                                        <div class="col-xxl-3">
                                            <div class="card">

                                            </div>

                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-3">Informacion</h5>
                                                    <div class="table-responsive">
                                                        <table class="table table-borderless mb-0">
                                                            <tbody>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Nombre Completo:</th>
                                                                    <td class="text-muted">Nombre completo del cliente</td>
                                                                </tr>

                                                                <tr>
                                                                    <th class="ps-0" scope="row">E-mail:</th>
                                                                    <td class="text-muted">Correo del cliente</td>
                                                                </tr>

                                                                <tr>
                                                                    <th class="ps-0" scope="row">Numero de telefono</th>
                                                                    <td class="text-muted">Numero de telefono del cliente
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <h5 class="card-title mb-3">Direccion</h5>
                                                        <table class="table table-borderless mb-0">
                                                            <tbody>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Calle:</th>
                                                                    <td class="text-muted">Nombre de la calle del cliente</td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Codigo Postal:</th>
                                                                    <td class="text-muted">Codigo postal del cliente</td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Ciudad:</th>
                                                                    <td class="text-muted">Nombre de la ciudad del cliente</td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Provinica:</th>
                                                                    <td class="text-muted">Nombre de la provincia del cliente</td>
                                                                </tr>
                                                            </tbody>

                                                        </table>
                                                        <h5 class="card-title mb-3">Ordenes</h5>
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Nombre del producto</th>
                                                                    <th scope="col">Descripcion del producto</th>
                                                                    <th scope="col">Monto</th>
                                                                    <th scope="col">Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Aqui val la descripcion del producto</td>
                                                                    <td>Aqui val la descripcion del producto</td>
                                                                    <td>Precio del producto</td>
                                                                    <td><span class="badge bg-success">Estatus del producto</span></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
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

                                                        <h5 class="card-title mb-3">Direcciones registradas</h5>
                                                        <table class="table table-borderless mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Calle y num</th>
                                                                    <th scope="col">Codigo postal</th>
                                                                    <th scope="col">Ciudad</th>
                                                                    <th scope="col">Provincia</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Calle y numero del cliente</td>
                                                                    <td>Codigo postal del cliente</td>
                                                                    <td>Ciudad del cliente</td>
                                                                    <td>Provincia del cliente</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->

                                            <!--end card-->
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end card-body-->
    <?php include "../layouts/footer.template.php" ?>
    <!-- JAVASCRIPT -->
    <?php include "../layouts/scripts.template.php" ?>
</body>

</html>