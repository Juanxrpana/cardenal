<?php require_once './comunes/menu.php';
?>
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
                                <h3>PROVEEDORES</h3>
                            </span>
                            <span class="ammount-value" id="contador_proveedores">
                                4
                            </span>
                            <span class="tarjetas--detalles">
                                <i><a href="?pagina=consulta">VER ULTIMO REGISTRO</a></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="tarjetas tarjetas--inventario">
                    <div class="tarjetas--cabezera">
                        <div class="ammount">
                            <span class="titulo">
                                <h3>CAFÉ TOSTADO</h3>
                            </span>
                            <span class="ammount-value" id="contador_cafe_tostado">
                                4
                            </span>
                            <span class="tarjetas--detalles">
                                <i><a href="?pagina=consulta">VER ULTIMO REGISTRO</a></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="tarjetas tarjetas--compras">
                    <div class="tarjetas--cabezera">
                        <div class="ammount">
                            <span class="titulo">
                               <h3>CAFÉ FINAL</h3>
                            </span>
                            <span class="ammount-value">
                                4
                            </span>
                            <span class="tarjetas--detalles" id="contador_cafe_final">
                              <i><a href="?pagina=consulta">VER ULTIMO REGISTRO</a></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="tarjetas tarjetas--materia_prima">
                    <div class="tarjetas--cabezera">
                        <div class="ammount">
                            <span class="titulo">
                               <h3>MATERIA PRIMA</h3>
                            </span>
                            <span class="ammount-value">
                                4
                            </span>
                            <span class="tarjetas--detalles" id="contador_cafe_final">
                              <i><a href="?pagina=consulta">VER ULTIMO REGISTRO</a></i>
                            </span>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
</body>

</html>