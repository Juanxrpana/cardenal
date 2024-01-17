<?php require_once './comunes/menu.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/inicio.css">
    <link rel="stylesheet" href="./CSS/bootstrap.css">
    <link rel="stylesheet" href="./CSS/cafe_tostado.css">
    <script src="https://kit.fontawesome.com/ecd5745f4f.js" crossorigin="anonymous"></script>
    <title>Café Tostado</title>
</head>

<body>
    <div class="main--content">
        <div class="header--wrapper">
            <div class="header--titulo">

                <h2>Café Tostado</h2>
            </div>

        </div>
        <div class="contenedor--tarjetas">
            <h3 class="main--titulo">
                DATA
            </h3>
            <div class="container">
                <!-- <div class="row"><input placeholder="cafe-input" type="text" name="cafe-input" class="cafe-input" id="cafe-input"></div> -->
                <div class="row">
                    <form class="row justify-content-md-center" action="POST" method="POST">
                        <input type="text" name="accion" id="accion" style="display:none" />
                        <div class="col form">
                            <span class="title">Añade café para tostar</span>
                            <div>
                                <input name="cafe-input" id="cafe-input">
                               
                            </div>
                        </div>
                        <!-- Grupo: nivel_tostado -->
                        <div class="col col-lg-2 formulario__grupo " id="grupo__nivel_tostado">
                            <label for="nivel_tostado" class="formulario__label">nivel_tostado</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" name="nivel_tostado" id="nivel_tostado" placeholder="1 o 2">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">la identificación</p>
                        </div>
                        <button class="btn-sm" id="incluir" type="button">Añadir</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
</body>

</html>