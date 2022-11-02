<?php
    include_once "../app/config.php";
    include "../layouts/Authentication.templade.php";
    include("../app/ClientsController.php");

    $clientsController = new ClientsController();
    $clients = $clientsController->GetClientes();
?>
<!doctype html>
<head>
    <title>Clientes</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Clientes</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Lista de Clientes</h4>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div id="customerList">
                                        <div class="row g-4 mb-3">
                                            <div class="col-sm-auto">
                                                <div>
                                                    <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="add-btn" data-bs-target="#añadirClientModal"><i class="ri-add-line align-bottom me-1"></i>Añadir Cliente</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive table-card mt-3 mb-1">
                                            <table class="table align-middle table-nowrap" id="customerTable">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col" style="width: 40px;">
                                                        <th>Nombre</th>
                                                        <th>Correo</th>
                                                        <th>Accion</th>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list form-check-all">
                                                    <?php foreach ($clients as $client): ?>
                                                        <tr>
                                                            <th scope="row">
                                                            </th>
                                                            <td ><?= $client->name ?></td>
                                                            <td ><?= $client->email ?></td>
                                                            <td>
                                                                <div class="d-flex gap-3">
                                                                    <div class="view">
                                                                        <a href="<?= BASE_PATH ?>cliente/<?= $client->id ?>" class="btn btn-info">Ver</a>
                                                                    </div>
                                                                    <div class="edit">
                                                                        <button data-client='<?= json_encode($client) ?>' onclick="editar_cliente(this)"class="btn btn-warning " data-bs-toggle="modal" data-bs-target="#añadirClientModal" id="edit-btn">Edit</button>
                                                                    </div>
                                                                    <div class="remove">
                                                                        <button onclick="eliminar_cliente(<?= $client->id ?>)" class="btn btn-danger">Remove</button>

                                                                        <input type="hidden" id="super_token" value="<?= $_SESSION['super_token']?>">
                                                                        <input type="hidden" id="bp" value="<?= BASE_PATH ?>">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>           
                                        </div>
                                    </div>
                                </div><!-- end card -->
                            </div>                   
                        </div>        
                    </div>
                  </div>
                </div>
            </div>
             <!-- Footer de la pagina -->
            <?php include "../layouts/footer.template.php" ?>
        </div>
        <!-- end main content-->
    </div>

    <!--Modal Alta Product-->
    <div class="modal fade" id="añadirClientModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="añadirModalLabel"> Datos del cliente </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="<?= BASE_PATH?>clientesc" enctype="multipart/form-data" id="clients_form">
                    <div class="modal-body">

                        <span class="input-group-text">Nombre Completo</span>
                        <input type="text" id="name" name="name" class="form-control" required  placeholder="...">

                        <span class="input-group-text">Correo</span>
                        <input type="text" id="email" name="email" class="form-control" required  placeholder="...">

                        <span class="input-group-text">Contraseña</span>
                        <input type="password" id="password" name="password" class="form-control"  required placeholder="...">

                        <span class="input-group-text">Teléfono</span>
                        <input type="text" id="phone_number" name="phone_number" class="form-control" required  placeholder="10 Digitos">

                        <span class="input-group-text">¿Está subscrito?</span>
                        <input type="text" id="is_suscribed" name="is_suscribed" class="form-control" value="1">

                        <span class="input-group-text">Nivel de id</span>
                        <input type="text" id="level_id" name="level_id" class="form-control" value="1">
                        
                        <input id="action" name="action" type="hidden" value="create">
                        <input type="hidden" name="client_id" id="client_id" value="">
                        <input type="hidden" name="super_token" id="super_token" value="<?= $_SESSION['super_token'] ?>">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- JAVASCRIPT -->
    <?php include "../layouts/scripts.template.php" ?>
    <script>
            let clients_form = document.getElementById("clients_form")
            let add_btn = document.getElementById("add-btn")
            let edit_btn = document.getElementById("edit-btn")

            let name = document.getElementById("name")
            let email = document.getElementById("email")
            let password = document.getElementById("password")
            let phone_number = document.getElementById("phone_number")
            let is_suscribed = document.getElementById("is_suscribed")
            let level_id = document.getElementById("level_id")

            let action = document.getElementById("action")
            let client_id = document.getElementById("client_id")
            let super_token = document.getElementById("super_token")

            var nombres= /^[a-zA-ZÀ-ÿ\s]+$/; // Letras y espacios, pueden llevar acentos
            var pwd= /^.{4,16}$/; // 4 a 12 digitos.
            var correo= /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
            var telefono= /^\d{10,14}$/ ;// 7 a 14 numeros.

            add_btn.addEventListener('click', () => {
                label_level_id.style.display = "none"
                level_id.style.display = "none"
            });

            edit_btn.addEventListener('click', () => {
                label_level_id.style.display = "block"
                level_id.style.display = "block"
            });

            clients_form.addEventListener("submit", (e) => {
                e.preventDefault();

                const data = new FormData();
                data.append("name", name.value);
                data.append("email", email.value);
                data.append("password", password.value);
                data.append("phone_number", phone_number.value);
                data.append("is_suscribed", is_suscribed.value);
                data.append("level_id", level_id.value);
                data.append("client_id", client_id.value);
                data.append("action", action.value);
                data.append("super_token", super_token.value);

                ent = true;

                if(!nombres.test(name.value) || !correo.test(email.value)
                    || !telefono.test(phone_number.value) || is_suscribed.value != 1 &&  level_id.value != 1){
                    Swal.fire({ 
                        position: 'center',
                        icon: 'error',
                        title: 'Error Campos incorretos',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    ent=false;
                }
                if(ent){
                    axios({
                        method: "POST",
                        url: "../app/ClientsController.php",
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
                            title: 'Cliente añadido con exito',
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
                            title: 'Cliente actualizado con exito',
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
                }

            });

            function editar_cliente(target) {

                let client = JSON.parse( target.dataset.client )

                name.value = client.name
                email.value = client.email 
                password.value = ""
                phone_number.value = client.phone_number
                is_suscribed.value = client.is_suscribed
                level_id.value = client.level_id
                client_id.value = client.id
                action.value = 'update'

            }

            function eliminar_cliente(id) {
                
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

                    axios.post('../app/ClientsController.php', bodyFormData)
                    .then(function (response) {

                        if (response.data) {
                            swal("Poof! Your imaginary file has been deleted!", {
                                icon: "success",
                            });
                            location.reload();
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

        </script>
</body>
</html>