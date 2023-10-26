<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/inicio.css">
    <link rel="stylesheet" href="./CSS/bootstrap.css">
    <script src="https://kit.fontawesome.com/ecd5745f4f.js" crossorigin="anonymous"></script>
    <title>INICIO</title>
</head>

<body>
    <div class="sidebar">
        <div class="logo">
            <div class="cardenal"><img src="./extras/LOGO.png" alt=""></div>
        </div>
        <div class="cardenal"><img src="./extras/LOGO.png" alt=""></div>
        <ul class="menu">
            <li class="active">
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
            <li>
                <a href="?pagina=proveedor">
                    <i class="fa-solid fa-user"></i>
                    <span>Proveedores</span>
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
                <span>inicio</span>
                <h2>Controles</h2>
            </div>
            <div class="user--info">
                <span><i class="fa-solid fa-magnifying-glass" style="color: #212121;"></i></span>
                <input class="search--box" type="text" placeholder="texto">
            </div>
        </div>
        <div class="contenedor--tarjetas">
            <h3 class="main--titulo">
                DATA
            </h3>
            <div class="tarjetas--wrapper">
                <!-- aqui empiezan las tarjetas -->
                <div class="tarjetas tarjetas--clientes">
                    <div class="tarjetas--cabezera">
                        <div class="ammount">
                            <span class="titulo">
                                <h3>CLIENTES</h3>
                            </span>
                            <span class="ammount-value">
                                4
                            </span>
                            <span class="tarjetas--detalles">
                                <i><a href="?pagina=tablas">VER ULTIMO REGISTRO</a><img src="./extras/eye-solid.svg" alt="./extras/eye-solid.svg">  </i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="tarjetas tarjetas--inventario">
                    <div class="tarjetas--cabezera">
                        <div class="ammount">
                            <span class="titulo">
                                <h3>INVENTARIO</h3>
                            </span>
                            <span class="ammount-value">
                                4
                            </span>
                            <span class="tarjetas--detalles">
                                <i><a href="?pagina=tablas">VER ULTIMO REGISTRO</a><img src="./extras/eye-solid.svg" alt="./extras/eye-solid.svg">  </i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="tarjetas tarjetas--compras">
                    <div class="tarjetas--cabezera">
                        <div class="ammount">
                            <span class="titulo">
                               <h3> COMPRAS</h3>
                            </span>
                            <span class="ammount-value">
                                4
                            </span>
                            <span class="tarjetas--detalles">
                              <i><a href="?pagina=tablas">VER ULTIMO REGISTRO</a><img src="./extras/eye-solid.svg" alt="./extras/eye-solid.svg">  </i>
                            </span>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
</body>

</html>