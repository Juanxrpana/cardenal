<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/inicio.css">
    <link rel="stylesheet" href="CSS/bootstrap.css">
    <link rel="stylesheet" href="CSS/formularios_registro_materia_prima.css">
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
            <div class="header--titulo" id="hola">
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
    <div class="container">

        <form method="POST" class="formulario" id="formulario">
            <input type="text" name="accion" id="accion" style="display:none" />
            
            
            <!-- Grupo: sd -->

                <div class="row">
                     <div class="col-6">
                        <select name="proveedor" id="proveedor">
                            <option value="232" selected>Proveedor</option>
                            
                        </select>
                    </div>
                    <div class="col-6">
                    <input type="date" class="datepicker_input form-control" id="fecha" placeholder="" required="">
                    </div>
                </div>

                
                
                <div class="row">
                    <div class="calidad col-sm-5 " style="background: rgba(183, 32, 37, 255); color:white; border-radius: 6px;">
                        <label for="Calidad A" class="form-label">Calidad A</label>
                        <input type="text" class="form-control" id="cantidad1" placeholder="">
                        
                    </div>
                    <input type="text" class="form-control" id="calidad1" value="1" style="display:none">
                    <input type="text" class="form-control" id="calidad2" value="2" style="display:none">
                    <div class="calidad col-sm-2 ">
                                            
                        </div>
                    <div class="calidad col-sm-5" style="background:rgba(183, 32, 37, 255); color:white; border-radius: 6px;">
                        <label for="Calidad B" class="form-label">Calidad B</label>
                        <input type="text" class="form-control" id="cantidad2" placeholder="" >
                    </div>
                    <!-- Grupo: Cantidad -->
                    
                    
                    
                    
                    
                    
                    
                    <div class="formulario__mensaje" id="formulario__mensaje">
                        <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                    </div>
                    
                    <div class="formulario__grupo formulario__grupo-btn-enviar">
                        <button type="button" class="btn btn-dark" id="incluir" name="incluir">INCLUIR</button>
                        <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
                    </div>
                </form>
            </div>

            <div class="materia_prima" id="materia_prima">
            
            <span>Materia Prima</span>
            <div class="tablaDatosmateria_prima" id="tablaDatosmateria_prima"></div>
        </div>
                




                
                
            </div>
            

        <script src="./js/bootstrap.bundle.js"></script>
        <script src="./js/jquery-3.6.0.min.js"></script>
        <script src="./js/formulario_registro_materia_prima.js"></script>
        <script src="./js/sweetalert2.js"></script>
</body>

</html>