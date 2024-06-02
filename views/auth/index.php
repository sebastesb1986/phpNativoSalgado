<?php

session_start();

// Verificar si ya hay una sesión iniciada
if (isset($_SESSION['username'])) {
    // Si ya hay una sesión iniciada, redirigir al usuario a usuario/index.php
    header('location: ../../views/usuario/index.php');
    exit(); // Asegurar que la ejecución del script se detenga después de la redirección
}

include '../layouts/header.php';

?>

<body>
   <form method="POST" action="../../query/auth/session.php">
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="username">Nombre de usuario</label>
            <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group col-md-6">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
    </form>
    
</body>