<?php

include '../../conexion/db.php';

$id = (isset($_GET["id"])) ? $_GET["id"] : "";

try{
    // Campos a gestionar

    // Consultas sql
    if(!empty($id)){
        // Consulta preparada para eliminar un usuario por su ID
        $query = "DELETE FROM usuarios WHERE id = $id";

        // Preparar consulta
        $stmt = $conn->prepare($query);

        // Obtener datos
        $stmt->execute();
        
        // Verificar si se eliminó algún registro
        if ($stmt->rowCount() > 0) {
            header('location: ../../views/usuario/index.php');
            exit();
        } else {
            // Manejo de errores
            echo "No se encontró ningún usuario con el ID proporcionado.";
        }
    }

}
catch(PDOException $e){

    echo "Error: " .$e->getMessage();

}

?>
