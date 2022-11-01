<?php 
include "../app/AuthController.php";
  $user = new AuthController; 
  if ($user->logged_In()) {
      header("Location:".BASE_PATH);
  }