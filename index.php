<? 
    include_once "app/config.php";
?>
<!doctype html>
<html lang="en"></html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php include "layouts/head.template.php" ?>
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
                                    <form action="/app/AutController.php" method="POST" id="login_form">
                                        <div class="mb-3">
                                            <label for="email" class="form-label text-white">e-mail</label>
                                            <input type="text" class="form-control" id="email" placeholder="example@hotmail.com">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-white" for="password-input">Password</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password" class="form-control pe-5 password-input" placeholder="*************" id="password">
                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted shadow-none password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                            </div>
                                        </div>
                                            <input type="hidden" name="super_token" value="<?= $_SESSION['super_token']?>">
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


</body>
</html>
