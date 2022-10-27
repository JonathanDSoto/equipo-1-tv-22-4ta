<?php
include_once "../app/config.php";

?>
<!DOCTYPE html>
<html>
<head>
	<title>Shop</title>
	<meta charset="UTF-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1.0" name="viewport"><?php include "../layouts/head.template.php" ?>
</head>
<body>
	<!-- NAVAR -->
	<?php include "../layouts/nav.template.php" ?><!-- SIDEBAR -->
	<?php include "../layouts/side.template.php" ?><!-- CONTENIDO-->
	<div class="main-content">
		<div class="page-content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<div class="page-title-box d-sm-flex align-items-center justify-content-between">
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
				<div class="mt-4 text-muted">
					<h5 class="fs-14">Nombre del catalogo :</h5>
					<p>Nombre</p>
				</div>
				<div class="mt-4 text-muted">
					<h5 class="fs-14">Descripcion:</h5>
					<p>Descripcion del catalaogo</p>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-body">
								<div id="customerList">
									<div class="table-responsive table-card mt-3 mb-1">
										<h4 class="card-title mb-0">Lista de productos</h4>
										<table class="table table-striped">
											<thead>
												<tr>
													<th scope="col">Imagen</th>
													<th scope="col">Nombre</th>
													<th scope="col">Descripcion</th>
													<th scope="col">Action</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><img alt="Card image cap" class="rounded-2" src="../public/assets/images/cama.jpg" style="width:200px; height:100px;"></td>
													<td>Aqui va el nombre del producto</td>
													<td>Descripcion del producto</td>
													<td>
														<a class="btn btn-info" href="">Ver</a>
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
	<?php include "../layouts/footer.template.php" ?><!-- JAVASCRIPT -->
	<?php include "../layouts/scripts.template.php" ?>
</body>
</html>