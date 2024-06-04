<?php

include '../../conexion/db.php';

try{
    // Query SQL
    $query = "SELECT u.id, u.username, c.name as city
                FROM usuarios u
                INNER JOIN ciudades c ON u.city_id = c.id
                ORDER BY u.username ASC";

    // Preparar la sentencia
    $stmt = $conn->prepare($query);

    // Ejecutar sentencia
    $stmt->execute();

    // Obtener datos
    $datos = $stmt->fetchAll();

}
catch(PDOException $e){

    die("Error: " .$e->getMessage());

}
 
?>
