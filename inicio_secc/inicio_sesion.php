<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesion</title>
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
            <h2 class="h2">Iniciar sesion</h2>
        </div>
        <form action="" method="post" id="loginForm">
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
// Verifica si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "peliculasmovies");

    // Verifica la conexión
    if (!$conexion) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    // Obtener los datos del formulario
    $email = mysqli_real_escape_string($conexion, $_POST['email']);
    $password = mysqli_real_escape_string($conexion, $_POST['password']);

    // Consultar si el usuario existe
    $query = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = mysqli_query($conexion, $query);

    // Verificar si se encontró el usuario
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        // Verificar la contraseña
        if ($password == $user['password']) {
            // Contraseña correcta, iniciar sesión
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['tipo_usuario'] = $user['tipo_usuario'];

            // Redirigir a la página principal
            header("Location:pagina_principal.php");
            exit();
        } else {
            // Contraseña incorrecta
            echo "<script>alert('Contraseña incorrecta');</script>";
        }
    } else {
        // Correo electrónico no registrado
        echo "<script>alert('Correo electrónico no registrado');</script>";
    }

    // Cerrar la conexión
    mysqli_close($conexion);
}
?>

</body>
</html>