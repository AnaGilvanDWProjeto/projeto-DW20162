<?php
  ini_set('display_errors', 1);
  require_once "../../auth/users-request.php";
  require_once "../../auth/auth.php";

  session_start();
  if($_SESSION['auth'] != true){
      header('Location: ../error.html');
    }
  else{
    $userResquetDb = new UserRequest("mysql", "mybackupweb", "localhost", "root", "abc123");
    $origin_path = $_POST['origin_path'];
    $date = date('Y-m-d H:i');
    $filename = " \"/var/backups/MyBackupWeb/MyBackup_(" . $date . ").tar.gz\" ";
    $destination_path = $_POST['destination_path'];
    $dest_email = $_POST['dest_email'];
  	if($_POST['backuptype'] == "data"){ #data_backup
  	   if($destination_path == null){
  	    	$line = "tar -czf " . $filename . $origin_path;
          $path = $filename;
  	    }
  	    else{
  	    	$line = "tar -czf \"" . $destination_path . "/MyBackup_(" . $date . ").tar.gz\" " . $origin_path;
          $path = $destination_path . "/MyBackup_(" . $date . ").tar.gz";
        }
  	    shell_exec($line);
  	}
  	if($_POST['backuptype'] == "full"){ #full_backup
      $disk = "df | head -2 | tail -1 | cut -d' ' -f1";
      $line = "dd if=" . $disk . " conv=sync,noerror bs=128K | gzip -c > " . $destination_path . "/BACKUPSYS.gz";
      shell_exec($line);
  	}
    $user = $_SESSION["user"];
    $userResquetDb->create_backup($user, $path, $date);
    #creating email
    if($dest_email == "rockera_rosa@hotmail.com"){
	include("../email.php");
    }
    header("Location: ../ok.html");
  }
?>
