<?php
    include_once "../app/config.php";
    include("../app/UsersController.php");

    $usersController = new UsersController();
    $users = $usersController->getUsers();

?>
<!doctype html>
<head>
    <title>Shop</title>
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
                                <h4 class="mb-sm-0">Usuarios</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item active">Usuarios</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Lista de Usuarios</h4>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div id="customerList">
                                        <div class="row g-4 mb-3">
                                            <div class="col-sm-auto">
                                                <div>
                                                    <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create_btn" data-bs-target="#añadirModal"><i class="ri-add-line align-bottom me-1"></i>Añadir Usuario</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive table-card mt-3 mb-1">
                                            <table class="table align-middle table-nowrap" id="customerTable">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col" style="width: 40px;">
                                                        <th>Avatar</th>
                                                        <th>Nombre</th>
                                                        <th>Apellidos</th>
                                                        <th>Correo</th>
                                                        <th>Accion</th>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list form-check-all">
                                                    <?php foreach ($users as $user): ?>
                                                        <tr>
                                                            <th scope="row">
                                                            </th>
                                                            <td class="customer_name"> <img class="rounded-2" style="width:100px; height:100px; " src="<?= $user->avatar ?>" alt="Card image cap"></td>
                                                            <td><?= $user->name ?></td>
                                                            <td><?= $user->lastname ?></td>
                                                            <td><?= $user->email ?></td>
                                                            <td>
                                                                <div class="d-flex gap-3">
                                                                    <div class="view">
                                                                        <a href="detalles.php?id=<?= $user->id ?>" class="btn btn-info">Ver</a>
                                                                    </div>
                                                                    <div class="edit">
                                                                        <button data-user='<?= json_encode($user) ?>' onclick="editar_usuario(this)" class="btn btn-warning " data-bs-toggle="modal" data-bs-target="#añadirModal">Edit</button>
                                                                    </div>
                                                                    <div class="remove">
                                                                        <button class="btn btn-danger" onclick="eliminar(<?= $user->id ?>)">Remove</button>
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
    <div class="modal fade" id="añadirModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="añadirModalLabel"> Datos del usuario</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="<?= BASE_PATH?>users/" enctype="multipart/form-data" id="user_form">
                    <div class="modal-body">
                    <span class="input-group-text" id="label_img">Imagen del usuario</span>
                        <input type="file" id="img_usuario" name="img_usuario" accept="image/*">

                        <span class="input-group-text">Nombre</span>
                        <input type="text" id="name" name="name" class="form-control">
                        
                        <span class="input-group-text">Apellidos</span>
                        <input type="text" id="last_name" name="last_name" class="form-control">
                        
                        <span class="input-group-text">Correo</span>
                        <input type="text" id="email" name="email" class="form-control">
                        
                        <span class="input-group-text">Password</span>
                        <input type="password" class="form-control" id="password" name="password">
                        
                        <span class="input-group-text">Telefono</span>
                        <input type="text" id="phone_number" name="phone_number" class="form-control">

                        <span class="input-group-text" id="label_rol">Rol</span>
                        <input type="text" id="rol" class="form-control">

                        <span class="input-group-text" id="label_created">Creado por</span>
                        <input type="text" id="created_by" class="form-control">

                    </div>

                    <input type="hidden" name="action" id="action" value="create">
                    <input type="hidden" name="id" id="id_user">
                    <input type="hidden" name="created_by" id="created_by_user" value="<?= $_SESSION['name'] ?>">
                    <input type="hidden" name="super_token" id="super_token" value="<?= $_SESSION['super_token'] ?>">

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

        // Funcion para mostrar modales en base al GET obtenido
        // modal = true - modal = false
        let form = document.getElementById("user_form")
        let create_btn = document.getElementById("create_btn");
        let name = document.getElementById("name")
        let last_name = document.getElementById("last_name")
        let email = document.getElementById("email")
        let password = document.getElementById("password")
        let phone_number = document.getElementById("phone_number")
        let id_user = document.getElementById("id_user")
        let created_by_user = document.getElementById("created_by_user")
        let action = document.getElementById("action")
        let super_token = document.getElementById("super_token")
        let label_img = document.getElementById('label_img');
        let img_usuario = document.getElementById("img_usuario")
        let label_rol = document.getElementById('label_rol');
        let rol = document.getElementById("rol")
        let label_created = document.getElementById('label_created');
        let created_by = document.getElementById("created_by")

        create_btn.addEventListener("click", () => {
            label_img.style.display = "block";
            img_usuario.style.display = "block";
            label_rol.style.display = "none";
            rol.style.display = "none";
            label_created.style.display = "none";
            created_by.style.display = "none";
        })

        form.addEventListener("submit", (e) => {
            e.preventDefault();

            const data = new FormData();
            ent = true;
            data.append("img_user", img_usuario.files[0]);
            data.append("name", name.value);
            data.append("last_name", last_name.value);
            data.append("email", email.value);
            data.append("password", password.value);
            data.append("phone_number", phone_number.value);
            data.append("id_user", id_user.value);
            data.append("created_by_user", created_by_user.value);
            data.append("action", action.value);
            data.append("super_token", super_token.value);

            axios({
                method: "POST",
                url: "../app/UsersController.php",
                data,
                headers: {
                "Content-Type": "multipart/form-data",
                },
            }).then((response)=> {
                if (response.data.code > 0) {
                        Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: 'Usuario creado',
                        showConfirmButton: false,
                        timer: 1500
                        })
                        function greet() {
                            location.href = "index.php";
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

        function eliminar(id) {
            
            console.log("eliminar")
            console.log(id)
            
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

                axios.post('../app/UsersController.php', bodyFormData)
                .then(function (response) {

                    if (response.data) {
                        swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                        });
                        location.href = base_path+'users'
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

        function editar_usuario(target) {

            label_img.style.display = "none"
            img_usuario.style.display = "none"
            label_rol.style.display = "block"
            rol.style.display = "block"
            rol.setAttribute('disabled', '');
            label_created.style.display = "block"
            created_by.style.display = "block"
            created_by.setAttribute('disabled', '');

            let user = JSON.parse( target.dataset.user )

            id_user.value = user.id 
            name.value = user.name
            last_name.value = user.lastname
            email.value = user.email
            password.value = user.password
            created_by.value = user.created_by
            phone_number.value = user.phone_number
            rol.value = user.role
            created_by.value = user.created_by
            action.value = 'update'

        }
    </script>
</body>
</html>