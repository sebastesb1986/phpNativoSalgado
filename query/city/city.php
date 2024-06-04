<?php

include '../../conexion/db.php';

try{
    // Query SQL
    $sql = "SELECT id,name FROM ciudades";

    // Preparar la sentencia
    $query = $conn->prepare($sql);

    // Ejecutar sentencia
    $query->execute();

    // Obtener datos
    $ciudades = $query->fetchAll();

}
catch(PDOException $e){

    die("Error: " .$e->getMessage());

}
 
?>
