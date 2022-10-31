<?php
include_once "../app/config.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ordenes</title>
	<meta charset="UTF-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1.0" name="viewport"><?php include "../layouts/head.template.php" ?><!-- Sweet Alert css-->
	
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
							<h4 class="mb-sm-0">Ordenes</h4>
							<div class="page-title-right">
								<ol class="breadcrumb m-0">
									<li class="breadcrumb-item active">Ordenes</li>
								</ol>
							</div>
						</div>
					</div>
				</div><!-- end page title -->
				<div class="row">
					<div class="col-lg-12">
						<div class="card" id="orderList">
							<div class="card-header border-0">
								<div class="d-flex align-items-center">
									<h5 class="card-title mb-0 flex-grow-1">Historial de Ordenes</h5>
									<div class="flex-shrink-0">
										<button class="btn btn-success add-btn" data-bs-target="#showModal" data-bs-toggle="modal" id="create-btn" type="button"><i class="ri-add-line align-bottom me-1"></i> Create Order</button>
									</div>
								</div>
							</div>
							<div class="card-body border border-dashed border-end-0 border-start-0">
								<form>
									<div class="row g-3">
										<div class="col-xxl-2 col-sm-3">
											<div>
												<label class="form-label" for="exampleInputdate">Buscar una orden por fecha</label> <input class="form-control" id="demo-datepicker" type="date">
											</div>
										</div>
									</div><!--end row-->
								</form>
							</div>
							<div class="card-body pt-0">
								<div>
									<ul class="nav nav-tabs nav-tabs-custom nav-success mb-3" role="tablist">
										<li class="nav-item"><span aria-selected="true" class="nav-link active All py-3" data-bs-toggle="tab" id="All" role="tab"><i class="ri-store-2-fill me-1 align-bottom"></i> Todas las ordenes</span></li>
									</ul>
									<div class="table-responsive table-card mb-1">
										<table class="table table-nowrap align-middle" id="orderTable">
											<thead class="text-muted table-light">
												<tr class="text-uppercase">
													<th scope="col" style="width: 25px;">
														<div class="form-check">
															<input class="form-check-input" id="checkAll" type="checkbox" value="option">
														</div>
													</th>
													<th class="sort" data-sort="id">No.Folio</th>
													<th class="sort" data-sort="customer_name">Cliente</th>
													<th class="sort" data-sort="product_name">Producto</th>
													<th class="sort" data-sort="date">Fecha de orden</th>
													<th class="sort" data-sort="amount">Monto</th>
													<th class="sort" data-sort="status">Estado del producto</th>
													<th class="sort" data-sort="city">Accion</th>
												</tr>
											</thead>
											<tbody class="list form-check-all">
												<tr>
													<th scope="row">
														<div class="form-check">
															<input class="form-check-input" name="checkAll" type="checkbox" value="option1">
														</div>
													</th>
													<td class="id">
														<a class="fw-medium link-primary" href="apps-ecommerce-order-details.html">#NMFOLIO</a>
													</td>
													<td class="customer_name">Nombre del cliente</td>
													<td class="product_name">Nombre del producto</td>
													<td class="date">Fecha del pedido</td>
													<td class="amount">Monto</td>
													<td class="status"><span class="badge badge-soft-warning text-uppercase">Estado del producto</span></td>
													<td>
														<ul class="list-inline hstack gap-2 mb-0">
															<li class="list-inline-item" data-bs-placement="top" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Ver detalles">
																<a class="text-primary d-inline-block" href="apps-ecommerce-order-details.html"><i class="ri-eye-fill fs-16"></i></a>
															</li>
															<li class="list-inline-item edit" data-bs-placement="top" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Editar">
																<a class="text-primary d-inline-block edit-item-btn" data-bs-toggle="modal" href="#showModal"><i class="ri-pencil-fill fs-16"></i></a>
															</li>
															<li class="list-inline-item" data-bs-placement="top" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Eliminar orden">
																<a class="text-danger d-inline-block remove-item-btn" data-bs-toggle="modal" href="#deleteOrder"><i class="ri-delete-bin-5-fill fs-16"></i></a>
															</li>
														</ul>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<table class="table table-nowrap align-middle" id="orderTable">
											<thead class="text-muted table-light">
												<tr class="text-uppercase">
													<th scope="col" style="width: 25px;">
														<div class="form-check">
															<input class="form-check-input" id="checkAll" type="checkbox" value="option">
														</div>
													</th>
													<th class="sort" data-sort="id">No.Folio</th>
													<th class="sort" data-sort="customer_name">Cliente</th>
													<th class="sort" data-sort="product_name">Producto</th>
													<th class="sort" data-sort="date">Fecha de orden</th>
													<th class="sort" data-sort="amount">Monto</th>
													<th class="sort" data-sort="status">Estado del producto</th>
													<th class="sort" data-sort="city">Accion</th>
												</tr>
											</thead>
											<tbody class="list form-check-all">
												<tr>
													<th scope="row">
														<div class="form-check">
															<input class="form-check-input" name="checkAll" type="checkbox" value="option1">
														</div>
													</th>
													<td class="id">
														<a class="fw-medium link-primary" href="apps-ecommerce-order-details.html">#NMFOLIO</a>
													</td>
													<td class="customer_name">Nombre del cliente</td>
													<td class="product_name">Nombre del producto</td>
													<td class="date">Fecha del pedido</td>
													<td class="amount">Monto</td>
													<td class="status"><span class="badge badge-soft-warning text-uppercase">Estado del producto</span></td>
													<td>
														<ul class="list-inline hstack gap-2 mb-0">
															<li class="list-inline-item" data-bs-placement="top" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Ver detalles">
																<a class="text-primary d-inline-block" href="apps-ecommerce-order-details.html"><i class="ri-eye-fill fs-16"></i></a>
															</li>
															<li class="list-inline-item edit" data-bs-placement="top" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Editar">
																<a class="text-primary d-inline-block edit-item-btn" data-bs-toggle="modal" href="#showModal"><i class="ri-pencil-fill fs-16"></i></a>
															</li>
															<li class="list-inline-item" data-bs-placement="top" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Eliminar orden">
																<a class="text-danger d-inline-block remove-item-btn" data-bs-toggle="modal" href="#deleteOrder"><i class="ri-delete-bin-5-fill fs-16"></i></a>
															</li>
														</ul>
													</td>
												</tr>
											</tbody>
										</table>						

								<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="showModal" tabindex="-1">
									<div class="modal-dialog modal-dialog-centered">
										<div class="modal-content">
											<div class="modal-header bg-light p-3">
												<h5 class="modal-title" id="exampleModalLabel"></h5><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" id="close-modal" type="button"></button>
											</div>
											<form action="#">
												<div class="modal-body">
													<input id="id-field" type="hidden">
													<div class="mb-3" id="modal-id">
														<label class="form-label" for="orderId">Folio</label> <input class="form-control" id="orderId" placeholder="Numero de folio" readonly type="text">
													</div>
													<div class="mb-3">
														<label class="form-label" for="customername-field">Cliente</label> <select class="form-control" data-trigger="" id="productname-field" name="productname-field">
															<option value="">
																Selecione un cliente
															</option>
														</select>
													</div>
													<div class="mb-3">
														<label class="form-label" for="productname-field">Producto</label> <select class="form-control" data-trigger="" id="productname-field" name="productname-field">
															<option value="">
																Selecione un producto
															</option>
														</select>
													</div>
													<div class="mb-3">
														<label class="form-label" for="date-field">Fecha del pedido</label> <input class="form-control" data-date-format="d M, Y" data-enable-time="" data-provider="flatpickr" id="date-field" placeholder="Select date" required="" type="date">
													</div>
													<div class="row gy-4 mb-3">
														<div class="col-md-6">
															<div>
																<label class="form-label" for="amount-field">Monto</label> <input class="form-control" id="amount-field" placeholder="Total amount" required="" type="text">
															</div>
														</div>
														<div class="col-md-6">
															<div>
																<label class="form-label" for="payment-field">Metodo de pago</label> <select class="form-control" data-trigger="" id="payment-field" name="payment-method">
																	<option value="">
																		Seleccione el metodo de pago
																	</option>
																</select>
															</div>
														</div>
													</div>
													<div>
														<label class="form-label" for="delivered-status">Direccion</label> <select class="form-control" data-trigger="" id="delivered-status" name="delivered-status">
															<option value="">
																Seleccione la direccion
															</option>
														</select>
													</div>
													<div>
														<label class="form-label" for="delivered-status">Cupon</label> <select class="form-control" data-trigger="" id="delivered-status" name="delivered-status">
															<option value="">
																Seleccione un cupon
															</option>
														</select>
													</div>
													<div>
														<label class="form-label" for="delivered-status">Estado del pedido</label> <select class="form-control" data-trigger="" id="delivered-status" name="delivered-status">
															<option value="">
																Seleccione el estado del pedido
															</option>
														</select>
													</div>
												</div>
												<div class="modal-footer">
													<div class="hstack gap-2 justify-content-end">
														<button class="btn btn-light" data-bs-dismiss="modal" type="button">Close</button> <button class="btn btn-success" id="add-btn" type="submit">Add Order</button> <button class="btn btn-success" id="edit-btn" type="button">Update</button>
													</div>
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