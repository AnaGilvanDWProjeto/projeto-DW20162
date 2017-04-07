<?php
  session_start();
  if(!isset($_SESSION['auth']) || $_SESSION['auth'] != true)
    header('Location: ../index.html');
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title> Backup Administration Page </title>
</head
<body>
<ul>
  <li><a href="contato.html">Contato</a></li>
  <li><a href="sobre.html">Sobre</a></li>
  <li><a href="../auth/logout.php">Logout</a></li>
</ul>

<section id="boxMain">
   <h1 align="center"> Genrenciamento de Backup</h1><br>

   <h1 id="mainh1" class="toggle" onclick="actionOnText('CriarBackup')">Criar Backup &#10549;</h1>
   <div id="CriarBackup" class="hide">
     <div id="content_div">
      <form method="POST" action="processing/create_single_backup.php">
        Selecione o tipo de Backup :<br><br>
        <input type="radio" name="backuptype" value="full" id="full_backup">
        <label for="full">Criar Backup do Sistema </label> <br> <br>
        <input type="radio" name="backuptype" value="data" id="data_backup">
        <label for="dados">Criar Backup de Dados: </label>
        <input type="text" placeholder="ex: /home/seunome/diretorio" name="origin_path" id="origin_path"> <br><br>
        <label for="dados">Local de Armazenamento do Backup: </label>
        <input type="text" placeholder="DEFAULT: ~/MyBackupWeb/" name="destination_path" id="dest_path"> <br><br>
        <input type="radio" id="send_mail_radio">
	<label for="dados">Deseja envar email para confirmacao?: </label>
        <input type="text" placeholder="ex: seuemail@email.com" name="dest_email" id="sendmail_text"> <br><br>
        <br><br>
       <input type="submit" value="Criar" name="criar">
     </form>
    </div>
    </div>

    <h1 id="mainh1" class="toggle" onclick="actionOnText('AgendarBackup')">Agendar Backup &#10549;</h1>
    <div id="AgendarBackup" class="hide">
      <div id="content_div">
      <form method="POST" action="processing/schedule_backup.php">
        Selecione o tipo de Backup :<br><br>
        <input type="radio" name="backuptype" value="full" id="full_backup2">
        <label for="full">Criar Backup do Sistema </label> <br> <br>
        <input type="radio" name="backuptype" value="data" id="data_backup2">
        <label for="dados">Criar Backup de Dados: </label>
        <input type="text" placeholder="ex: /home/seunome/diretorio" name="origin_path" id="origin_path2"> <br><br>
        <label for="dados">Local de Armazenamento do Backup: </label>
        <input type="text" placeholder="DEFAULT: /var/usr/backups/" name="destination_path" id="dest_path2">
        <br><br>
        Selecione o agendamento :<br><br>
        <input type="checkbox" name="scheduleSelector" value="@daily">
        <label for="dados">Diariamente</label>
        <input type="checkbox" name="scheduleSelector" value="@weekly" autofocus>
        <label for="dados">Semanalmente</label>
        <input type="checkbox" name="scheduleSelector" value="@monthly">
        <label for="dados">Mensalmente</label><br>
        <p id="defaultwarning"> DEFAULT: SEMANALMENTE </p><br>
	<input type="radio" id="send_mail_radio2">
	<label for="dados">Deseja envar email para confirmacao?: </label>
        <input type="text" placeholder="ex: seuemail@email.com" name="dest_email" id="sendmail_text2"> <br><br>
        <input type="submit" value="Criar" name="criar">
	<br><br>
      </form>
      </div>
    </div>
    <h1 id="mainh1" class="toggle" onclick="actionOnText('HistoricoBackup')">Historico Detalhado Backup &#10549;</h1>
    <div id="HistoricoBackup" class="hide">
      <div id="content_div">
	<table id="listTable">
          <thead>
	      <th>ID</th>
              <th>Criado Por</th>
              <th>Local de Armazenamento</th>
              <th>Data de Criacao</th>
              </thead>
          <tbody>
          <?php
	  ini_set('display_errors', 1);
	  require_once "../auth/users-request.php";

	  $userResquetDb = new UserRequest("mysql", "mybackupweb", "localhost", "root", "abc123");
	  $res = $userResquetDb->list_backup();
          foreach($res as $row) {
            ?>
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['created_by']?></td>
		    <td><?php echo $row['storage_location']?></td>
                    <td><?php echo $row['backup_time']?></td>                
		</tr>

            <?php
            }
            ?>
          </tbody>
        </table>
      <br></div>
    </div>
    <h1 id="mainh1" class="toggle" onclick="actionOnText('RemoverBackup')">Remover Backup &#10549;</h1>
    <div id="RemoverBackup" class="hide">
      <div id="content_div">
	<form method="POST" action="processing/remove.php">
	<table id="removerTable">
          <thead>
	      <th>ID</th>
              <th>Criado Por</th>
              <th>Local de Armazenamento</th>
              <th>Data de Criacao</th>
              <th>Deletar</th>
          </thead>
          <tbody>
          <?php
	  ini_set('display_errors', 1);
	  require_once "../auth/users-request.php";

	  $userResquetDb = new UserRequest("mysql", "mybackupweb", "localhost", "root", "abc123");
	  $res = $userResquetDb->list_backup();
          foreach($res as $row) {
            ?>
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['created_by']?></td>
		    <td><?php echo $row['storage_location']?></td>
                    <td><?php echo $row['backup_time']?></td>
		    <td><input type="radio" name="selectDelete" value="<?php echo $row['backup_time']?>"></td>                
		</tr>

            <?php
            }
            ?>
          </tbody>
        </table> <br>
<input type="submit" value="deletar" name="deletar">
</form>
      <br></div>
    </div>
    <h1 id="mainh1" class="toggle" onclick="actionOnText('RecuperarBackup')">Recuperar Backup &#10549;</h1>
    <div id="RecuperarBackup" class="hide">
      <div id="content_div">
       <p id="defaultwarning"> APENAS BACKUPS DE DADOS PODEM SER RECUPERADOS </p>
       <p id="defaultwarning"> Todos os backups recuperados vao para o diretorio: /var/backups/MyBackupWeb/Recuperados </p>
	<form method="POST" action="processing/recuperar.php">
	<table id="recuperarTable">
          <thead>
	      <th>ID</th>

              <th>Criado Por</th>
              <th>Local de Armazenamento</th>
              <th>Data de Criacao</th>
              <th>Recuperar</th>
          </thead>
          <tbody>
          <?php
	  ini_set('display_errors', 1);
	  require_once "../auth/users-request.php";

	  $userResquetDb = new UserRequest("mysql", "mybackupweb", "localhost", "root", "abc123");
	  $res = $userResquetDb->list_backup();
          foreach($res as $row) {
            ?>
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['created_by']?></td>
		    <td><?php echo $row['storage_location']?></td>
                    <td><?php echo $row['backup_time']?></td>
		    <td><input type="radio" name="selectRecuperar" value= <?php echo $row['storage_location']?> ></td>                
		</tr>

            <?php
            }
            ?>
          </tbody>
        </table> <br>
<input type="submit" value="recuperar" name="Recuperar">
</form>
    <br>  </div>
    </div>
    <p id="footer">COPYRIGHT © 2017 | MyBackupWeb </p>

</section>

<script>

 function actionOnText(id){
   var obj = document.getElementById(id);
   if(obj.className == 'show'){
       obj.className = 'hide';}
   else{
       obj.className = 'show';}
 }

document.body.className+=' loaded';
</script>

<script data-cfasync="false" type="text/javascript" src="requirementchange.js"></script>

</body>
</html>
