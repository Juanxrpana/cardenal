<html lang="en">

<head>
  <?php
  // require_once("comunes/encabezado.php");

  ?>
  <meta charset="utf-8">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./CSS/bootstrap.min.css">
  <link rel="stylesheet" href="./CSS/inicio.css">
  <link rel="stylesheet" href="./CSS/consulta.css">
  <link rel="stylesheet" href="./CSS/style.css">
  <link rel="stylesheet" href="./CSS/login.css">

  <title>Iniciar Sesión</title>


  <meta name="theme-color" content="#563d7c">


  <style>
    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>

  <!-- Custom styles for this template -->
  <link href="css/signin.css" rel="stylesheet">
</head>



<body class="text-center">
  <div class="container" style="max-width: 900px;
">
    <div class="row">
      <div class="col" style="margin: 49px;margin-top: 16%;">
        <img src="img/logo1.png" alt="logo" style="width: 225px;height: 200px;">

        <h1>
          <hr>TRADICION Y CALIDAD
        </h1>

      </div>
      <div class="col" style="padding-top: 6%;">

        <form class="form-signin" method="post" action="" id="f">
          <input type="text" name="accion_inicio_sesion" style="display:none">

          <h1 class="h3 mb-3 font-weight-normal">Acceso al sistema</h1>


          <div id="mensajes" style="display:none">
            <?php
            if (!empty($mensaje)) {
              echo $mensaje;
            }
            ?>
          </div>

          <div class="form-group row" style="margin-top: 150px;">
            <label for="usuario">Ingresar Cedula</label>
            <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Formato V-12345678" autofocus>
          </div>
          <div class="form-group row">
            <label for="contra" class="">Contraseña</label>
            <input type="password" id="contra" name="contra" class="form-control" placeholder="Contraseña" title="Solo letras y/o numeros y/o *- - entre 6 y 12 caracteres">
            <span></span>
          </div>
          <hr>

          
          <button class=" btn-block" id="iniciar"><span>Ingresar</span></button>

        </form>

        <button class=" btn-block" id="registrarse" data-toggle="modal" data-target="#registro"><span>Registrarse</span></button>



      </div>

      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Launch demo modal
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                ...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>



      <!-- Modal de Registro -->
      <div class="modal fade" id="registro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Formulario de Registro</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- Aquí irá el formulario -->
              <form id="formularioRegistro">
                <div class="form-group">
                  <label for="cedula">Cédula</label>
                  <input type="number" class="form-control" id="cedula" name="cedula">
                </div>
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre">
                </div>
                <div class="form-group">
                  <label for="apellido">Apellido</label>
                  <input type="text" class="form-control" id="apellido" name="apellido">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                  <label for="pregunta">Pregunta de Seguridad</label>
                  <select class="form-control" id="pregunta" name="pregunta">
                    <!-- Este select se llenará con JavaScript -->
                  </select>
                </div>
                <div class="form-group">
                  <label for="respuesta">Respuesta de Seguridad</label>
                  <input type="text" class="form-control" id="respuesta" name="respuesta">
                </div>
                <button type="submit" class="btn btn-primary">Registrarse</button>
              </form>
            </div>
          </div>
        </div>
      </div>
            <!-- modal error -->
      <div class="container" style="display: contents" id="modal1">
        <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">

                <div id="cabezerademodal">
                </div>
              </div>
              <div class="modal-body">
                <h4 style="color: black;">Usuario o contraseña incorrecta</h4>
                <div id="contenidodemodal">
                </div>
              </div>
              <div class="modal-footer">
                <a href="#" data-dismiss="modal" class="btn btn-primary">
                  <span class="glyphicon glyphicon-home"></span>
                  Cerrar</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <script src="./js/jquery-3.7.0.js"></script>
  <script src="./js/bootstrap.min.js"></script>
  <script src="./js/sweetalert2.js"></script>
</body>

<script src="./js/inicio_sesion.js"></script>

</html>