<?php
    include_once "../app/config.php";
    include "../layouts/Authentication.templade.php";
    include ("../app/AddressController.php");

    $id = $_GET['id'];

    $addressController = new AddressController();
    $address = $addressController->GetAddress($id);

?>
<!doctype html>

<head>
    <meta charset="utf-8" />
    <title>Detalles de ruta</title>
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
    <!-- CONTENIDO -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="profile-foreground position-relative mx-n4 mt-n4">
                    <div class="profile-wid-bg">
                        <img src="../public/assets/images/mapa.jpg" alt="" class="profile-wid-img" />
                    </div>
                </div>
                <div class="pt-4 ">
                    <div class="row g-4">
                        <div class="col">
                            <div class="p-2">
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
                                        <div class="col-xxl-8 aling-center">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-3">Informacion</h5>
                                                    <div class="table-responsive">
                                                        <table class="table table-borderless mb-0">
                                                            <tbody>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Nombre:</th>
                                                                    <td class="text-muted"><?= $address->first_name ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Apellidos :</th>
                                                                    <td class="text-muted"><?= $address->last_name ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Calle y número:</th>
                                                                    <td class="text-muted"><?= $address->street_and_use_number ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Apartamento:</th>
                                                                    <td class="text-muted"><?= $address->apartment ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Codigo Postal:</th>
                                                                    <td class="text-muted"><?= $address->postal_code ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Ciudad:</th>
                                                                    <td class="text-muted"><?= $address->city ?>s</td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Provincia:</th>
                                                                    <td class="text-muted"><?= $address->province ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Numero de telefono:</th>
                                                                    <td class="text-muted"><?= $address->phone_number ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Dirección de facturación</th>
                                                                    <?php if($address->is_billing_address == 0): ?>
                                                                        <td class="text-muted">No</td>
                                                                    <?php else: ?>
                                                                        <td class="text-muted">Si</td>
                                                                    <?php endif; ?>
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
                </div>
            </div>
        </div>
        <!--FOOTER DE LA PAGINA-->
        <?php include "../layouts/footer.template.php" ?>
        <!-- JAVASCRIPT -->
        <?php include "../layouts/scripts.template.php" ?>
</body>
</html>