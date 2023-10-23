<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/inicio.css">
    <link rel="stylesheet" href="./CSS/bootstrap.css">
    <link rel="stylesheet" href="./CSS/formularios_registro_clientes.css">
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
                <span>Registro y control</span>
                <h2>Proveedores</h2>
            </div>
            <div class="user--info">
                <span><i class="fa-solid fa-magnifying-glass" style="color: #212121;"></i></span>
                <input class="search--box" type="text" placeholder="texto">
            </div>
        </div>
        <div class="contenedor--tarjetas">
            <h3 class="main--titulo">
                Registro Proveedor
            </h3>
            <form action="" class="formulario" id="formulario">
                <!-- Grupo: rif -->
                <div class="formulario__grupo" id="grupo__rif">
                    <label for="rif" class="formulario__label">RIF</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" name="rif" id="rif" placeholder="V123456789">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">El rif debe tener un maxmio de 11 caracteres</p>
                </div>

                <!-- Grupo: Nombre -->
                <div class="formulario__grupo" id="grupo__nombre">
                    <label for="nombre" class="formulario__label">Nombre del Comercio / Empresa</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" name="nombre" id="nombre" placeholder="Cafe Cardenal C.A.">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">El nombre de la empresa/comercio debe contener al menos 6 caracteres</p>
                </div>

                <!-- Grupo: direccion -->
                <div class="formulario__grupo" id="grupo__direccion">
                    <label for="direccion" class="formulario__label">Dirección</label>
                    <div class="formulario__grupo-select">
                        <select name="estado" id="estado">
                            <option value="null">Estado</option>
                            <option value="lara">Lara</option>
                            <option value="portuguesa">Portuguesa</option>
                            <option value="yaracuy">Yaracuy</option>
                            <option value="tachira">Tachira</option>
                        </select>


                        <select name="municipio" id="municipio">
                            <option value="null">Municipio</option>
                            <option value="lara">Lara</option>
                            <option value="portuguesa">Portuguesa</option>
                            <option value="yaracuy">Yaracuy</option>
                            <option value="tachira">Tachira</option>
                        </select>

                        <select name="parroquia" id="parroquia">
                            <option value="null">Parroquia</option>
                            <option value="lara">Lara</option>
                            <option value="portuguesa">Portuguesa</option>
                            <option value="yaracuy">Yaracuy</option>
                            <option value="tachira">Tachira</option>
                        </select>


                        <select name="ciudad" id="ciudad">
                            <option value="null">Ciudad</option>
                            <option value="lara">Lara</option>
                            <option value="portuguesa">Portuguesa</option>
                            <option value="yaracuy">Yaracuy</option>
                            <option value="tachira">Tachira</option>
                        </select>





                    </div>

                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" name="direccion" id="direccion" placeholder="Calle ** Carrera **">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">La dirección debe tener alguna referencia de la zona del cliente</p>
                </div>


                <!-- Grupo: Teléfono -->
                <div class="formulario__grupo" id="grupo__telefono">
                    <label for="telefono" class="formulario__label">Teléfono</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" name="telefono" id="telefono" placeholder="4491234567">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">El telefono solo puede contener numeros y el maximo 11 dígitos.</p>
                </div>


                <!-- Grupo: Terminos y Condiciones
                <div class="formulario__grupo" id="grupo__terminos">
                    <label class="formulario__label">
                        <input class="formulario__checkbox" type="checkbox" name="terminos" id="terminos">
                        Acepto los Terminos y Condiciones
                    </label>
                </div> -->

                <div class="formulario__mensaje" id="formulario__mensaje">
                    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                </div>

                <div class="formulario__grupo formulario__grupo-btn-enviar">
                    <button type="submit" class="btn btn-dark" id="boton__enviar">Enviar</button>
                    <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
                </div>
            </form>







        </div>
        
    </div>
    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/formulario_registro_clientes.js"></script>
</body>

</html>