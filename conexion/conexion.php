<?php

$user = "Salgado";
$pass = "S4lgado8619";
$server = "sqlsrv:Server=Salgado_S\SQLEXPRESS; Database=servicios-salgado"; $user; $pass;

try{

    $conn = new PDO($server);

    if($conn){

        return "Conexión realizada exitosamente!";

    }

}
catch(PDOException $e){

    echo $e->getMessage();

}

?>