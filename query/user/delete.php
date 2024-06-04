<?php

session_start();

// Verificar si la sesión está iniciada
if (!isset($_SESSION["username"])) {
    // Si la sesión no está iniciada, redirigir al usuario al inicio de sesión
    header("Location: ../../views/auth/index.php");
    exit(); // Asegurarse de detener la ejecución del script después de redireccionar
}

include '../../conexion/db.php';

try{
    // Consultas sql
    if(isset($_GET["id"])){

        $id = $_GET["id"];
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

    die("Error: " .$e->getMessage());

}

?>
