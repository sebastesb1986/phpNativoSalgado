<?php include './conexion/conexion.php' ?>

<?php

    // Creamos sentencia sql
    $query = "SELECT * FROM usuarios";

    // Preparar la sentencia
    $stmt = $conn -> prepare($query);

    // ejecutar sentencia
    $stmt-> execute();

    // guardar datos
    $datos = $stmt->fetchAll();
    
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
                                <button type="button" class="btn btn-sm btn-warning" onclick="hola(<?= $dato['id'] ?>)">Edit</button>&nbsp;
                                <button type="button" class="btn btn-sm btn-danger">Delete</button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

<script>

function hola(id){

    alert(id);

}

</script>