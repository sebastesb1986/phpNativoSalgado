<?php

include '../../conexion/db.php';

// Campos a gestionar
$username = trim(strip_tags($_POST["username"]));
$password = $_POST["password"];

try{
    // Verificar si el formulario se envió
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Consultas sql
        $query = "SELECT username, password FROM usuarios WHERE username=:username AND password=:password";
        // Preparar consulta
        $query = $conn->prepare($query);

        // Vincular parametros y limpiar campos para evitar ataques
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);

        // Obtener datos
        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);

        // Verificar si la consulta se ejecutó correctamente
        if ($row) {
            
            session_start();

            $_SESSION['username'] = $row['username'];

            header('location: ../../views/usuario/index.php');
            exit();
        } else {
            // Manejo de errores
            echo "Error al procesar la solicitud.";
        }
    }
    else {
        // Si el formulario no se envió correctamente
        echo "Acceso no autorizado.";
    }

}
catch(PDOException $e){

    echo "Error: " .$e->getMessage();

}

?>
