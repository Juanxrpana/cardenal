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
    <link rel="stylesheet" href="./CSS/style.css">
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
                Registro de café empaquetado
            </h3>
            <div id="tablaDatoscafe_tostado_final"></div>
            <div id="tablaDatoscafe_final"></div>

        </div>

     </div>

    <script src="./js/bootstrap.bundle.js"></script>
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/formulario_registro_cafe_final.js"></script>
    <script src="./js/sweetalert2.js"></script>
</body>

</html>