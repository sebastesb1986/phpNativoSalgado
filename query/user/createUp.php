<?php

include '../../conexion/db.php';

// Variables
$query = "";

// Campos a gestionar
$username = trim(strip_tags($_POST["username"]));
$city_id = $_POST["city_id"];
$password = $_POST["password"];

try{
    // Verificar si el formulario se envió
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Consultas sql
        if(isset($_GET["id"])) {

            $id = $_GET["id"];
            $query = "UPDATE usuarios SET username = :username, city_id = :city_id, password = :password WHERE id = $id";

        } else {

            $query = "INSERT INTO usuarios(username, city_id, password) VALUES(:username, :city_id, :password)";

        }

        // Preparar consulta
        $stmt = $conn->prepare($query);

        // Vincular parametros y limpiar campos para evitar ataques
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':city_id', $city_id, PDO::PARAM_INT);
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

    die("Error: " .$e->getMessage());

}

?>
