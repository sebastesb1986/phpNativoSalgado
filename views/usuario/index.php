<?php

session_start();

// Verificar si la sesión está iniciada
if (!isset($_SESSION["username"])) {
    // Si la sesión no está iniciada, redirigir al usuario al inicio de sesión
    header("Location: ../../views/auth/index.php");
    exit(); // Asegurarse de detener la ejecución del script después de redireccionar
}

require_once '../../query/user/lista.php';
include '../layouts/header.php';

?>

<body>
    <div class="container">
        <div>
            <a href="./user.php" class="btn btn-primary">Crear usuario</a>
            <a href="./search.php" class="text-warning">Buscar usuario</a>
            <a href="#" class="text-primary">Bienvenido <?= $_SESSION["username"] ?></a>
            <a href="../../query/auth/logout.php">Cerrar sesión</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre de usuario</th>
                <th scope="col">Contraseña</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos as $index => $dato): ?>
                    <tr>
                        <th scope='row'><?= $index + 1 ?></th>
                        <th scope='row'><?= $dato['username'] ?></th>
                        <td><?= $dato['password'] ?></td>
                        <td>
                            <div class="d-grid gap-2 d-md-flex">
                                <a href="./user.php?id=<?=$dato['id']?>" class="btn btn-sm btn-warning">Edit</a>&nbsp;
                                <a href="../../query/user/delete.php?id=<?=$dato['id']?>" class="btn btn-sm btn-danger">Delete</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
