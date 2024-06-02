<?php

session_start();

// Verificar si la sesión está iniciada
if (!isset($_SESSION["username"])) {
    // Si la sesión no está iniciada, redirigir al usuario al inicio de sesión
    header("Location: ../../views/auth/index.php");
    exit(); // Asegurarse de detener la ejecución del script después de redireccionar
}

include '../layouts/header.php';

?>

<body>
    <!-- Formulario de búsqueda -->
    <form method="POST">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="search">Buscar</label>
                <input type="text" class="form-control" id="search" name="search">
            </div>
        </div>
        <button type="submit" class="btn btn-warning">Buscar</button>
    </form>

    <?php
    // Verificar si se ha enviado el formulario de búsqueda
    if (isset($_POST["search"])):
        // Aquí incluirías el código PHP para realizar la búsqueda y mostrar los resultados
        include '../../query/user/search.php';
    ?>

        <!-- Tabla de resultados -->
        <table>
            <thead>
                <th>Nombre</th>
            </thead>
            <tbody>
                <?php if (isset($_POST["search"]) && !empty($_POST["search"])): ?>
                    <?php foreach($datos as $dato): ?>
                        <tr>
                            <td><?= $dato['username'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif ?>
            </tbody>
        </table>

    <?php endif; // Cierre del bloque PHP para verificar si se envió el formulario de búsqueda ?>

</body>
