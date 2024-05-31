<?php

require_once '../../conexion/db.php';
require_once '../../query/Usuario.php';
include '../layouts/header.php';

// Crear una instancia de la clase Usuario pasando la conexión como parámetro
$usuario = new Usuario($conn);
$id = !empty($_GET['id']) ? $_GET['id'] : "" ;
// Obtener los datos de los usuarios
$datos = $usuario->mostrarUsuarios();
//$pato = $usuario->deleteUser();

?>

<body>
    <div class="container">
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
                                <a href="update.php?id=<?=$dato['id']?>" class="btn btn-sm btn-warning">Edit</a>&nbsp;
                                <a href="<?=$dato['id']?>" class="btn btn-sm btn-danger">Delete</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
