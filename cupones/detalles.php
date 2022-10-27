<?php
    include_once "../app/config.php";
	include("../app/CouponesController.php");
	
	$id = $_GET['id'];

    $couponesController = new CouponesController();
    $coupon = $couponesController->GetSpecifictCoupones($id);

?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Detalles del cupon</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
	<meta content="Themesbrand" name="author"><?php include "../layouts/head.template.php" ?>
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
					<div class="profile-wid-bg"><img alt="" class="profile-wid-img" src="../public/assets/images/cupones.jpg"></div>
				</div>
				<div class="pt-4">
					<div class="row g-4">
						<div class="col">
							<div class="p-2">
								<h3 class="text-white mb-1 aling-center">Nombre del cupon</h3>
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
											<div class="card"></div>
											<div class="card">
												<div class="card-body">
													<h5 class="card-title mb-3">Informacion del cupon</h5>
													<div class="table-responsive">
														<table class="table table-borderless mb-0">
															<tbody>
																<tr>
																	<th class="ps-0" scope="row">Nombre:</th>
																	<td class="text-muted"><?= $coupon->name ?></td>
																</tr>
																<tr>
																	<th class="ps-0" scope="row">Codigo:</th>
																	<td class="text-muted"><?= $coupon->code ?></td>
																</tr>
																<tr>
																	<th class="ps-0" scope="row">Porcentaje de descuento:</th>
																	<td class="text-muted">%<?= $coupon->percentage_discount ?></td>
																</tr>
																<tr>
																	<th class="ps-0" scope="row">Minimo de monto requerido:</th>
																	<td class="text-muted"><?= $coupon->min_amount_required ?></td>
																</tr>
																<tr>
																	<th class="ps-0" scope="row">Minimo de producto requerido:</th>
																	<td class="text-muted"><?= $coupon->min_product_required ?></td>
																</tr>
																<tr>
																	<th class="ps-0" scope="row">Comienzo del cupón:</th>
																	<td class="text-muted"><?= $coupon->start_date ?></td>
																</tr>
																<tr>
																	<th class="ps-0" scope="row">Caducidad del cupón:</th>
																	<td class="text-muted"><?= $coupon->end_date ?></td>
																</tr>
																<tr>
																	<th class="ps-0" scope="row">Maximo de usos:</th>
																	<td class="text-muted"><?= $coupon->max_uses ?></td>
																</tr>
																<tr>
																	<th class="ps-0" scope="row">Usos:</th>
																	<td class="text-muted"><?= $coupon->count_uses ?></td>
																</tr>
																<tr>
																	<th class="ps-0" scope="row">¿Valido solo la primera compra?:</th>
																	<td class="text-muted"><?= $coupon->valid_only_first_purchase ?></td>
																</tr>
																<tr>
																	<th class="ps-0" scope="row">Estado del cupón:</th>
																	<td class="text-muted"><?= $coupon->status ?></td>
																</tr>
																<tr>
																	<th class="ps-0" scope="row">Tipo de cupón:</th>
																	<td class="text-muted"><?= $coupon->couponable_type ?></td>
																</tr>
															</tbody>
														</table>
														<div class="col-xl-3 col-md-6">
															<div class="card card-animate bg-primary mt-2">
																<div class="card-body">
																	<div class="d-flex justify-content-between">
																		<div>
																			<p class="fw-medium text-white-50 mb-0">Total descontado</p>
																			<h2 class="mt-4 ff-secondary fw-semibold text-white">$1000</h2>
																		</div>
																		<div>
																			<div class="avatar-sm flex-shrink-0">
																				<span class="avatar-title bg-soft-light rounded-circle fs-2 shadow"><i class="ri-refund-2-fill"></i></span>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>	
														<table class="table table-nowrap mb-0">
															<thead>
																<tr>
																	<th scope="col">ID de la orden</th>
																	<th scope="col">Cliente</th>
																	<th scope="col">Estado de la orden</th>
																	<th scope="col">Monto</th>
																	<th scope="col">Metodo de pago</th>
																</tr>
															</thead>
															<tbody>
																<?php foreach ($coupon->orders as $c): ?>
																	<tr>
																		<td><?= $c->id ?></td>
																		<td><?= $c->client_id ?></td>
																		<td><?= $c->order_status_id ?></td>
																		<td><?= $c->total ?></td>
																		<td><?= $c->payment_type_id ?></td>
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
	<!-- JAVASCRIPT -->
	<?php include "../layouts/footer.template.php" ?><?php include "../layouts/scripts.template.php" ?>
</body>
