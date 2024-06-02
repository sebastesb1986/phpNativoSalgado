<?php

session_start();

// Verificar si la sesión está iniciada
if (!isset($_SESSION["username"])) {
    // Si la sesión no está iniciada, redirigir al usuario al inicio de sesión
    header("Location: ../../views/auth/index.php");
    exit(); // Asegurarse de detener la ejecución del script después de redireccionar
}

require_once '../../query/user/user.php';
include '../layouts/header.php';

?>

<body>
    <form method="POST" action="../../query/user/createUp.php<?= isset($dato['id']) ? '?id='.$dato['id'] : '' ?>">
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="username">Nombre de usuario</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= !empty($dato['username']) ? $dato['username'] : '' ?>" >
            </div>
            <div class="form-group col-md-6">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" value="<?= !empty($dato['password']) ? $dato['password'] : '' ?>">
            </div>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</body>
