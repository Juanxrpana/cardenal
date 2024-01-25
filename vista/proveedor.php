<?php require_once './comunes/menu.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/inicio.css">
    <link rel="stylesheet" href="./CSS/bootstrap.css">
    <link rel="stylesheet" href="./CSS/formularios_registro_proveedor.css">
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" href="./CSS/datatables.min.css">

    <title>Proveedores</title>
</head>

<body>
<div class="todo">
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
                <input type="text" name="accion" id="accion" style="display:none" />
                <!-- Grupo: identificacion -->
                <div class="formulario__grupo" id="grupo__identificacion">
                    <label for="identificacion" class="formulario__label">Identificacion</label>
                    <div class="formulario__grupo-input">
                        <select name="cedula_fiscal_id" id="cedula_fiscal_id">
                            <option value="0">V</option>
                        </select>
                        <span></span>
                        <input type="text" class="formulario__input" name="identificacion" id="identificacion" placeholder="29873456">
                        <span></span>
                    </div>

                </div>

                <!-- Grupo: Teléfono -->
                <div class="formulario__grupo" id="grupo__telefono">
                    <label for="telefono" class="formulario__label">Teléfono</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" name="telefono" id="telefono" placeholder="04142648727">
                        <span></span>
                    </div>
                </div>

                <!-- Grupo: Nombre_prov -->
                <div class="formulario__grupo" id="grupo__nombre_prov">
                    <label for="nombre_prov" class="formulario__label">Empresa /Nombre y Apellido del Proveedor</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" name="nombre_prov" id="nombre_prov" placeholder="Cafe Cardenal C.A.">
                        <span></span>
                    </div>
                </div>

                <!-- Grupo: Nombre_finca -->
                <div class="formulario__grupo" id="grupo__nombre_finca">
                    <label for="nombre_finca" class="formulario__label">Nombre de la finca</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" name="nombre_finca" id="nombre_finca" placeholder="Finca Jose Gregorio">
                        <span></span>
                    </div>
                </div>

                <!-- Grupo: direccion -->
                <div class="formulario__grupo" id="grupo__direccion">
                    <label for="direccion" class="formulario__label">Dirección</label>
                    <div class="formulario__grupo-select">
                        <input type="text" class="formulario__input" name="estado" id="estado" placeholder="estado">
                        <span></span>
                        <input type="text" class="formulario__input" name="municipio" id="municipio" placeholder="municipio">
                        <span></span>
                        <input type="text" class="formulario__input" name="parroquia" id="parroquia" placeholder="parroquia">
                        <span></span>
                        <input type="text" class="formulario__input" name="ciudad" id="ciudad" placeholder="ciudad">
                        <span></span>
                    </div>

                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" name="ubicacion" id="ubicacion" placeholder="Detalles de ubicacion">
                        <span></span>
                    </div>
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
 </div>    
    <script src="./js/jquery-3.7.1.min.js"></script>
    <script src="./js/datatables.js"></script>
    <script src="./js/bootstrap.bundle.js"></script>
    <script src="./js/proveedor.js"></script>
    <script src="./js/sweetalert2.js"></script>

</body>

</html>