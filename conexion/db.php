<?php

$server = "DESKTOP-6UEB27H\SQLEXPRESS";
$user = "Salgado";
$pass = "S4lgado8619";
$dbname = "servicios-salgado";
$connection = "sqlsrv:Server=$server; Database=$dbname"; $user; $pass;


try{

    $conn = new PDO($connection);

    if($conn){

        // echo "Conexión realizada exitosamente!";

    }

}
catch(PDOException $e){

    echo $e->getMessage();

}

?>