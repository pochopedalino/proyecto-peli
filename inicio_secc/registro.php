<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarme</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<section class="container-fluid">
    <div class="animate__animated animate__fadeInDownBig">
        <div class="a">
            <h2 class="h2">Registrarme</h2>
        </div>
        <form action="#" method="post" id="loginForm">
            <fieldset>
                <div class="a">
                    <input type="email" class="btn" id="email" name="email" placeholder="Ingrese un Email" required>
                </div>
                <div class="a">
                    <input type="password" class="btn" id="password" name="password" placeholder="Ingrese una Contraseña" required>
                </div>
                <div class="a">
                    <input type="submit" class="btn-1" value="Registrarme">
                </div>
            </fieldset>
        </form>
    </div>
</section>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conexion = mysqli_connect("localhost", "root", "", "peliculasmovies");

    if ($conexion) {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $username = mysqli_real_escape_string($conexion, $_POST['email']);
            $contraseña = mysqli_real_escape_string($conexion, $_POST['password']);
            $tipo_usuario = false;

            // Verificar si el email ya existe
            $query = "SELECT * FROM usuarios WHERE email = '$username'";
            $result = mysqli_query($conexion, $query);

            if (mysqli_num_rows($result) == 0) {
                // Hash de la contraseña
                $contraseña_hash = $contraseña;
                
                // Insertar nuevo usuario
                $query = "INSERT INTO usuarios (email, password, tipo_usuario) VALUES ('$username', '$contraseña_hash', '$tipo_usuario')";
                if (mysqli_query($conexion, $query)) {
                    echo "<script>alert('Usuario registrado correctamente');</script>";
                    echo "<script>window.location.href='inicio_sesion.php';</script>";
                } else {
                    echo "<script>alert('Error al registrar el usuario');</script>";
                }
            } else {
                echo "<script>alert('El email ya está registrado');</script>";
                echo "<script>window.location.href='inicio_sesion.php';</script>";
            }
        }
        mysqli_close($conexion);
    } else {
        echo "<script>alert('No se pudo conectar a la base de datos');</script>";
    }
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
