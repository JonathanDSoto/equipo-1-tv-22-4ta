<?php
include_once "../app/config.php";
include "../layouts/Authentication.templade.php";
include "../app/OrdersController.php";
include "../app/ClientsController.php";

$id = $_GET['id'];

$ordersController = new OrdersController();
$order = $ordersController->GetSpecifict($id);

$idClient = $order->client_id;

$clientsController = new ClientsController();
$client = $clientsController->SpecifictClient($idClient);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Detalles de Orden</title>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"><?php include "../layouts/head.template.php" ?>
    <!-- Sweet Alert css-->
    <link href="../public/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- NAVAR -->
    <?php include "../layouts/nav.template.php" ?>
    <!-- SIDEBAR -->
    <?php include "../layouts/side.template.php" ?>
    <!-- Comienzo-->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Detalles de la orden</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Ordenes</a></li>
                                    <li class="breadcrumb-item active">Detalles de ordenes</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h5 class="card-title flex-grow-1 mb-0">Orden #<?= $order->folio ?></h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-nowrap align-middle table-borderless mb-0">
                                    <thead>
                                        <tr>
                                            <!-- <th scope="col">Imagen</th> -->
                                            <th scope="col">Descripción</th>
                                            <th scope="col">Codigo</th>
                                            <th scope="col">Peso en gramos</th>
                                            <th scope="col">Estatus</th>
                                            <th scope="col">Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($order->presentations as $p) : ?>
                                            <tr>
                                                <!-- <td><img class="rounded-2" style="width:130px; height:70px;" src="<?= $p->cover ?>" alt="Card image cap"></td> -->
                                                <td><?= $p->description ?></td>
                                                <td><?= $p->code ?></td>
                                                <td><?= $p->weight_in_grams ?></td>
                                                <td><span class="badge bg-success"><?= $p->status ?></span></td>
                                                <td>
                                                    <a href="<?= BASE_PATH ?>presentacion/<?= $p->id ?>" class="btn btn-info">Ver</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>

                                    <table class="table table-borderless mb-0">
                                        <tbody>
                                            <tr>
                                                <td>Sub Total:$SUBTOTAL DE LA ORDEN</td>
                                            </tr>
                                            <tr>
                                                <td>Discount <span class="text-muted">(CODIGO DEL CUPON)</span>:-$MONTO DESCONTADO</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Total:$TOTAL DE LA ORDEN</th>
                                            </tr>
                                        </tbody>
                                    </table>

                                </table>
                            </div>
                        </div>
                    </div>
                    <!--end card-->


                </div>
                <!--end col-->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header pt-2 pb-2">
                            <div class="d-flex">
                                <h5 class="card-title flex-grow-1 mb-0">Detalles del cliente</h5>
                            </div>
                        </div>
                        <div class="card-body ">
                            <ul class="list-unstyled mb-0 vstack gap-3">
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="fs-14 mb-1"></h6>
                                            <?php if (!is_null($client)) : ?>
                                                <p class="text-muted mb-0">Nombre: <?= $client->name ?></p>
                                            <?php else : ?>
                                                <p class="text-muted mb-0">Nombre:</p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="fs-14 mb-1"></h6>
                                            <?php if (!is_null($client)) : ?>
                                                <p class="text-muted mb-0">Correo: <?= $client->email ?></p>
                                            <?php else : ?>
                                                <p class="text-muted mb-0">Correo:</p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="fs-14 mb-1"></h6>
                                            <?php if (!is_null($client)) : ?>
                                                <p class="text-muted mb-0">Teléfono: <?= $client->phone_number ?></p>
                                            <?php else : ?>
                                                <p class="text-muted mb-0">Teléfono:</p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </li>
                                <?php if (!is_null($client)) : ?>
                                    <a href="<?= BASE_PATH ?>cliente/<?= $client->id ?>" class="btn btn-success col-3">
                                        <i class="ri-download-2-fill align-middle me-1"></i>Ver Perfil</a>
                                <?php else : ?>
                                    <a href="#" class="btn btn-success col-3">
                                        <i class="ri-download-2-fill align-middle me-1"></i>Ver Perfil</a>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    <h5 class="card-title mb-0"><i class="ri-map-pin-line align-middle me-1 text-muted"></i>Dirección de envio</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Calle y número de casa</th>
                                <th scope="col">Codigo postal</th>
                                <th scope="col">Ciudad</th>
                                <th scope="col">Provincia</th>
                                <th scope="col">Numero de telefono</th>
                                <th scope="col">Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $order->address->street_and_use_number ?></td>
                                <td><?= $order->address->postal_code ?></td>
                                <td><?= $order->address->city ?></td>
                                <td><?= $order->address->province ?></td>
                                <td><?= $order->address->phone_number ?></td>
                                <td>
                                    <a href="<?= BASE_PATH ?>/<?= $order->address->id ?>" class="btn btn-info">Ver</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer de la pagina -->
    <?php include "../layouts/footer.template.php" ?>
    <!-- JAVASCRIPT -->
    <?php include "../layouts/scripts.template.php" ?>
</body>

</html>