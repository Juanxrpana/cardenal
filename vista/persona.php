<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ecd5745f4f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./CSS/landing.css">
    <link rel="stylesheet" href="./CSS/bootstrap.min.css">
    <link href=".CSS/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
    <link rel="stylesheet" href="./CSS/formularios.css">
    <title>inicio</title>
</head>

<body>

    <body>
        <header>
            <div class="icon">
                <img class="logo" src="./extras/LOGO.png" alt="">
            </div>
            <input type="checkbox" id="nav_check" hidden>
            <nav>
                <!-- <div class="icon">
                <img class="logo" src="../extras/LOGO.png" alt="" >
            </div> -->
                <ul class="lista">
                    <li>
                        <a href="?pagina=modulo1">Inicio</a>
                    </li>
                    <li>
                        <a href="?pagina=clientes" class="activo">Clientes</a>
                    </li>
                    <li>
                        <a href="">Modulo3</a>
                    </li>
                    <li>
                        <a href="">Modulo4</a>
                    </li>
                    <li>
                        <a href="">Modulo5</a>
                    </li>
                    <li class="sesion">
                        <a href="">Login <img src="./extras/usuario.png" class="usersesion"></a>
                    </li>
                </ul>
            </nav>
            <label for="nav_check" class="barras">
                <div></div>
                <div></div>
                <div></div>
            </label>
            <a href="logout.php">Cerrar Sesión</a>
        </header>
        <div class="decorado"></div>
        <main>
        <a href="logout.php">Cerrar Sesión</a>
            <div class="clientes">
            <a href="logout.php">Cerrar Sesión</a>
                <!-- Aquí empieza el formulario consta de dos partes left - right para ordenar segun la necesidad -->

                <ul class="nav nav-tabs" id="pestañas" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="consulta-tab" data-bs-toggle="tab" data-bs-target="#consulta" type="button" role="tab" aria-controls="consulta" aria-selected="true">CONSULTA</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="registro-tab" data-bs-toggle="tab" data-bs-target="#registro" type="button" role="tab" aria-controls="registro" aria-selected="false">REGISTRO</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="imprimir-tab" data-bs-toggle="tab" data-bs-target="#imprimir" type="button" role="tab" aria-controls="imprimir" aria-selected="false">IMPRIMIR</button>
                    </li>

                </ul>
                <div class="tab-content" id="myTabContent">
                    <!-- mostrar tabla consulta-->
                    <div class="tab-pane fade show active" id="consulta" role="tabpanel" aria-labelledby="consulta-tab">
                        <div id="tablaDatosPersonas" style="color: white;"></div>
                    </div>
                    <!--Formulario-->
                    <div class="tab-pane fade" id="registro" role="tabpanel" aria-labelledby="registro-tab">

                        <div class="container-form">
                            <header class="titulo_form">Nuevo Registro: Persona</header>
                            <div class="formulario" id="formulario">

                                <!--aqui empieza el formulario-->

                                <form id="frminsertpersona" class="persona" action="" method="POST">

                                    <!-- grupo id de persona -->
                                    <div class="formulario__grupo" id="grupo__id_persona">
                                        <label for="id_persona" class="formulario__label">Cedula</label>
                                        <div class="formulario__grupo-input">
                                            <input type="text" id="id_persona" name="id_persona" class="form-control form-control-sm form__input">
                                            <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                                        </div>
                                        <p class="formulario__ipnut-error">El numero del cédula del persona no debe llevar letras ni caracteres especiales "();/&*</p>
                                    </div>

                                    <!-- grupo Telefono del persona -->
                                    <div class="formulario__grupo" id="grupo__telefono">
                                        <label for="telefono" class="formulario__label">Teléfono </label>
                                        <div class="formulario__grupo-input">
                                            <input type="text" id="telefono" name="telefono" class="form-control form-control-sm form__input">
                                            <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                                        </div>
                                        <p class="formulario__ipnut-error">El Apellido del persona no debe poseer numeros ni caracteres especiales "();/&*</p>
                                    </div>

                                    <!-- grupo rif del persona -->
                                    <div class="formulario__grupo" id="grupo__rif">
                                        <label for="rif" class="formulario__label">RIF </label>
                                        <div class="formulario__grupo-input">
                                            <input type="text" id="rif" name="rif" class="form-control form-control-sm form__input">
                                            <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                                        </div>
                                        <p class="formulario__ipnut-error">El Apellido del persona no debe poseer numeros ni caracteres especiales "();/&*</p>
                                    </div>

                                    <!-- grupo tipo_cliente_id del persona -->
                                    <div class="formulario__grupo" id="grupo__tipo_cliente_id">
                                        <label for="tipo_cliente_id" class="formulario__label">Tipo de Cliente </label>
                                        <div class="formulario__grupo-input">
                                            <select name="tipo_cliente_id" id="tipo_cliente_id" class="form-control form-control-sm form__input">
                                                <option value="">Selecciona un tipo de cliente</option>
                                                <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                                                <?php
                                                // Arreglo de opciones
                                                $opciones = [
                                                    '1' => 'Persona Natural',
                                                    '2' => 'Persona Jurídica',
                                                ];

                                                // Generar las opciones
                                                foreach ($opciones as $valor => $etiqueta) {
                                                    echo "<option value=\"$valor\">$etiqueta</option>";
                                                }
                                                ?>
                                            </select>
                                            
                                            
                                        </div>
                                        <p class="formulario__ipnut-error">El Apellido del persona no debe poseer numeros ni caracteres especiales "();/&*</p>
                                    </div>

                                    <!-- nombre            Nombrepersona2            apellido            apellido1   -->

                                    <!-- grupo Nombre del persona -->
                                    <div class="formulario__grupo" id="grupo__Nombrepersona">
                                        <label for="nombre" class="formulario__label">Nombre </label>
                                        <div class="formulario__grupo-input">
                                            <input type="text" id="nombre" name="nombre" class="form-control form-control-sm form__input">
                                            <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                                        </div>
                                        <p class="formulario__ipnut-error">El nombre del persona no debe poseer numeros ni caracteres especiales "();/&*</p>
                                    </div>

                                    <!-- grupo Nombre2 del persona -->
                                    <div class="formulario__grupo" id="grupo__nombre1">
                                        <label for="nombre1" class="formulario__label">Segundo nombre </label>
                                        <div class="formulario__grupo-input">
                                            <input type="text" id="nombre1" name="" class="form-control form-control-sm form__input">
                                            <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                                        </div>
                                        <p class="formulario__ipnut-error">El nombre del persona no debe poseer numeros ni caracteres especiales "();/&*</p>
                                    </div>

                                    <!-- grupo Apellido del persona -->
                                    <div class="formulario__grupo" id="grupo__apellido">
                                        <label for="apellido" class="formulario__label">Apellido </label>
                                        <div class="formulario__grupo-input">
                                            <input type="text" id="apellido" name="apellido" class="form-control form-control-sm form__input">
                                            <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                                        </div>
                                        <p class="formulario__ipnut-error">El Apellido del persona no debe poseer numeros ni caracteres especiales "();/&*</p>
                                    </div>

                                    <!-- grupo Apellido2 del persona -->
                                    <div class="formulario__grupo" id="grupo__apellido1">
                                        <label for="apellido1" class="formulario__label">Segundo Apellido </label>
                                        <div class="formulario__grupo-input">
                                            <input type="text" id="apellido1" name="" class="form-control form-control-sm form__input">
                                            <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                                        </div>
                                        <p class="formulario__ipnut-error">El Apellido del persona no debe poseer numeros ni caracteres especiales "();/&*</p>
                                    </div>



                                    <br>

                                    <!-- MENSAJE DE ERROR -->
                                    <div class="formulario__mensaje" id="formulario__mensaje">
                                        <p><i class="fa-solid fa-exclamation error_icon"></i><b>ERROR: </b>Debes rellenar correctamente el formulario</p>
                                    </div>



                                    <input class="form-control form-control-sm" type="text" value="insertar" name="accion" id="accion" style="display: none;">
                                </form>



                            </div>
                            <!-- Sección para Cliente Natural -->
                            <div class="container-form" id="clienteNaturalSection" style="display: none;">
                                <!-- Aquí coloca los campos para Cliente Natural -->
                                <h1>Individuo</h1>
                                <input class="form-control form-control-sm" type="text" value="insertar" name="accion" id="accion" style="display: none;">
                                <!-- Botón para avanzar a la siguiente sección -->
                                <button type="button" id="incluir" class="btn btn-primary">Guardar</button>

                            </div>

                            <!-- Sección para Organización -->
                            <div class="container-form" id="organizacionSection" style="display: none;">
                                <!-- Aquí coloca los campos para Organización -->
                                <h1>Organización</h1>
                                <!-- Botón para avanzar a la siguiente sección -->
                                <button type="button" id="siguienteOrganizacion" class="btn btn-primary">Siguiente</button>
                            </div>

                            <!-- Sección para bootnes -->
                            <div class="botonera" id="botonera">
                                <!-- Botón para volver a la sección anterior -->
                                <button type="button" id="atras" class="btn btn-primary" style="display: none;">Volver</button>
                                <!-- Botón para avanzar a la siguiente sección -->
                                <div class="formulario__boton">
                                    <button type="button" id="siguiente" class="btn btn-primary">Siguiente</button>
                                </div>
                            </div>






                        </div>
                    </div>
                </div>
                <br>

            </div>



        </main>

        <footer class="footer">
            <div class="container container-footer">
                <div class="menu-footer">
                    <div class="contact-info">
                        <p class="title-footer">Información de Contacto</p>
                        <ul>
                            <li>
                                Dirección: 71 Pennington Lane Vernon Rockville, CT
                                06066
                            </li>
                            <li>Teléfono: 123-456-7890</li>
                            <li>Fax: 55555300</li>
                            <li>EmaiL: baristas@support.com</li>
                        </ul>
                    </div>

                    <div class="information">
                        <p class="title-footer">Información</p>
                        <ul>
                            <li><a href="#">Acerca de Nosotros</a></li>
                            <li><a href="#">Información Delivery</a></li>
                            <li><a href="#">Politicas de Privacidad</a></li>
                            <li><a href="#">Términos y condiciones</a></li>
                            <li><a href="#">Contactános</a></li>
                        </ul>
                    </div>

                </div>

                <div class="copyright">
                    <p>
                        Desarrollado por Programación para el mundo &copy; 2022
                    </p>

                </div>
            </div>
        </footer>
    </body>

    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/personas.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/sweetalert.min.js"></script>


    <script>
        barras = document.querySelector(".barras");
        nav = document.querySelector("nav");
        barras.onclick = function() {
            nav.classList.toggle("active");
        }
    </script>

</html>
</body>

</html>