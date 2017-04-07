<?php
  ini_set('display_errors', 1);
  require_once "users-request.php";

  $user = $_POST["login"];
  $password = $_POST["password"];

  $userResquetDb = new UserRequest("mysql", "mybackupweb", "localhost", "root", "abc123");
  if($user == null || $password == null){
    header("Location: ../source/error.html");
  }
  else{
    $userResquetDb->create_user($user, $password);
    header("Location: ../source/ok.html");
  }
?>
