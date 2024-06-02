<?php

include '../../conexion/db.php';

try{
    // Query SQL
    $query = "SELECT * FROM usuarios";

    // Preparar la sentencia
    $stmt = $conn->prepare($query);

    // Ejecutar sentencia
    $stmt->execute();

    // Obtener datos
    $datos = $stmt->fetchAll();

}
catch(PDOException $e){

    echo "Error: " .$e->getMessage();

}
 
?>
