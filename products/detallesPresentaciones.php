<?php
include_once "../app/config.php";

include("../app/ProductController.php");
include("../app/PresentationController.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Detalles</title>
	<meta charset="UTF-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1.0" name="viewport"><?php include "../layouts/head.template.php" ?>
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
							<h4 class="mb-sm-0">Detalle de presentaciones</h4>
							<div class="page-title-right">
								<ol class="breadcrumb m-0">
									<li class="breadcrumb-item">
										<a href="">"Detalles de producto</a>
									</li>
									<li class="breadcrumb-item active">Presentacion Detalles</li>
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
									<div class="col-xl-4 col-md-8 mx-auto">
										<div class="product-img-slider sticky-side-div">
											<div class="swiper product-thumbnail-slider p-2 rounded bg-light">
												<div class="swiper-slide"><img alt="" class="img-fluid d-block" src="../public/assets/images/cama.jpg"></div>
											</div>
										</div>
									</div>
									<div class="col-xl-8">
										<div class="mt-xl-0 mt-5">
											<div class="d-flex">
												<div class="flex-grow-1">
													<h4>Detalles de la presentacion</h4>
												</div>
											</div>
											<div class="row mt-4">
												<div class="col-lg-4 col-6">
													<div class="p-2 border border-dashed rounded">
														<div class="d-flex">
															<div class="avatar-sm me-3">
																<div class="avatar-title rounded bg-transparent text-success fs-24">
																	<i class=" ri-money-dollar-circle-line"></i>
																</div>
															</div>
															<div class="flex-grow-1">
																<p class="text-muted mb-1">Precio:</p>
																<h5 class="mb-0">$PRECIO DE LA PRESENTACION</h5>
															</div>
														</div>
													</div><button class="btn btn-outline-dark waves-effect waves-light shadow-none mt-3" data-bs-target="#editarPrecio" data-bs-toggle="modal" id="create-btn" type="button"><i class="ri-edit-2-fill"></i>Editar Precio</button>
												</div>
											</div>
											<div class="mt-4 text-muted">
												<h5 class="fs-14">Codigo de la prsentacion:</h5>
												<p>Codigo</p>
											</div>
											<div class="mt-4 text-muted">
												<h5 class="fs-14">Peso en gramos:</h5>
												<p>Peso</p>
											</div>
											<div class="mt-4 text-muted">
												<h5 class="fs-14">Estatus:</h5>
												<p>Estado del producto</p>
											</div>
											<div class="mt-4 text-muted">
												<h5 class="fs-14">Stock:</h5>
												<p></p>
											</div>
											<div class="mt-4 text-muted">
												<h5 class="fs-14">Stock minimo:</h5>
												<p>Stock minimo del producto</p>
											</div>
											<div class="mt-4 text-muted">
												<h5 class="fs-14">Stock maximo:</h5>
												<p>Stock maximo del producto</p>
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
    <!--Modal editar precio-->
	<div class="modal fade" id="editarPrecio">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editarPrecio">Editar precio</h5><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
				</div>
				<form action="" enctype="multipart/form-data" method="">
					<div class="modal-body">
						<span class="input-group-text" id="amount">Precio</span> <input class="form-control" id="amount" name="amount" placeholder="" type="text">
					</div><input id="action" name="action" type="hidden" value="create"> <input id="id_product" name="id" type="hidden">
					<div class="modal-footer">
						<button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Cancelar</button> <button class="btn btn-primary" type="submit">Guardar cambios</button>
					</div>
				</form>
			</div>
		</div>
	</div>
    <!-- Footer de la pagina -->
	<?php include "../layouts/footer.template.php" ?>
    <!-- JAVASCRIPT -->
	<?php include "../layouts/scripts.template.php" ?>
</body>
</html>