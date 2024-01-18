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
            <div id="contador_cafe_tostado" class="contador_cafe_tostado"></div>
        </div>
        <div class="contenedor--tarjetas">
            <h3 class="main--titulo">
                Registro para tostar café
            </h3>
            <div class="container">
                <!-- <div class="row"><input placeholder="cafe-input" type="text" name="cafe-input" class="cafe-input" id="cafe-input"></div> -->
                <div class="form">
                    <form class="formulario" action="POST" method="POST">
                        <input type="text" name="accion" id="accion" style="display:none" />
                        <!-- Grupo: nivel_tostado -->
                        <div class="formulario__grupo cafe-input" id="grupo__nivel_tostado">
                            <label for="nivel_tostado" class="formulario__label title">Nivel de tostado</label>
                            <div class="formulario__grupo-input">
                                <select name="select" id="nivel_tostado">
                                    <option selected>Seleccion</option>
                                    <option value="1">Claro</option>
                                    <option value="2" selected>Medio</option>
                                    <option value="3">Oscuro</option>
                                </select>
                            </div>
                        </div>
                        <!-- Grupo: nivel_molido -->
                        <div class="formulario__grupo cafe-input " id="grupo__nivel_molido">
                            <label for="nivel_molido" class="formulario__label title">Nivel de molido</label>
                            <div class="formulario__grupo-input">
                                <select name="select" id="nivel_molido">
                                    <option selected>Seleccion</option>
                                    <option value="1">Extra Fino</option>
                                    <option value="2">Fino</option>
                                    <option value="3" selected>Medio</option>
                                    <option value="4">Grueso</option>
                                </select>
                            </div>
                        </div>
                        <!-- Grupo: input -->
                        <div class="cafe-input">
                            <span class="title">Añade café para tostar</span>
                            <div>
                                <input name="cafe-input" id="cafe-input">

                            </div>
                        </div>

                        <button class="btn-sm" id="incluir" type="button">Añadir</button>


                    </form>
                    <div id="tablaDatoscafe_tostado"></div>

                </div>

            </div>
        </div>
    </div>
    <script src="./js/bootstrap.bundle.js"></script>
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/formulario_registro_cafe_tostado.js"></script>
    <script src="./js/sweetalert2.js"></script>
</body>

</html>