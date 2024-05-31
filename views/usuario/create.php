<?php

require_once '../../conexion/db.php';
require_once '../../query/Usuario.php';
include '../layouts/header.php';

// Verificar si se han enviado datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el nombre de usuario y la contraseña del formulario
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Crear una instancia de la clase Usuario pasando la conexión como parámetro
    $usuario = new Usuario($conn);

    // Llamar a la función registrarUsuario() pasando el nombre de usuario y la contraseña como argumentos
    $mensaje = $usuario->createUser($username, $password);

    // Mostrar el mensaje de éxito o error
    echo $mensaje;
}

?>

<body>
    <form method="POST" action="">
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="username">Nombre de usuario</label>
            <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="form-group col-md-6">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
</body>
