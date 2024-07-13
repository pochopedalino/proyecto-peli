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
    <link rel="stylesheet" href="stile.css">
</head>
<body>
<section class="container-fluid">
    <div class="animate__animated animate__fadeInDownBig">
        <div class="a">
            <h2 class="h2">Registrar películas</h2>
        </div>
        <form action="datos-obtenidos.php" method="post"  id="edit_id">
            <fieldset>
                <div class="a">
                    <input type="text" class="btn" id="edit_nombre" name="nombre" placeholder="Nombre">
                </div>
                <div class="a">
                    <input type="text" class="btn" id="edit_genero" name="genero" placeholder="Género">
                </div>
                <div class="a">
                    <input type="text" class="btn" id="edit_calificasion" name="calificasion" placeholder="Calificación">
                </div>
                <div class="a">
                    <input type="text" class="btn" id="edit_director" name="director" placeholder="Director">
                </div>
                <div class="a">
                    <input type="submit" class="btn-1" value="Enviar datos">
                </div>
            </fieldset>
        </form>
        <a href="#" class="registrarse">Registrarse</a>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
