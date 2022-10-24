<?php
include_once "../app/config.php";
include("../app/UsersController.php");

$id_usuario = $_GET['id'];
$userController = new UsersController();
$user = $userController->DetailsUser($id_usuario);

?>
<!doctype html>
<head>
    <meta charset="utf-8" />
    <title>Detalles</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
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
                <div class="profile-foreground" >
                    <div class="profile-wid-bg">
                        <img src="../public/assets/images/profile-bg.jpg" alt="" class="profile-wid-img" />
                    </div>
                </div>
                <div class="pt-4 ">
                    <div class="row g-4">
                        <div class="col-auto">
                            <div class="avatar-lg">
                                <button type="button" class="btn rounded-pill btn-info waves-effect waves-light " style="margin-top:50px; position:absolute; margin-left:60px"  data-bs-toggle="modal" data-bs-target="#editarImagen"><i class="ri-camera-fill"></i></button>
                                <img src="<?= $user->avatar ?>" alt="user-img" class="img-thumbnail rounded-circle" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-2">
                                <h3 class="text-white mb-1"><?= $user->name ?></h3>
                                <p class="text-white-75"><?= $user->role ?></p>
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
                                            <div class="card">

                                            </div>

                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-3">Informacion</h5>
                                                    <div class="table-responsive">
                                                        <table class="table table-borderless mb-0">
                                                            <tbody>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Nombre:</th>
                                                                    <td class="text-muted"><?= $user->name ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Apellidos :</th>
                                                                    <td class="text-muted"><?= $user->lastname ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">E-mail :</th>
                                                                    <td class="text-muted"><?= $user->email ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Creado por :</th>
                                                                    <td class="text-muted"><?= $user->created_by ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Se unio:</th>
                                                                    <td class="text-muted"><?= $user->created_at ?></td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
       <!--Modal Alta Categoria y Editar-->
       <div class="modal fade" id="editarImagen">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarImagen">Selecciona una imagen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="<?= BASE_PATH?>users/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <span class="input-group-text">Imagen</span>
                        <input type="file" name="img_user" accept="image/*">
                    </div>
                    
                    <input type="hidden" name="action" value="updatephoto">
                    <input type="hidden" name="id" value="<?= $user->id ?>">
                    <input type="hidden" name="super_token" id="super_token" value="<?= $_SESSION['super_token'] ?>">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include "../layouts/footer.template.php" ?>
    <?php include "../layouts/scripts.template.php" ?>
</body>
</html>