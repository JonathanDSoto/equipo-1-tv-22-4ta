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
                        <img src="../public/assets/images/profile-bg.jpg" alt="" class="profile-wid-img" />
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
                                <h3 class="text-white mb-1">Nombre del usuario</h3>
                                <p class="text-white-75">Rol del usuario</p>
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
                                                                    <th class="ps-0" scope="row">Nombre:</th>
                                                                    <td class="text-muted">Nombre de usuario usuario</td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Apellidos :</th>
                                                                    <td class="text-muted">Apellidos del usuario</td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">E-mail :</th>
                                                                    <td class="text-muted">Correo del usuario</td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Creado por :</th>
                                                                    <td class="text-muted">Nombre del que creo el usuario
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Se unio:</th>
                                                                    <td class="text-muted">Fecha de cuando se unio</td>
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