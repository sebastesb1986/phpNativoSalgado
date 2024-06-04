<?php

session_start();

// Verificar si la sesión está iniciada
if (!isset($_SESSION["username"])) {
    // Si la sesión no está iniciada, redirigir al usuario al inicio de sesión
    header("Location: ../../views/auth/index.php");
    exit(); // Asegurarse de detener la ejecución del script después de redireccionar
}

require_once '../../query/user/user.php';
require_once '../../query/city/city.php';
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
            <div class="form-group col-md-6">
                <label for="city">Ciudad</label>
                <select class="custom-select" name="city_id" id="city">
                    <option value="">Seleccione...</option>
                    <?php foreach($ciudades as $ciudad):?>
                        <option value="<?= !empty($ciudad['id']) ? $ciudad['id'] : '' ?>" <?= (!empty($dato['id']) && $ciudad['id'] == $dato['city_id']) ? 'selected' : '' ?> ><?= $ciudad['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-info">Guardar</button>
    </form>
</body>
