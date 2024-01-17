<?php require_once './comunes/menu.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/inicio.css">
    <link rel="stylesheet" href="./CSS/bootstrap.css">
    <link rel="stylesheet" href="./CSS/consulta.css">
    
    <script src="https://kit.fontawesome.com/ecd5745f4f.js" crossorigin="anonymous"></script>
    <title>CLIENTES</title>
</head>

<body>
    <div class="main--content">
        <div class="header--wrapper">
            <div class="header--titulo">
                <span>Consulta de tablas</span>
                <h2>Tablas</h2>
            </div>
            <div class="user--info">
                <a href="?pagina=inicio" class="btn btn-light">Atras</a>
            </div>
        </div>

    <div class="tablas">
    <span>Proveedores</span>
        <div class="proveedor" id="proveedor">
            
            <div class="tablaDatosproveedor" id="tablaDatosproveedor"></div>
        </div>
        <div class="materia_prima" id="materia_prima">
            <span>Materia Prima</span>
            <div class="tablaDatosmateria_prima" id="tablaDatosmateria_prima"></div>
        </div>
    </div>

    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/tabla.js"></script>
    <!-- <script src="./js/proveedor.js"></script> -->
    <script src="./js/sweetalert2.js"></script>
</body>

</html>