<?php
include_once "../app/config.php";
include "../layouts/Authentication.templade.php";
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
                                    <h5 class="card-title flex-grow-1 mb-0">Orden #Numero de folio</h5>

                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-nowrap align-middle table-borderless mb-0">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Imagen</th>
                                                <th scope="col">Descripcion</th>
                                                <th scope="col">Codigo</th>
                                                <th scope="col">Peso en gramos</th>
                                                <th scope="col">Estatus</th>                             
                                                <th scope="col">Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><img class="rounded-2" style="width:130px; height:70px;" src="../public/assets/images/cama.jpg" alt="Card image cap"></td>
                                                <td>Descripcion del producto</td>
                                                <td>Codigo del producto</td>
                                                <td>Peso del producto en gramos</td>
                                                <td><span class="badge bg-success">Estado</span></td>
                                                <td><a href="" class="btn btn-info">Ver</a></td>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                              
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
                                        </td>
                                  
                                    </tbody>
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
                                        <div class="flex-shrink-0">
                                            <img src="../public/assets/images/users/avatar-3.jpg" alt="" class="avatar-sm rounded shadow">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="fs-14 mb-1">Nombre del cliente</h6>
                                            <p class="text-muted mb-0">Cliente</p>
                                        </div>
                                    </div>
                                </li>
                                <li><i class="ri-mail-line me-2 align-middle text-muted fs-16"></i>Correo del cliente</li>
                                <li><i class="ri-phone-line me-2 align-middle text-muted fs-16"></i>Numero de telefono</li>

                                <a href="apps-invoices-details.html" class="btn btn-success col-3"><i class="ri-download-2-fill align-middle me-1"></i> Ver Perfil</a>
                            </ul>
                        </div>
                    </div>
                    <h5 class="card-title mb-0"><i class="ri-map-pin-line align-middle me-1 text-muted"></i>Direccion de envio</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Calle y numero de casa</th>
                                <th scope="col">Codigo postal</th>
                                <th scope="col">Ciudad</th>
                                <th scope="col">Provincia</th>
                                <th scope="col">Numero de telefono</th>
                                <th scope="col">Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Calle y numero del cliente</td>
                                <td>Codigo postal del cliente</td>
                                <td>Ciudad del cliente</td>
                                <td>Provincia del cliente</td>
                                <td>Numero telefonico del cliente</td>
                                <td><a href="" class="btn btn-info">Ver</a></td>
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