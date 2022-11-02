<?php
	include_once "../app/config.php";
    include("../app/OrdersController.php");
    include("../app/ClientsController.php");
    include("../app/productController.php");
    include("../app/CouponesController.php");

    $ordersController = new OrdersController();
    $orders = $ordersController->GetOrders();

    $clientsController = new ClientsController();
    $clients = $clientsController->GetClientes();

    $productController = new ProductsController();
    $products = $productController->getProducts();

	$couponesController = new CouponesController();
    $coupones = $couponesController->GetCoupones();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Ordenes</title>
	<meta charset="UTF-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
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
										<button class="btn btn-success add-btn" data-bs-target="#showModal" data-bs-toggle="modal" id="add-btn" type="button"><i class="ri-add-line align-bottom me-1"></i> Create Order</button>
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
										<table class="table table-nowrap align-middle" id="order_table">
											<thead class="text-muted table-light">
												<tr class="text-uppercase">
													<th scope="col" style="width: 25px;">
														<div class="form-check">
															<input class="form-check-input" id="checkAll" type="checkbox" value="option">
														</div>
													</th>
													<th class="sort" data-sort="id">No.Folio</th>
													<th class="sort" data-sort="customer_name">Cliente</th>
													<th class="sort" data-sort="amount">Monto</th>
													<th class="sort" data-sort="amount">Tipo de pago</th>
													<th class="sort" data-sort="status">Estado de la orden</th>
													<th class="sort" data-sort="city">Accion</th>
												</tr>
											</thead>
											<tbody class="list form-check-all">
												<?php foreach ($orders as $order ): ?>
													<tr>
														<th scope="row">
															<div class="form-check">
																<input class="form-check-input" name="checkAll" type="checkbox" value="option1">
															</div>
														</th>
														<td class="id">
															<a class="fw-medium link-primary" href=""><?= $order->folio ?></a>
														</td>
														<?php if(!is_null($order->client) ): ?>
															<td class="customer_name"><?= $order->client->name ?></td>
															<?php else: ?>
															<td class="customer_name"></td>
														<?php endif; ?>
														<td class="amount"><?= $order->total ?></td>
														<td class="amount"><?= $order->payment_type->name ?></td>

														<?php if($order->order_status->name == "Pagada"): ?>
															<td class="status"><span class="badge badge-soft-success text-uppercase"><?= $order->order_status->name ?></span></td>
														<?php elseif($order->order_status->name == "Cancelada"): ?>
															<td class="status"><span class="badge badge-soft-danger text-uppercase"><?= $order->order_status->name ?></span></td>
														<?php elseif($order->order_status->name == "Enviada"): ?>
															<td class="status"><span class="badge badge-soft-primary text-uppercase"><?= $order->order_status->name ?></span></td>
														<?php elseif($order->order_status->name == "Pediente de pago"): ?>
															<td class="status"><span class="badge badge-soft-warning text-uppercase"><?= $order->order_status->name ?></span></td>
														<?php elseif($order->order_status->name == "Pendiente de enviar"): ?>
															<td class="status"><span class="badge badge-soft-info text-uppercase"><?= $order->order_status->name ?></span></td>
														<?php elseif($order->order_status->name == "Abandonado"): ?>
															<td class="status"><span class="badge badge-soft-danger text-uppercase"><?= $order->order_status->name ?></span></td>
														<?php else: ?>
															<td class="status"><span class="badge badge-soft-warning text-uppercase"><?= $order->order_status->name ?></span></td>
														<?php endif; ?>
														<td>
															<ul class="list-inline hstack gap-2 mb-0">
																<li class="list-inline-item" data-bs-placement="top" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Ver detalles">
																	<a class="text-primary d-inline-block" href="detalles.php?id=<?= $order->id ?>"><i class="ri-eye-fill fs-16"></i></a>
																</li>
																<li class="list-inline-item edit" data-bs-placement="top" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Editar">
																	<a data-order='<?= json_encode($order) ?>' onclick="editar_orden(this)" class="text-primary d-inline-block edit-item-btn" id="edit-btn">
																		<i class="ri-pencil-fill fs-16"></i>
																	</a>
																</li>
																<li class="list-inline-item" data-bs-placement="top" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Eliminar orden">
																	<a class="text-danger d-inline-block remove-item-btn" onclick="eliminar_orden(<?= $order->id ?>)"><i class="ri-delete-bin-5-fill fs-16"></i></a>
																	
																	<input type="hidden" id="id_orden" value="">
																	<input type="hidden" id="super_token" value="<?= $_SESSION['super_token']?>">
                                                                    <input type="hidden" id="bp" value="<?= BASE_PATH ?>">
																</li>
															</ul>
														</td>
													</tr>
												<?php endforeach; ?>
											</tbody>
										</table>
									</div>
								</div>						

								<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="showModal" tabindex="-1">
									<div class="modal-dialog modal-dialog-centered">
										<div class="modal-content">
											<div class="modal-header bg-light p-3">
												<h5 class="modal-title" id="exampleModalLabel"></h5><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" id="close-modal" type="button"></button>
											</div>
											<form method="POST" action="<?= BASE_PATH?>app/OrdersController.php" id="orders_form">
												<div class="modal-body">
													<input id="id-field" type="hidden">
													<div class="mb-3" id="modal-id">
														<label class="form-label" for="orderId">Folio</label> 
														<input class="form-control" id="folio" name="folio" placeholder="Numero de folio" type="text">
													</div>
													<div class="mb-3" id="modal-id">
														<label class="form-label" for="orderId">Total</label> 
														<input class="form-control" id="total" name="total" placeholder="Total" type="text">
													</div>
													<div class="mb-3">
														<label class="form-label" for="customername-field">Cliente</label> 
														<select class="form-control" id="client_select" name="client" onchange="obtener_usuario()">
															<option value="">
																Selecione un cliente
															</option>
															<?php foreach ($clients as $client): ?>
																<option value="<?= $client->id ?>"><?= $client->name ?></option>
															<?php endforeach; ?>
														</select>
													</div>
													<div class="mb-3">
														<label class="form-label" for="productname-field">Producto</label> 
														<select class="form-control" data-trigger="" id="presentation" name="presentation">
															<option value="">
																Selecione un producto
															</option>
															<?php foreach ($products as $product): ?>
																<?php foreach ($product->presentations as $p): ?>
																	<?php if($p->description != ""): ?>
																		<option value="<?= $p->id ?>"><?= $p->description ?></option>
																	<?php endif ?>
																<?php endforeach; ?>
															<?php endforeach; ?>
														</select>
													</div>
													<div class="mb-3" id="modal-id">
														<label class="form-label" for="orderId">Cantidad</label> 
														<input class="form-control" id="quantity" name="quantity" placeholder="Numero de folio" type="number">
													</div>
													<div class="row gy-4 mb-3">
														<div class="col-md-6">
															<div>
																<div class="form-check-right">
																	<input class="form-check-input" type="checkbox" id="is_paid" name="is_paid">
																	<label class="form-check-label" for="is_paid">¿Orden pagada?</label>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div>
																<label class="form-label" for="payment_type_id">Metodo de pago</label> 
																<select class="form-control" data-trigger="" id="payment_type_id" name="payment_type_id">
																	<option value="">
																		Seleccione el metodo de pago
																	</option>
																	<option value="1">
																		Efectivo
																	</option>
																	<option value="2">
																		Tarjeta
																	</option>
																	<option value="3">
																		Transferencia
																	</option>
																</select>
															</div>
														</div>
													</div>
													<div class="mb-3">
														<label class="form-label" for="customername-field">Dirección</label> 
														<select class="form-control" id="addresses_select" name="addresses">
															<option value="">
																Selecione una dirección
															</option>
														</select>
													</div>
													<div>
														<label class="form-label" for="delivered-status">Cupon</label> 
														<select class="form-control" data-trigger="" id="coupon_id" name="coupon_id">
															<option value="">
																Seleccione un cupon
															</option>
															<?php foreach ($coupones as $coupon): ?>
																<option value="<?= $coupon->id ?>"><?= $coupon->name ?></option>
															<?php endforeach; ?>
														</select>
													</div>

													<input type="hidden" id="id_cliente" name="id_cliente" value="">
													<input id="action" name="action" type="hidden" value="create">
													<input type="hidden" id="super_token" name="super_token" value="<?= $_SESSION['super_token'] ?>">

												</div>
												<div class="modal-footer">
													<div class="hstack gap-2 justify-content-end">
														<button class="btn btn-light" data-bs-dismiss="modal" type="button">Close</button> 
														<button class="btn btn-success" id="add-btn" type="submit">Add Order</button> 
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
								<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="editModal" tabindex="-1">
									<div class="modal-dialog modal-dialog-centered">
										<div class="modal-content">
											<div class="modal-header bg-light p-3">
												<h5 class="modal-title" id="exampleModalLabel"></h5><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" id="close-modal" type="button"></button>
											</div>
											<form method="POST" action="<?= BASE_PATH?>app/OrdersController.php" id="edit_order_form">
												<div class="modal-body">
													<input id="id-field" type="hidden">
													<div class="mb-3">
														<label class="form-label" for="customername-field">Estado de orden</label> 
														<select class="form-control" id="order_status" name="order_status">
															<option value="1">Pendiente de pago</option>
															<option value="2">Pagada</option>
															<option value="3">Enviada</option>
															<option value="4">Abandonada</option>
															<option value="5">Pendiente de enviar</option>
															<option value="6">Cancelada</option>
														</select>
													</div>

													<input type="hidden" id="super_token" name="super_token" value="<?= $_SESSION['super_token'] ?>">

												</div>
												<div class="modal-footer">
													<div class="hstack gap-2 justify-content-end">
														<button class="btn btn-light" data-bs-dismiss="modal" type="button">Close</button> 
														<button class="btn btn-success" id="add-btn" type="submit">Add Order</button> 
													</div>
												</div>
											</form>
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
	<script>

		let orders_form = document.getElementById("orders_form")
		let add_btn = document.getElementById("add-btn")
		let edit_btn = document.getElementById("edit-btn")
		let client_select = document.getElementById("client_select")

		let id_orden = document.getElementById("id_orden")
		let order_status = document.getElementById("order_status")
		let folio = document.getElementById("folio")
		let total = document.getElementById("total")
		let is_paid = document.getElementById("is_paid")
		let id_cliente = document.getElementById('id_cliente')
		let addresses_select = document.getElementById('addresses_select')
		let payment_type_id = document.getElementById("payment_type_id")
		let coupon_id = document.getElementById("coupon_id")
		let presentation = document.getElementById("presentation")
		let quantity = document.getElementById("quantity")

		let action = document.getElementById("action")
		let super_token = document.getElementById("super_token")

		add_btn.addEventListener('click', () => {
			orders_form.reset();
		});

		orders_form.addEventListener("submit", (e) => {
            e.preventDefault();

			let paid = 0;
			if(is_paid.checked.value == true) {
				paid = 1
			} else {
				paid = 2
			}

            const data = new FormData();
            data.append("folio", folio.value);
            data.append("total", total.value);
            data.append("is_paid", paid);
            data.append("client_id", id_cliente.value);
            data.append("address", addresses_select.value);
            data.append("order_status_id", paid);
            data.append("payment_type_id", payment_type_id.value);
            data.append("coupon_id", coupon_id.value);
            data.append("presentation", presentation.value);
            data.append("quantity", quantity.value);
            data.append("action", action.value);
            data.append("super_token", super_token.value);

            axios({
                method: "POST",
                url: "../app/OrdersController.php",
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
					title: 'Orden creada con exito',
					showConfirmButton: false,
					timer: 1500
					})
					function greet() {
						location.href = "index.php"
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

		edit_order_form.addEventListener("submit", (e) => {
            e.preventDefault();

            const data = new FormData();
            data.append("id_order", id_orden.value);
            data.append("order_status", order_status.value);
            data.append("action", 'update');
            data.append("super_token", super_token.value);

            axios({
                method: "POST",
                url: "../app/OrdersController.php",
                data,
                headers: {
                "Content-Type": "multipart/form-data",
                },
            }).then((response)=> {

				let res = JSON.stringify(response)
				res = JSON.parse(res)

				if (res.data[0].code > 0 && res.data.update == true) {
					Swal.fire({
					position: 'top-center',
					icon: 'success',
					title: 'Orden Actualizada con exito',
					showConfirmButton: false,
					timer: 1500
					})
					function greet() {
						location.href = "index.php"
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

		function editar_orden(target) {

			let order = JSON.parse( target.dataset.order )
			
			order_status.text = order.order_status.name
			order_status.value = order.order_status.id

			id_orden.value = order.id

			$('#editModal').modal('show');

		}

		function eliminar_orden(id) {
			
			swal({
				title: "Are you sure?",
				text: "Once deleted, you will not be able to recover this imaginary file!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {

				let super_token = document.getElementById('super_token').value;
				let base_path = document.getElementById('bp').value;

				var bodyFormData = new FormData();
				bodyFormData.append('id', id);
				bodyFormData.append('action', 'delete');
				bodyFormData.append('sprtoken', super_token);

				axios.post('../app/OrdersController.php', bodyFormData)
				.then(function (response) {

					if (response.data) {
						swal("Poof! Your imaginary file has been deleted!", {
							icon: "success",
						});
						location.href = "index.php"
					} else {
						swal("Error", {
							icon: "error",
						});;
					}
				})
				.catch(function (error) {
					console.log(error);
				});

				} else {
				swal("Your imaginary file is safe!");
				}
			});
		}

		function obtener_usuario() {
			let selectValue = document.getElementById('client_select')
			id_cliente.value = selectValue.value
			addresses_select.innerHTML = ""

			const data = new FormData();
            data.append("id", selectValue.value);
            data.append("action", 'newRequest');
            data.append("super_token", super_token.value);

            axios({
                method: "POST",
                url: "../app/AddressController.php",
                data,
                headers: {
                "Content-Type": "multipart/form-data",
                },
            }).then((response)=> {
				console.log(response)
				console.log(response.data.data)

                if (response.data.code > 0) {

					addresses_select.innerHTML = ""

					response.data.data.forEach((e, i) => {

						const option = document.createElement("option")
						option.value = response.data.data[i].id
						option.text = response.data.data[i].street_and_use_number
						addresses_select.appendChild(option)

						console.log(response.data.data[i].id)
						console.log(response.data.data[i].street_and_use_number)
					});


                } else {
                    console.log(response.message);
                } 
            }).catch((error) => {
                if (error.response) {
                    console.log(error.message);
                }
            });

		}

		$(document).ready(function () {
            $('#order_table').DataTable();
        });

	</script>
</body>
</html>