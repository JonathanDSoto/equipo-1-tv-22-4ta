<?php 

    session_destroy();

    include("../app/AuthController.php");

    $authController = new AuthController();
    $auth = $authController->logout();

?>