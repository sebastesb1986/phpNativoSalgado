<?php

include '../../conexion/db.php';

try{
    
    if($_POST["search"]){

        $search = $_POST["search"];
        // Query SQL
        $query = "SELECT * FROM usuarios WHERE username LIKE '%$search%' ";

        // Preparar la sentencia
        $stmt = $conn->prepare($query);

        // Ejecutar sentencia
        $stmt->execute();

        // Obtener datos
        $datos = $stmt->fetchAll();

        if(!$datos){
            echo "Busqueda no coincide con ninguno de los registros";
        }
    }
    else{

        echo "Sin registros";

    }

}
catch(PDOException $e){

    die("Error: " .$e->getMessage());

}
 
?>
