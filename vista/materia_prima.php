<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/inicio.css">
    <link rel="stylesheet" href="../CSS/bootstrap.css">
    <link rel="stylesheet" href="../CSS/formularios_registro_materia_prima.css">
    <script src="https://kit.fontawesome.com/ecd5745f4f.js" crossorigin="anonymous"></script>
    <title>CLIENTES</title>
</head>

<body>
    <div class="sidebar">
        <div class="logo">
            <div class="cardenal"><img src="../extras/LOGO.png" alt=""></div>
        </div>
        <div class="cardenal"><img src="../extras/LOGO.png" alt=""></div>
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
            <li class="">
                <a href="?pagina=proveedor">
                    <i class="fa-solid fa-user"></i>
                    <span>Proveedores</span>
                </a>
            </li>
            <li class="active">
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
                <span>Registro y control</span>
                <h2>Materia Prima</h2>
            </div>
            <div class="user--info">
                <span><i class="fa-solid fa-magnifying-glass" style="color: #212121;"></i></span>
                <input class="search--box" type="text" placeholder="texto">
            </div>
        </div>
        <div class="contenedor--tarjetas">
            <h3 class="main--titulo">
                Registro Materia Prima
            </h3>
            <h5>Para registrar materia prima debes seleccionar un cliente, especificar la cantidad de materia prima y luego la calidad de cada uno de los quintales de café.</h5>
            <div class="container">
                <!-- Nav Tabs -->
                <ul class="nav nav-tabs" id="myTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="proveedor-tab" data-bs-toggle="tab" href="#proveedor" role="tab" aria-controls="proveedor" aria-selected="true">Proveedor</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="cantidad-tab" data-bs-toggle="tab" href="#cantidad" role="tab" aria-controls="cantidad" aria-selected="false">Cantidad</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="calidad-tab" data-bs-toggle="tab" href="#calidad" role="tab" aria-controls="calidad" aria-selected="false">Calidad</a>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content" id="myTabsContent">
                    <div class="tab-pane fade show active" id="proveedor" role="tabpanel" aria-labelledby="proveedor-tab">
                        <h1>proveedor</h1>
                        <div id="tablaproveedor" style="color: white;"></div>

                    </div>
                    <div class="tab-pane fade" id="cantidad" role="tabpanel" aria-labelledby="cantidad-tab">
                        <!-- Contenido del formulario para la cantidad de materia prima -->
                        <h1>materia prima</h1>
                    </div>
                    <div class="tab-pane fade" id="calidad" role="tabpanel" aria-labelledby="calidad-tab">
                        <h1>calidad</h1>
                        <!-- Contenido del formulario para la calidad de materia prima -->
                    </div>
                </div>
            </div>

            <script src="/js/bootstrap.bundle.js"></script>
            <script src="/js/jquery-3.6.0.min.js"></script>
            <script src="/js/formulario_registro_materia_prima.js"></script>
</body>

</html>