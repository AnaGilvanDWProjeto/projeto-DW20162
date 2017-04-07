<?php
require_once "users-request.php";
session_start();
$user = $_POST["login"];
$password = $_POST["password"];

$userResquetDb = new UserRequest("mysql", "mybackupweb", "localhost", "root", "abc123");

if($user == null || $password == null){
  header("Location: ../source/error.html");
}
else{
  $_SESSION["user"]= $user ;
  $_SESSION["auth"]= true ;
  $return = $userResquetDb->auth_user($user, $password);
  if($return == "false"){
    header("Location: ../source/error.html");
  }
  else{
    header("Location: ../source/ok.html");
  }
}
?>
