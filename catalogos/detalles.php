<?php
include_once "../app/config.php";
include "../layouts/Authentication.templade.php";
include("../app/CategorieController.php");
include("../app/BrandController.php");
include("../app/TagsController.php");


$type = $_GET['type'];

if ($type == "categoria") {
	$id_categoria = $_GET['id'];
	$categoryController = new CategorieController();
	$response = $categoryController->GetSpecifictCategorie($id_categoria);
} else if ($type == "marca") {
	$id_marca = $_GET['id'];
	$brandsController = new BrandsController();
	$response = $brandsController->SpecifictBrand($id_marca);
} else if ($type == "etiqueta") {
	$id_etiqueta = $_GET['id'];
	$tagsController = new TagsController();
	$response = $tagsController->GetSpecifictTags($id_etiqueta);
}

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
					<p><?= $response->name ?></p>
				</div>
				<div class="mt-4 text-muted">
					<h5 class="fs-14">Descripcion:</h5>
					<p><?= $response->description ?></p>
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
												<?php foreach ($response->products as $p): ?>
													<tr>
														<td><img alt="Card image cap" class="rounded-2" src="<?= $p->cover ?>" style="width:200px; height:100px;"></td>
														<td><?= $p->name ?></td>
														<td><?= $p->description ?></td>
														<td>
															<a class="btn btn-info" href="<?= BASE_PATH ?>prod/<?= $p->slug ?>">Ver</a>
														</td>
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
	</div><!-- Footer de la pagina -->
	<?php include "../layouts/footer.template.php" ?><!-- JAVASCRIPT -->
	<?php include "../layouts/scripts.template.php" ?>
</body>
</html>