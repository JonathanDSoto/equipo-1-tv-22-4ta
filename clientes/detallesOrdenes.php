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
                            <h4 class="mb-sm-0">Detalle de orden</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="">Clientes</a></li>
                                    <li class="breadcrumb-item active">Detalle de ordenes</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row gx-lg-5">
                                    <div class="mt-xl-0 mt-5">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <h4>Datos del cliente</h4>
                                            </div>
                                        </div>

                                        <div class="mt-4 text-muted">
                                            <h5 class="fs-14">Nombre del cliente :</h5>
                                            <p></p>
                                        </div>

                                        <div class="mt-4 text-muted">
                                            <h5 class="fs-14">Correo electronico :</h5>
                                            <p></p>
                                        </div>

                                        <div class="mt-4 text-muted">
                                            <h5 class="fs-14">Numero de telefono :</h5>
                                            <p></p>
                                        </div>

                                        <div class="mt-4 text-muted">
                                            <h5 class="fs-14">Suscripcion :</h5>
                                            <p></p>
                                        </div>
                                        <div class="mt-4 text-muted">
                                            <h5 class="fs-14">Nivel :</h5>
                                            <p></p>
                                        </div>
                                    </div>

                                    <h5 class="fs-14">Ordenes :</h5>
                                    <div class="card-body">
                                        <div id="customerList">
                                            
                                            <div class="table-responsive table-card mt-3 mb-1">
                                                <div class="mt-4 text-muted">
                                                </div>
                                                <table class="table align-middle table-nowrap" id="customerTable">
                                                    <thead class="table-light">
                                                        <tr>        
                                                            <th>No.Folio</th>
                                                            <th>Total</th>
                                                            <th>Estado del pago</th>
                                                            <th>Estatus de la orden</th>
                                                            <th>Tipo de pago</th>
                                                            <th>Cupon</th>
                                                            <th>Accion</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="list form-check-all">
                                                        <tr>
                                                        <td>Numero de folio de la orden</td>
                                                        <td>$Monto total</td>
                                                        <td>Estado de pago de la orden</td>
                                                        <td><span class="badge bg-success">Estado de la orden</span></td>
                                                        <td>Tipo de pago de la orden</td>
                                                        <td>Codigo de cupon</td>
                                                            <td>
                                                                <div class="d-flex gap-3">
                                                                    <div class="view">
                                                                        <a href="" class="btn btn-info">
                                                                            <i class="bx bx-show"></i>
                                                                        </a>
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
        </div>

        <!-- Footer de la pagina -->
        <?php include "../layouts/footer.template.php" ?>
        <!-- JAVASCRIPT -->
        <?php include "../layouts/scripts.template.php" ?>
</body>

</html>


