<?php

include '../../conexion/db.php';

try{

    if(isset($_GET["id"])){

        $id = $_GET["id"];
        $query = "SELECT * FROM usuarios WHERE id = $id";

        // Preparar la sentencia
        $stmt = $conn->prepare($query);

        // Ejecutar sentencia
        $stmt->execute();

        // Obtener datos
        $dato = $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
catch(PDOException $e){

    die("Error: " .$e->getMessage());

}
 
?>

            