<?php
  require_once "../../auth/users-request.php";
  require_once "../../auth/auth.php";

  session_start();
  if($_SESSION['auth'] != true){
      header('Location: ../error.html');
    }
  else{
  }
  
?>
