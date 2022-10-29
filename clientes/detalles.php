<?php
include_once "../app/config.php";
include ("../app/ClientsController.php");

$id = $_GET['id'];

$clientsController = new ClientsController();
$client = $clientsController->SpecifictClient($id);

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
                        <!--end col-->
                        <div class="col-xxl-12">
                            <div class="p-2">
                                <h3 class="text-white mb-1"><?= $client->name ?></h3>
                                <p class="text-white-75">Nivel del cliente: <?= $client->level->name ?></p>
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
                                        <div class="col-xxl-12">
                                            <div class="card">

                                            </div>

                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-3">Información</h5>
                                                    <div class="table-responsive">
                                                        <table class="table table-borderless mb-0">
                                                            <tbody>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Nombre Completo:</th>
                                                                    <td class="text-muted"><?= $client->name ?></td>
                                                                </tr>

                                                                <tr>
                                                                    <th class="ps-0" scope="row">E-mail:</th>
                                                                    <td class="text-muted"><?= $client->email ?></td>
                                                                </tr>

                                                                <tr>
                                                                    <th class="ps-0" scope="row">Numero de telefono</th>
                                                                    <td class="text-muted"><?= $client->phone_number ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <hr>
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
                                                        <hr>
                                                        <h5 class="card-title mb-3">Ordenes</h5>
                                                        
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">#ID</th>
                                                                    <th scope="col">Folio</th>
                                                                    <th scope="col">Total</th>
                                                                    <th scope="col">Estado del pago</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($client->orders as $order): ?>
                                                                    <tr>
                                                                        <td><?= $order->id ?></td>
                                                                        <td><?= $order->folio ?></td>
                                                                        <td><?= $order->total ?></td>
                                                                        <td><span class="badge bg-success">Estado del pago</span></td>
                                                                        <td><button class="btn btn-info">Ver</button>
                                                                       
                                                                    </td>
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                            </tbody>
                                                        </table> 
                                                        <h5 class="card-title mb-3">Direcciones registradas</h5>
                                                        <button class="btn btn-primary btn-label waves-effect waves-light mb-3" data-bs-target="#añadirDireccion" data-bs-toggle="modal" type="button" id="add-btn"><i class="bx bx-plus label-icon align-middle fs-16 me-2"></i> Añadir direccion</button>
                                                        <table class="table table-borderless mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Calle y número</th>
                                                                    <th scope="col">Codigo postal</th>
                                                                    <th scope="col">Ciudad</th>
                                                                    <th scope="col">Provincia</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($client->addresses as $address): ?>
                                                                    <tr>
                                                                        <td><?= $address->street_and_use_number ?></td>
                                                                        <td><?= $address->postal_code ?></td>
                                                                        <td><?= $address->city ?></td>
                                                                        <td><?= $address->province ?></td>
                                                                        <td><button class="btn btn-info">Ver</button>
                                                                        <button class="btn btn-warning " data-bs-toggle="modal" data-bs-target="#añadirModal">Editar</button>
                                                                        <button class="btn btn-danger" onclick="">Eliminar</button></td>
                                                                    </tr>
                                                                <?php endforeach; ?>
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
       
    </div>

    <div class="modal fade" id="añadirDireccion">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="añadirDireccion">Introduzca los datos</h5><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                    </div>
                    <form method="POST" action="" enctype="multipart/form-data" id="coupon_form">
                        <div class="modal-body">

                            <span class="input-group-text">Nombre</span>
                            <input class="form-control" id="name" name="name" type="text">

                            <span class="input-group-text">Apellido</span>
                            <input class="form-control" id="code" name="code" type="text">

                            <span class="input-group-text">Nombre de calle y numero</span>
                            <input class="form-control" id="percentage_discount" name="percentage_discount" type="text">

                            <span class="input-group-text">Codigo postal</span>
                            <input class="form-control" id="min_amount_required" name="min_amount_required" type="text">

                            <span class="input-group-text">Ciudad</span>
                            <input class="form-control" id="min_product_required" name="min_product_required" type="text">

                            <span class="input-group-text">Provincia</span>
                            <input class="form-control" id="start_date" name="start_date" type="text">

                            <span class="input-group-text">Numero de celular</span>
                            <input class="form-control" id="end_date" name="end_date" type="text">
    
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Cancelar</button>
                            <button class="btn btn-primary" type="submit">Guardar cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <div class="modal fade" id="añadirModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="añadirModalLabel"> Datos de la direccion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="" action="" enctype="multipart/form-data">
                    <div class="modal-body">
                        <span class="input-group-text" id="description">Calle y numero</span>
                        <input type="text" id="description" name="description" class="form-control" placeholder="">
                        <span class="input-group-text" id="code">Codigo postal</span>
                        <input type="text" id="code" name="code" class="form-control" placeholder="">
                        <span class="input-group-text" id="estatus">Ciudad</span>
                        <input type="text" id="estatus" name="estatus" class="form-control" placeholder="">
                        <span class="input-group-text" id="stock">Provincia</span>
                        <input type="text" id="stock" name="stock" class="form-control" placeholder="">
                    </div>
                    <input type="hidden" name="action" value="create">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal ELIMINAR -->
    <div aria-hidden="true" class="modal fade flip" id="eliminarDireccion" tabindex="-1">
									<div class="modal-dialog modal-dialog-centered">
										<div class="modal-content">
											<div class="modal-body p-5 text-center">
												<div class="mt-4 text-center">
													<h4>¿Estas seguro de eliminar esta direccion?</h4>
													<p class="text-muted fs-15 mb-4">Eliminar esta direccion borrara sus datos de la base de datos</p>
													<div class="hstack gap-2 justify-content-center remove">
														<button class="btn btn-link link-success fw-medium text-decoration-none" data-bs-dismiss="modal" id="deleteRecord-close"><i class="ri-close-line me-1 align-middle"></i> Close</button> <button class="btn btn-danger" id="delete-record">Yes, Delete It</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
   
    <?php include "../layouts/footer.template.php" ?>
    <!-- JAVASCRIPT -->
    <?php include "../layouts/scripts.template.php" ?>
</body>

</html>