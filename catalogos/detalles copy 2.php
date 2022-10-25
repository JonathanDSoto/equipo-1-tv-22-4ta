<?php
include_once "../app/config.php";

?>
<!DOCTYPE html>
<head>
	<title>Shop</title>
	<meta charset="UTF-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1.0" name="viewport"><?php include "../layouts/head.template.php" ?>
</head>
<body>
	<!-- NAVAR -->
	<?php include "../layouts/nav.template.php" ?>
	<!-- SIDEBAR -->
	<?php include "../layouts/side.template.php" ?>
	<!-- CONTENIDO-->
	<div class="main-content">
		<div class="page-content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<div class="page-title-box d-sm-flex align-items-center justify-content-between">
							<h4 class="mb-sm-0">Nombre del catalogo</h4>
							<div class="page-title-right">
								<ol class="breadcrumb m-0">
									<li class="breadcrumb-item">
										<a href="">Catalogos</a>
									</li>
									<li class="breadcrumb-item active">Nombre del catalogo</li>
								</ol>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title mb-0">Lista de productos</h4>
							</div>
							<div class="card-body">
								<div id="customerList">
									<div class="row g-4 mb-3">
										<div class="col-sm-auto">
											<div>
												<button class="btn btn-success add-btn" data-bs-target="#añadirModal" data-bs-toggle="modal" id="create-btn" type="button"><i class="ri-add-line align-bottom me-1"></i>Añadir Productos</button>
											</div>
										</div>
									</div>
									<div class="table-responsive table-card mt-3 mb-1">
										<table class="table align-middle table-nowrap" id="customerTable">
											<thead class="table-light">
												<tr>
													<th scope="col" style="width: 40px;"></th>
													<th>Producto</th>
													<th>Nombre</th>
													<th>Descripcion</th>
													<th>Accion</th>
												</tr>
											</thead>
											<tbody class="list form-check-all">
												<tr>
													<th scope="row"></th>
													<td class="customer_name"><img alt="Card image cap" class="rounded-2" src="../public/assets/images/small/img-1.jpg" style="width:200px; height:100px;"></td>
													<td>Nombre del producto</td>
													<td>Descripcion</td>
													<td>
														<div class="d-flex gap-3">
															<div class="view">
																<a class="btn btn-info" data-bs-target="" data-bs-toggle="modal" href="">Ver</a>
															</div>
															<div class="edit">
																<button class="btn btn-warning" data-bs-target="#añadirModal" data-bs-toggle="modal">Edit</button>
															</div>
															<div class="remove">
																<button class="btn btn-danger" data-bs-target="" data-bs-toggle="modal">Remove</button>
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
	</div><!-- Footer de la pagina -->
	<?php include "../layouts/footer.template.php" ?>
	<div class="modal fade" id="añadirModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="añadirModalLabel">Detalles del producto</h5><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
				</div>
				<form action="" enctype="multipart/form-data" method="">
					<div class="modal-body">
						<span class="input-group-text" id="addon-wrapping">Imagen del producto</span> <input name="img_producto" type="file"> <span class="input-group-text" id="addon-wrapping">Nombre</span> <input class="form-control" id="name" name="name" placeholder="" type="text"> <span class="input-group-text" id="addon-wrapping">Descripcion</span> <input class="form-control" id="description" name="description" placeholder="" type="text"> <span class="input-group-text" id="addon-wrapping">Caracteristicas</span> <input class="form-control" id="features" name="features" placeholder="" type="text"> <span class="input-group-text" id="addon-wrapping">Marca</span> <select aria-label="Default select example" class="form-select" id="brand_id" name="brand_id">
							<option selected>
								Seleccione una opcion
							</option>
						</select>
					</div><input name="action" type="hidden" value="create">
					<div class="modal-footer">
						<button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Cancelar</button> <button class="btn btn-primary" type="submit">Guardar cambios</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	 <!-- JAVASCRIPT -->
	 <?php include "../layouts/scripts.template.php" ?>
</body>
