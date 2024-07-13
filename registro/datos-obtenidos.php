


<?php

$conexion = mysqli_connect("localhost", "root", "", "registro_peliculas");

// Insertar nueva película si se envía el formulario
if ($conexion && isset($_POST['nombre']) && isset($_POST['genero']) && isset($_POST['calificasion']) && isset($_POST['director'])) {
    $nombre = $_POST['nombre'];
    $genero = $_POST['genero'];
    $calificasion = $_POST['calificasion'];
    $director = $_POST['director'];

    $insertardatos = "INSERT INTO peliculas (id, nombre, genero, calificasion, director) VALUES (NULL, '$nombre', '$genero', '$calificasion', '$director')";
    mysqli_query($conexion, $insertardatos);
}

// Eliminar película si se envía la variable GET 'eliminar'
if ($conexion && isset($_GET['eliminar'])) {
    $id_eliminar = $_GET['eliminar'];
    $eliminar_dato = "DELETE FROM peliculas WHERE id=$id_eliminar";
    mysqli_query($conexion, $eliminar_dato);
}

// Actualizar película si se envía el formulario de edición
if ($conexion && isset($_GET['editar']) && $_SERVER["REQUEST_METHOD"] == "POST" ) {
    $edit_id = $_POST['edit_id'];
    $idd = $_GET['editar'];
    echo $idd;
    $edit_nombre = $_POST['edit_nombre'];
    $edit_genero = $_POST['edit_genero'];
    $edit_calificasion = $_POST['edit_calificasion'];
    $edit_director = $_POST['edit_director'];

    $actualizar_dato = "UPDATE peliculas SET nombre='$edit_nombre', genero='$edit_genero', calificasion='$edit_calificasion', director='$edit_director' WHERE id=$idd";
    mysqli_query($conexion, $actualizar_dato);
}

// Consultar todas las películas
$consultas = mysqli_query($conexion, "SELECT * FROM peliculas");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Películas Ingresadas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

<a href="http://localhost/proyecto%20peli/index.php">volver al inicio</a>

<div class="container">
    <div class="row mt-4">
        <div class="col">
            <h2>Películas Ingresadas</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre Película</th>
                        <th scope="col">Género</th>
                        <th scope="col">Calificación</th>
                        <th scope="col">Director</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if (isset($consultas)) {
                    while ($listado = mysqli_fetch_array($consultas)) {
                        echo "<tr>";
                        echo "<td>" . $listado['id'] . "</td>";
                        echo "<td>" . $listado['nombre'] . "</td>";
                        echo "<td>" . $listado['genero'] . "</td>";
                        echo "<td>" . $listado['calificasion'] . "</td>";
                        echo "<td>" . $listado['director'] . "</td>";
                        echo "<td>";
                        echo "<form action='' method='post'>";
                        echo "<input type='hidden' name='edit_id' value='" . $listado['id'] . "'>";
                        echo "<a  href='?editar=" . $listado['id']. "' class='btn btn-sm btn-primary' name='action' value='edit'>Editar</a> ";
                        echo "<a href='?eliminar=" . $listado['id'] . "' class='btn btn-sm btn-danger' onclick='return confirm(\"¿Estás seguro de eliminar esta película?\")'>Eliminar</a>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Formulario para editar película -->
    <?php
    if (isset($_POST['action']) && $_POST['action'] == 'edit' || $_GET['editar']) {
        //$edit_id = $_POST['editar'];
        $id = $_GET['editar'];
        $query_edit = mysqli_query($conexion, "SELECT * FROM peliculas WHERE id=$id");
        $datos_edit = mysqli_fetch_assoc($query_edit);
        ?>
        <div class="row mt-4">
            <div class="col">
                <h3>Editar Película</h3>
                <form action="" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $datos_edit['id']; ?>">
                    <div class="mb-3">
                        <label for="edit_nombre" class="form-label">Nombre Película</label>
                        <input type="text" class="form-control" id="edit_nombre" name="edit_nombre" value="<?php echo $datos_edit['nombre']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_genero" class="form-label">Género</label>
                        <input type="text" class="form-control" id="edit_genero" name="edit_genero" value="<?php echo $datos_edit['genero']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_calificasion" class="form-label">Calificación</label>
                        <input type="text" class="form-control" id="edit_calificasion" name="edit_calificasion" value="<?php echo $datos_edit['calificasion']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_director" class="form-label">Director</label>
                        <input type="text" class="form-control" id="edit_director" name="edit_director" value="<?php echo $datos_edit['director']; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
        </div>
        <?php
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

