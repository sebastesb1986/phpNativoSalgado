<?php

include '../../conexion/db.php';

// Variables
$query = "";

// Campos a gestionar
$id = (isset($_GET["id"])) ? $_GET["id"] : "";
$username = trim(strip_tags($_POST["username"]));
$password = $_POST["password"];

try{
    // Verificar si el formulario se envió
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Consultas sql
        if (!empty($id)) {
            $query = "UPDATE usuarios SET username = :username, password = :password WHERE id = $id";
        } else {
            $query = "INSERT INTO usuarios(username, password) VALUES(:username, :password)";
        }

        // Preparar consulta
        $stmt = $conn->prepare($query);

        // Vincular parametros y limpiar campos para evitar ataques
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);

        // Obtener datos
        $stmt->execute();

        // Verificar si la consulta se ejecutó correctamente
        if ($stmt->rowCount() > 0) {
            header('location: ../../views/usuario/index.php');
            exit();
        } else {
            // Manejo de errores
            echo "Error al procesar la solicitud.";
        }
    }
    else {
        // Si el formulario no se envió correctamente
        header('location: ../../views/usuario/index.php');
    }

}
catch(PDOException $e){

    echo "Error: " .$e->getMessage();

}

?>
