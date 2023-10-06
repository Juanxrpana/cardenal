<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/login.css">
    <title>Inicio</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container-registro">
            <form action="">
                <h1>Crear cuenta</h1>

                <input type="text" name="nombre" id="nombre" placeholder="Nombre">

                <input type="text" name="apellido" id="apellido" placeholder="Apellido">

                <input type="text" name="nombre_usuario" id="nombre_usuario" placeholder="Nombre de usuario">

                <input type="text" name="contrasena" id="contrasena" placeholder="Contrasena">

                <input type="text" name="confirmar_contrasena" id="confirmar_contrasena" placeholder="Confirmar Contraseña">
                <button>REGISTRARSE</button>
            </form>
        </div>
        <div class="form-container-sesion">
            <form action="">
                <h1>Iniciar Sesion</h1>
                <input type="text" name="nombre_usuario" id="nombre_usuario" placeholder="Usuario">
                <input type="text" name="password" id="password" placeholder="password">
                <button>Iniciar Sesion</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>En hora buena</h1>
                    <p>Para iniciar sesion utiliza tus datos</p>
                    <button class="hidden" id="login">Iniciar Sesion</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hola</h1>
                    <p>Debes registrarte para poder acceder a la aplicación</p>
                    <button class="hidden" id="register">REGISTRARSE</button>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="./js/login.js"></script>

</html>