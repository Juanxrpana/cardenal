<?php require_once './comunes/menu.php';
?>
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

        <div class="main--content">
        <div class="header--wrapper">
            <div class="header--titulo" id="hola">
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
            <form method="POST" class="formulario" id="formulario">
            <input type="text" name="accion" id="accion" style="display:none"/>
                <!-- Grupo: identificacion -->
                <div class="formulario__grupo" id="grupo__identificacion">
                    <label for="identificacion" class="formulario__label">Identificacion</label>
                    <div class="formulario__grupo-input">
                        <select name="cedula_fiscal_id" id="cedula_fiscal_id">
                            <option value="0">V</option>
                        </select>
                        <input type="text" class="formulario__input" name="identificacion" id="identificacion" placeholder="123456789">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">la identificación</p>
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

                <!-- Grupo: Nombre_prov -->
                <div class="formulario__grupo" id="grupo__nombre_prov">
                    <label for="nombre_prov" class="formulario__label">Empresa /Nombre y Apellido del Proveedor</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" name="nombre_prov" id="nombre_prov" placeholder="Cafe Cardenal C.A.">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">Este campo debe contener al menos 6 caracteres</p>
                </div>

                <!-- Grupo: Nombre_finca -->
                <div class="formulario__grupo" id="grupo__nombre_finca">
                    <label for="nombre_finca" class="formulario__label">Nombre de la finca</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" name="nombre_finca" id="nombre_finca" placeholder="Finca Jose Gregorio">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">El nombre_finca debe contener al menos 6 caracteres</p>
                </div>

                <!-- Grupo: coordenadas -->
                <div class="formulario__grupo" id="grupo__coordenadas">
                    <label for="coordenadas" class="formulario__label">Coordenadas de la finca</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" name="coordenadas" id="coordenadas" placeholder="Coordenadas UTM 29T 548929 4801142">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">El nombre_finca debe contener al menos 6 caracteres</p>
                </div>

                

                <!-- Grupo: direccion -->
                <div class="formulario__grupo" id="grupo__direccion">
                    <label for="direccion" class="formulario__label">Dirección</label>
                    <div class="formulario__grupo-select">
                        <input type="text" class="formulario__input" name="estado" id="estado" placeholder="estado">
                        <input type="text" class="formulario__input" name="municipio" id="municipio" placeholder="municipio">
                        <input type="text" class="formulario__input" name="parroquia" id="parroquia" placeholder="parroquia">
                        <input type="text" class="formulario__input" name="ciudad" id="ciudad" placeholder="ciudad">
                    </div>

                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" name="ubicacion" id="ubicacion" placeholder="Detalles de ubicacion">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">La dirección debe tener alguna referencia de la zona del cliente</p>
                </div>


                <div class="formulario__mensaje" id="formulario__mensaje">
                    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                </div>

                <div class="formulario__grupo formulario__grupo-btn-enviar">
                <button type="button" class="btn btn-dark" id="incluir" name="incluir">INCLUIR</button>
                    <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
                </div>
            </form>



            <br>
            <div class="Proveedor" id="Proveedor">
            <span>Lista Proveedores</span>
            <div class="tablaDatosProveedor" id="tablaDatosProveedor"></div>
        </div>


        </div>
        
    </div>
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/proveedor.js"></script>
    <script src="./js/sweetalert2.js"></script>
</body>

</html>