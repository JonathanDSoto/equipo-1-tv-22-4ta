<?php
include_once "../app/config.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Detalles de Orden</title>
	<meta charset="UTF-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1.0" name="viewport"><?php include "../layouts/head.template.php" ?><!-- Sweet Alert css-->
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
                        <div class="table-responsive table-card">
                            <table class="table table-nowrap align-middle table-borderless mb-0">
                                <thead class="table-light text-muted">
                                    <tr>
                                        <th scope="col">Detalles del producto</th>
                                        <th scope="col">Precio del producto</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Monto total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 avatar-md bg-light rounded p-1">
                                                    <img src="../public/assets/images/products/img-8.png" alt="" class="img-fluid d-block">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h5 class="fs-15"><a href="" class="link-primary">Descripcion</a></h5>
                                                    <p class="text-muted mb-0">Estado: <span class="fw-medium">Estado del producto</span></p>
                                                    <p class="text-muted mb-0">Codigo: <span class="fw-medium">Codigo del producto</span></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>$MONTO DEL PRODUCTO</td>
                                        <td>CANTIDAD PEDIDA</td>
                                        <td>$MONTO TOTAL  </td>     
                                    </tr>
                                  
                                
                                    <tr class="border-top border-top-dashed">
                                        <td colspan="3"></td>
                                        <td colspan="2" class="fw-medium p-0">
                                            <table class="table table-borderless mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td>Sub Total :</td>
                                                        <td class="text-end">$SUBTOTAL DE LA ORDEN</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Discount <span class="text-muted">(CODIGO DEL CUPON)</span> : :</td>
                                                        <td class="text-end">-$MONTO DESCONTADO</td>
                                                    </tr>
                                                

                                                    <tr class="border-top border-top-dashed">
                                                        <th scope="row">Total:</th>
                                                        <th class="text-end">$TOTAL DE LA ORDEN</th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
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
            
                <div class="card">
                    <div class="card-header pt-2 pb-2">
                        <h5 class="card-title mb-0"><i class="ri-map-pin-line align-middle me-1 text-muted"></i>Direccion de envio</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled vstack gap-2 fs-13 mb-0">
                            <li class="fw-medium fs-14">Nombre de la calle y num</li>
                            <li>Codigo postal</li>
                            <li>Ciudad</li>
                            <li>Provincia</li>
                        </ul>
                    </div>
                </div>
               
              

                <div class="card">
                    <div class="card-header pt-2 pb-2">
                        <h5 class="card-title mb-0"><i class="ri-secure-payment-line align-bottom  text-muted"></i>Detalles de pago</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <div class="flex-shrink-0">
                                <p class="text-muted mb-0">Metodo de pago:</p>
                            </div>
                            <div class="flex-grow-1 ">
                                <h6 class="mb-0">Metododo de pago seleccionado</h6>
                            </div>
                        </div>
                                         
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <p class="text-muted mb-0">Monto total:</p>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <h6 class="mb-0">$MONTO TOTAL</h6>
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