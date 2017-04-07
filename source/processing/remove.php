<?php
  ini_set('display_errors', 1);
  require_once "../../auth/users-request.php";

  $which = $_POST["selectDelete"];

  $userResquetDb = new UserRequest("mysql", "mybackupweb", "localhost", "root", "abc123");
  
  $userResquetDb->remover_backup($which);
  $w = $userResquetDb->select_location_backup($which);
  $where = $w[0]["storage_location"];
  $where = ltrim($where, '"');
  $where = rtrim($where, '"');
  $line = "sudo rm {$where}";
  shell_exec($line);
  header("Location: ../ok.html");
?>
