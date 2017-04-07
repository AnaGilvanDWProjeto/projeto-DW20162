<?php
  ini_set('display_errors', 1);

  $which = $_POST["selectRecuperar"];
  
  $line = "tar -xzf \"" . $which . "\" -C /var/backups/MyBackupWeb/Recuperados";
  shell_exec($line);
  header("Location: ../ok.html");
?>
