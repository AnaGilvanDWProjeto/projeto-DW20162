<?php
require_once "database.php";
class UserRequest extends Database {
  public function create_user($user, $password){
    $sql = "INSERT INTO users_backup (users, password) VALUES ('{$user}', '{$password}');";
    $this->connection->exec($sql);
  }
  public function auth_user($user, $password){
    $sql = "SELECT users, password FROM users_backup WHERE users='{$user}' AND password='{$password}';";
    $ret = $this->connection->query($sql);
    if($ret == null){
      return "false";
    } else {
      return $ret->fetchAll();
    }
  }
  public function create_backup($user, $path, $date){
    $sql = "INSERT INTO data_backup (created_by, storage_location, backup_time) values ('{$user}','{$path}', '{$date}');";
    $this->connection->exec($sql);
  }

  public function list_backup(){
    $sql = "SELECT * FROM data_backup";
    $result = $this->connection->query($sql);
    return $result->fetchAll();
  }
  public function select_location_backup($id){
    $sql = "SELECT storage_location FROM data_backup WHERE backup_time='{$id}'";
    $result = $this->connection->query($sql);
    return $result->fetchAll();
  }
  public function remover_backup($id){
    $sql = "DELETE FROM data_backup WHERE backup_time='{$id}'";
    $this->connection->exec($sql);
  }

}

// require_once "users-request";
// $ur = new UserRequest();
// $ur->create_user("fulano", "/hom/algum-dir");
?>
