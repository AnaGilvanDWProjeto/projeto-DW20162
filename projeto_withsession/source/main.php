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
        <input type="text" placeholder="DEFAULT: ~/MyBackupWeb/" name="destination_path" id="dest_path">
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

        Selecione a hora: <input type="time" name="time_backup" required/><br><br>
        Selecione o agendamento :<br><br>
        <input type="checkbox" name="scheduleSelector" value="@daily">
        <label for="dados">Diariamente</label>
        <input type="checkbox" name="scheduleSelector" value="@weekly" autofocus>
        <label for="dados">Semanalmente</label>
        <input type="checkbox" name="scheduleSelector" value="@monthly">
        <label for="dados">Mensalmente</label>
        <br>
        <p id="defaultwarning"> DEFAULT: SEMANALMENTE </p>
        <br>
        <input type="submit" value="Criar" name="criar">
      </form>
      </div>
    </div>

    <h1 id="mainh1" class="toggle" onclick="actionOnText('RemoverBackup')">Remover Backup &#10549;</h1>
    <div id="RemoverBackup" class="hide">
      <div id="content_div">
        <table>
          <tr>
              <th>Data de Criacao</th>
              <th>Criado Por</th>
              <th>Local de Armazenamento</th>
              <th>STATUS</th>
              <th>Deletar</th>
            </tr>
            <tr>
              
              <td><input type="radio" name="kind" id="selectDelete" value="delete"></td>
            </tr>
            <tr>

              <td><input type="radio" name="kind" id="selectDelete" value="delete"></td>
            </tr>
            <tr>

              <td><input type="radio" name="kind" id="selectDelete" value="delete"></td>
            </tr>
            <tr>

              <td><input type="radio" name="kind" id="selectDelete" value="delete"></td>
            </tr>
        </table> <br>
        <button id="butaoDeletar"> <a href="main.html" class="button">Deletar</a> </button>
      </div>
    </div>



    <h1 id="mainh1" class="toggle" onclick="actionOnText('HistoricoBackup')">Historico Detalhado Backup &#10549;</h1>
    <div id="HistoricoBackup" class="hide">
      <div id="content_div">
        <table>
          <tr>
              <th>Data de Criacao</th>
              <th>Criado Por</th>
              <th>Local de Armazenamento</th>
              <th>STATUS</th>
            </tr>
            <tr>

            </tr>
            <tr>

            </tr>
            <tr>

            </tr>
            <tr>

            </tr>
        </table>
      </div>
    </div>




    <h1 id="mainh1" class="toggle" onclick="actionOnText('RecuperarBackup')">Recuperar Backup &#10549;</h1>
    <div id="RecuperarBackup" class="hide">
      <div id="content_div">
        <table>
          <tr>
              <th>Data de Criacao</th>
              <th>Criado Por</th>
              <th>Local de Armazenamento</th>
              <th>STATUS</th>
              <th>Deletar</th>
            </tr>
            <tr>

              <td><input type="radio" name="kind" id="selectDelete" value="delete"></td>
            </tr>
            <tr>

              <td><input type="radio" name="kind" id="selectDelete" value="delete"></td>
            </tr>
            <tr>

              <td><input type="radio" name="kind" id="selectDelete" value="delete"></td>
            </tr>
            <tr>

              <td><input type="radio" name="kind" id="selectDelete" value="delete"></td>
            </tr>
        </table> <br>
        <button id="butaoRecuperar"> <a href="main.html" class="button">Recuperar </a> </button> <br> <br>
      </div>
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
document.getElementById("data_backup").addEventListener('change', function(){
    document.getElementById("origin_path").required = this.checked ;
});
document.getElementById("full_backup").addEventListener('change', function(){
    document.getElementById("origin_path").required = !this.checked ;
});
document.getElementById("data_backup2").addEventListener('change', function(){
    document.getElementById("origin_path2").required = this.checked ;
});
document.getElementById("full_backup2").addEventListener('change', function(){
    document.getElementById("origin_path2").required = !this.checked ;
});
</script>
</body>
</html>
