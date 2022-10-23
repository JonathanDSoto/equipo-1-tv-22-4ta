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
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div>
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
                                                        <div class="col-sm-auto">

                                                            <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#añadirModal"><i class="ri-add-line align-bottom me-1"></i>Añadir direccion</button>
                                                            <button class="btn btn-warning " data-bs-toggle="modal" data-bs-target="#añadirModal">Editar</button>
                                                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="">Remover</button>
                                                        </div>

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
    <div aria-hidden="true" class="modal fade flip" id="deleteOrder" tabindex="-1">
									<div class="modal-dialog modal-dialog-centered">
										<div class="modal-content">
											<div class="modal-body p-5 text-center">
												<div class="mt-4 text-center">
													<h4>¿Estas seguro de eliminar esta orden?</h4>
													<p class="text-muted fs-15 mb-4">Eliminar esta orden borrara sus datos de la base de datos</p>
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