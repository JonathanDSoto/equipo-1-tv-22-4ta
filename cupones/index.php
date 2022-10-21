<?php
include_once "../app/config.php";
?>
<!DOCTYPE html>
<head>
    <title>Catalogos</title>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
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
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Cupones</h4>
                        </div>
                    </div>
                </div><!-- Buttons with Label -->
                <button class="btn btn-primary btn-label waves-effect waves-light mb-3" data-bs-target="#añadirModal" data-bs-toggle="modal" type="button"><i class="bx bx-plus label-icon align-middle fs-16 me-2"></i> Añadir cupon</button>
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-xxl-4">
                                <div class="card card-primary">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0"><img alt="" class="avatar-md" src="../public/assets/images/cupones.png"></div>
                                            <div class="flex-grow-1 ms-3">
                                                <h5 class="card-title">Nombre del cupon</h5>
                                                <h3 class="text-muted">Codigo del cupon</h3>
                                                <p class="text-muted">Fecha de comiencio:</p>  
                                                <p class="text-muted">Fecha de expiracion:</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <!-- Border Buttons -->
                                        <div class="hstack flex-wrap gap-2 mb-3 mb-lg-0">
                                            <button class="btn btn-success btn-border">Ver</button> <button class="btn btn-warning btn-border" data-bs-target="#añadirModal" data-bs-toggle="modal">Editar</button> <button class="btn btn-danger btn-border">Eliminar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- Footer de la pagina -->
        <?php include "../layouts/footer.template.php" ?>
        <!-- MODAL DE AÑADIR Y EDITAR -->
        <div class="modal fade" id="añadirModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="añadirModalLabel">Introdusca los datos</h5><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                    </div>
                    <form action="" enctype="multipart/form-data" method="">
                        <div class="modal-body">
                            <span class="input-group-text" id="name">Nombre</span>
                            <input class="form-control" id="name" name="name" placeholder="" type="text">
                            <span class="input-group-text" id="code">Codigo</span>
                            <input class="form-control" id="code" name="code" placeholder="" type="text">
                            <span class="input-group-text" id="percentage_discount">Porcentaje de descuento</span>
                            <input class="form-control" id="percentage_discount" name="percentage_discount" placeholder="" type="text">
                            <span class="input-group-text" id="min_amount_required">Monto minimo requerido</span>
                            <input class="form-control" id="min_amount_required" name="min_amount_required" placeholder="" type="text">
                            <span class="input-group-text" id="start_date">Fecha de inicio</span>
                            <input class="form-control" id="start_date" name="start_date" placeholder="" type="date">
                            <span class="input-group-text" id="end_date">Fecha de vencimiento</span>
                            <input class="form-control" id="end_date" name="end_date" placeholder="" type="date">
                            <span class="input-group-text" id="max_uses">Cantidad de usos</span>
                            <input class="form-control" id="max_uses" name="max_uses" placeholder="" type="text">
                            <span class="input-group-text" id="couponable_type">Tipo de cupon</span>
                            <input class="form-control" id="couponable_type" name="couponable_type" placeholder="" type="text">
                        </div>
                        <input name="action" type="hidden" value="create">
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Cancelar</button> <button class="btn btn-primary" type="submit">Guardar cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- JAVASCRIPT -->
        <?php include "../layouts/scripts.template.php" ?>
    </div>
</body>
