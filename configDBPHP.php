<?php

$host="localhost"; 

$root="root"; 
$root_password="vagrant"; 

$user='ana';
$pass='ana123';

try {
    $conn = new PDO("mysql:host=$host", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS mybackupwebdb";
    $conn->exec($sql);
    $sql = "use mybackupwebdb";
    $conn->exec($sql);
    $sql = "CREATE TABLE IF NOT EXISTS data_backup (
                ID int(5) AUTO_INCREMENT PRIMARY KEY,
                created_by varchar(30) NOT NULL,
                storage_location varchar(100) NOT NULL,
                timestamp varchar(50) NOT NULL,
                CONSTRAINT data_backup_created_by_fkey FOREIGN KEY (created_by)
                REFERENCES public.users_backup (users) MATCH SIMPLE
                ON UPDATE NO ACTION ON DELETE NO ACTION)";
    $conn->exec($sql);
    $sql = "CREATE TABLE IF NOT EXISTS users_backup (
                users varchar(30) NOT NULL PRIMARY KEY,
                password varchar(50) NOT NULL,
                CONSTRAINT users_backup_pkey PRIMARY KEY (users))";
    $conn->exec($sql);
    echo "DB created successfully";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

?>