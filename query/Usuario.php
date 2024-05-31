<?php

class Usuario {

    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    public function mostrarUsuarios() {
        try {
            // Query SQL
            $query = "SELECT * FROM usuarios";

            // Preparar la sentencia
            $stmt = $this->conn->prepare($query);

            // Ejecutar sentencia
            $stmt->execute();

            // Obtener datos
            $datos = $stmt->fetchAll();

            return $datos;

        } catch (PDOException $e) {
            // Manejar errores
            echo "Error: " . $e->getMessage();
            return false; // Otra acción en caso de error
        }
    }

    public function getUser($id){

        try {

            // Query SQL
            $query = "SELECT * FROM usuarios WHERE(id = $id)";

            // Preparar la sentencia
            $stmt = $this->conn->prepare($query);

            // Ejecutar sentencia
            $stmt->execute();

            // Obtener datos
            $dato = $stmt->fetch();

            return $dato;

        } catch (PDOException $e) {
            // Manejar errores
            echo "Error: " . $e->getMessage();
            return false; // Otra acción en caso de error
        }

    }

    public function createUser($username, $password) {
        try {

            $username = $_POST['username'];
            $password = $_POST['password'];
            // Query SQL
            $query = "INSERT INTO usuarios VALUES(:username, :password)";

            // Preparar la sentencia
            $stmt = $this->conn->prepare($query);

            // Vincular parametros
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);

            // Obtener datos
            $stmt->execute();

            //return "Usuario registrado exitosamente!";
            header('location: ../../views/usuario/index.php');
            exit();

        } catch (PDOException $e) {
            // Manejar errores
            echo "Error: " . $e->getMessage();
            return false; // Otra acción en caso de error
        }
    }

    public function updateUser($id, $username, $password) {
        try {

            $username = $_POST['username'];
            $password = $_POST['password'];

            // Query SQL
            $query = "UPDATE usuarios SET username =:username, password =:password WHERE id = $id";

            // Preparar la sentencia
            $stmt = $this->conn->prepare($query);

            // Vincular parametros
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);

            // Obtener datos
            $stmt->execute();

            //return "Usuario registrado exitosamente!";
            header('location: ../../views/usuario/index.php');
            exit();

        } catch (PDOException $e) {
            // Manejar errores
            echo "Error: " . $e->getMessage();
            return false; // Otra acción en caso de error
        }
    }

    public function deleteUser($id) {
        try {
            // Query SQL
            $query = "DELETE usuarios WHERE id = $id";

            // Preparar la sentencia
            $stmt = $this->conn->prepare($query);

            // Obtener datos
            $stmt->execute();

            //return "Usuario registrado exitosamente!";
            header('location: ../../views/usuario/index.php');
            exit();

        } catch (PDOException $e) {
            // Manejar errores
            echo "Error: " . $e->getMessage();
            return false; // Otra acción en caso de error
        }
    }


}

?>
