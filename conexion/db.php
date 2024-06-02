<?php

$server = "DESKTOP-6UEB27H\SQLEXPRESS";
$user = "Salgado";
$pass = "S4lgado8619";
$dbname = "servicios-salgado";
$connection = "sqlsrv:Server=$server; Database=$dbname"; $user; $pass;

try{

    $conn = new PDO($connection);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e){

    die("Error: " .$e->getMessage());

}

?>