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
    <div class="sidebar">
        <div class="logo">
            <div class="cardenal"><img src="./extras/LOGO.png" alt=""></div>
        </div>
        
        <ul class="menu">
            <li class="">
                <a href="?pagina=inicio">
                    <i class="fa-solid fa-house"></i>
                    <span>Inicio</span>
                </a>
            </li>
            <li>
                <a href="?pagina=consulta">
                    <i class="fa-solid fa-clipboard"></i>
                    <span>Consultas</span>
                </a>
            </li>
            <li class="active">
                <a href="?pagina=clientes">
                    <i class="fa-solid fa-user"></i>
                    <span>Clientes</span>
                </a>
            </li>
            <li>
                <a href="?pagina=materia_prima">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span>Materia prima</span>
                </a>
            </li>
            <li>
                <a href="?pagina=inventario">
                    <i class="fa-solid fa-box-open"></i>
                    <span>Inventario</span>
                </a>
            </li>
            <li class="logout">
                <a href="?pagina=logout">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Salir</span>
                </a>
            </li>
        </ul>
    </div>

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
        <div class="proveedor" id="proveedor">
            <span>Proveedores</span>
            <div class="tablaDatosproveedor" id="tablaDatosproveedor"></div>
        </div>
        <div class="materia_prima" id="materia_prima">
            <span>Proveedores</span>
            <div class="tablaDatosmateria_prima" id="tablaDatosmateria_prima"></div>
        </div>
    </div>

    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/tabla.js"></script>
    <script src="./js/sweetalert2.js"></script>
</body>

</html>