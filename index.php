<?php
    include_once "app/config.php";

?>

<!doctype html>
<html lang="en"></html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php include "layouts/head.template.php"?>
</head>
<body>
    
    <div class="auth-page-wrapper pt-6 " >
        <!-- auth page bg -->
        <!-- se agrego el height 100%-->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles" style="height: 100%;">
            <div class="bg-overlay">
            </div>
        </div>  
        <!-- auth page content -->
        <!--se agrego m-0 vh-100  row  align-items-center -->
        <div class="auth-page-content m-0 vh-100  row  align-items-center">
            <div class="container">
                <!-- end row -->
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4" style="background-color:rgba(0,0,0,0.5);">
                            <div class="card-body p-4 ">
                                <div class="text-center mt-2">
                                    <h3 class="text-warning">Bienvenido</h3>
                                    <p class="text-light">Inicia sesion</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form action='<?= BASE_PATH ?>/app/AuthController.php' method="POST" id="login_form">
                                        <div class="mb-3">
                                            <label for="email" class="form-label text-white">e-mail</label>
                                            <input type="text" class="form-control" name="email" id="email" placeholder="example@hotmail.com">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-white" for="password-input">Password</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password" class="form-control pe-5 password-input" placeholder="*************" id="password" name="password">
                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted shadow-none password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                            </div>
                                        </div>
                                        <input type="hidden" id="action" name="action" value="access">
                                        <input type="hidden" name="super_token" id="super_token" value="<?= $_SESSION['super_token']?>">
                                        <div class="mt-4">
                                            <button class="btn btn-success  w-100" type="submit">Iniciar sesion</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
    </div>
    <!-- end auth-page-wrapper -->
    <!-- JAVASCRIPT -->
    <?php include "layouts/scripts.template.php" ?>
    <script>

        let form = document.getElementById("login_form")
        let email = document.getElementById("email")
        let password = document.getElementById("password")
        let action = document.getElementById("action")
        let super_token = document.getElementById("super_token")

        form.addEventListener("submit", (e) => {
            e.preventDefault();

            const data = new FormData();
            data.append("email", email.value);
            data.append("password", password.value);
            data.append("action", action.value);
            data.append("super_token", super_token.value);

            axios({
                method: "POST",
                url: "app/AuthController.php",
                data,
                headers: {
                "Content-Type": "multipart/form-data",
                },
            }).then((response)=> {
                if (response) {
                    console.log(response.data.message);

                    // Aqui va la ruta que apunta al index de productos
                    location.href = "productos/products.php";

                } else {
                    console.log(response.message);

                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Wrong access',
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
    </script>


</body>
</html>