<?php
include_once "../app/config.php";
include "../layouts/Authentication.templade.php";
include("../app/ProductController.php");
include("../app/PresentationController.php");

$id_presentacion = $_GET['id'];

$presentationController = new PresentationController();
$presentation = $presentationController->GetPresentationSpecific($id_presentacion);

if (is_null($presentation->current_price->amount)) {
	$flag = true;
} else {
	$flag = false;
}

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
												<div class="swiper-slide"><img alt="" class="img-fluid d-block" src="<?= $presentation->cover ?>"></div>
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
																	<?php if(!is_null($presentation->current_price) ): ?>
																		<h5 class="mb-0">$<?= $presentation->current_price->amount ?></h5>
                                                                    <?php endif; ?>
															</div>
														</div>
													</div>
													<div class="add">
														<button class="btn btn-outline-dark waves-effect waves-light shadow-none mt-3" data-bs-toggle="modal" data-bs-target="#editarPrecio" id="btn-add" type="button">
															Añadir Precio
														</button>
													</div>
													<div class="edit">
														<button data-presentation='<?= json_encode($presentation) ?>' onclick="edit_price(this)" class="btn btn-outline-dark waves-effect waves-light shadow-none mt-3" data-bs-toggle="modal" data-bs-target="#editarPrecio" id="btn-edit">
															Editar Precio
														</button>
													</div>
												</div>
											</div>
											<div class="mt-4 text-muted">
												<h5 class="fs-14">Codigo de la prsentacion:</h5>
												<p><?= $presentation->code ?></p>
											</div>
											<div class="mt-4 text-muted">
												<h5 class="fs-14">Peso en gramos:</h5>
												<p><?= $presentation->weight_in_grams ?></p>
											</div>
											<div class="mt-4 text-muted">
												<h5 class="fs-14">Estatus:</h5>
												<p><?= $presentation->status ?></p>
											</div>
											<div class="mt-4 text-muted">
												<h5 class="fs-14">Stock:</h5>
												<p><?= $presentation->stock ?></p>
											</div>
											<div class="mt-4 text-muted">
												<h5 class="fs-14">Stock minimo:</h5>
												<p><?= $presentation->stock_min ?></p>
											</div>
											<div class="mt-4 text-muted">
												<h5 class="fs-14">Stock maximo:</h5>
												<p><?= $presentation->stock_max ?></p>
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
					<h5 class="modal-title" id="title">Añadir precio</h5>
					<button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
				</div>
				<form method="POST" action="<?= BASE_PATH?>app/PresentationController.php" enctype="multipart/form-data" id="amount_form">
					<div class="modal-body">
						<span class="input-group-text">Precio</span> 
						<input class="form-control" id="amount" name="amount" placeholder="" type="text">
					</div>
					<input id="action" name="action" type="hidden" value="create_amount">
					<?php if(!is_null($presentation->current_price) ): ?>
						<input id="amount_now" type="hidden" value="<?= $presentation->current_price->amount ?>">
					<?php else: ?>
						<input id="amount_now" type="hidden" value="">
                    <?php endif; ?>
					<input id="flag" type="hidden" value="<?= $flag ?>">
					<input type="hidden" name="super_token" id="super_token" value="<?= $_SESSION['super_token'] ?>">
					<input type="hidden" name="presentation_id" id="presentation_id" value="<?= $id_presentacion ?>">

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
	<script>
		let form = document.getElementById("amount_form")
		let amount = document.getElementById("amount")
		let action = document.getElementById("action")
		let amount_now = document.getElementById("amount_now")
		let id = document.getElementById("presentation_id")
		let flag = document.getElementById("flag")
		let super_token = document.getElementById("super_token")
		
		let add_btn = document.getElementById("btn-add")
		let edit_btn = document.getElementById("btn-edit")
		let title = document.getElementById("title")

		window.addEventListener('load', function() {
			edit_btn.style.display = "none"

			if (flag.value == false) {
				edit_btn.style.display = "block"
				add_btn.style.display = "none"
				title.innerText = "Editar precio"
			} else if (flag.value) {
				add_btn.style.display = "block"
				edit_btn.style.display = "none"
				title.innerText = "Añadir precio"
			}
		});

		form.addEventListener("submit", (e) => {
			e.preventDefault();
			
			const data = new FormData();
				data.append("amount", amount.value);
				data.append("presentation_id", id.value);
				data.append("flag", flag.value);
				data.append("action", action.value);
				data.append("super_token", super_token.value);

				axios({
					method: "POST",
					url: "../app/PresentationController.php",
					data,
					headers: {
					"Content-Type": "multipart/form-data",
					},
				}).then((response)=> {
					let res = JSON.stringify(response)
					res = JSON.parse(res)

					if (res.data[0].code > 0 && res.data.update == false) {
						Swal.fire({
						position: 'top-center',
						icon: 'success',
						title: 'Precio añadido con exito',
						showConfirmButton: false,
						timer: 1500
						})
						function greet() {
							location.reload();
						}
						setTimeout(greet, 1800);
					} else if (res.data[0].code > 0 && res.data.update) {
						Swal.fire({
						position: 'top-center',
						icon: 'success',
						title: 'Precio actualizado con exito',
						showConfirmButton: false,
						timer: 1500
						})
						function greet() {
							location.reload();
						}
						setTimeout(greet, 1800);
					} else {
						console.log(response.message);

						Swal.fire({
							position: 'center',
							icon: 'error',
							title: 'Error',
							showConfirmButton: false,
							timer: 1500
						})
					} 
				}).catch((error) => {
					if (error.response) {
						console.log(error.message);
					}
				});

		});

		function edit_price(target) {

			let presentation = JSON.parse( target.dataset.presentation )

			amount.value = presentation.current_price.amount
		}

	</script>
</body>
</html>