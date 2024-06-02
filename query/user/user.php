<?php

include '../../conexion/db.php';

$id = (isset($_GET["id"])) ? $_GET["id"] : "";

try{

    if($id){
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

    echo "Error: " .$e->getMessage();

}
 
?>

            