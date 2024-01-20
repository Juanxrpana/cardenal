<html lang="en">
  <head>
    <?php
       // require_once("comunes/encabezado.php");
        
    ?>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/inicio.css">
    <link rel="stylesheet" href="./CSS/bootstrap.css">
    <link rel="stylesheet" href="./CSS/consulta.css">
    <link rel="stylesheet" href="./CSS/theme.css">
    <link rel="stylesheet" href="./CSS/style.css">
    <script src="https://kit.fontawesome.com/ecd5745f4f.js" crossorigin="anonymous"></script>
    
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
" >
          <div class="row">
            <div class="col" style="margin: 49px;margin-top: 16%;" >
              <img src="img/logo1.png" alt="logo" style="width: 225px;height: 200px;">
              
              <h1><hr>TRADICION Y CALIDAD</h1>
            
            </div>
            <div class="col" style="padding-top: 6%;">

          <form class="form-signin" method="post" action="" id="f">
            <input type="text" name="accion_inicio_sesion" style="display:none">

            <h1 class="h3 mb-3 font-weight-normal">Acceso al sistema</h1>


            <div id="mensajes" style="display:none">
          <?php
            if(!empty($mensaje)){
              echo $mensaje;
            }
          ?>  
          </div>

            <div class="form-group row" style="margin-top: 150px;">
            <label for="usuario" >Ingresar Cedula</label>
            <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Formato V-12345678" 
              required 
              
             autofocus>
          </div>
          <div class="form-group row">
            <label for="contra" class="">Contraseña</label>
            <input type="password" id="contra" name="contra" class="form-control" placeholder="Contraseña" 
                required 
               title="Solo letras y/o numeros y/o *- - entre 6 y 12 caracteres"


            >
            <span></span>
          </div>


            <button class="btn btn-lg btn-primary btn-block" id="iniciar">Ingresar</button>
           
          </form>

           



            <div class="container" style="display: contents" id="modal1">    
              <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                 <div class="modal-dialog">
                   <div class="modal-content">
                   <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="modalcerrar">&times;</button>
                          <div id="cabezerademodal">
                    </div>
                   </div>
                   <div class="modal-body">
                          <h4>Resultado</h4>
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
    <script src="./js/bootstrap.bundle.js"></script>
        <script src="./js/jquery-3.6.0.min.js"></script>
      
        <script src="./js/sweetalert2.js"></script>
  </body>

  <script src="./js/inicio_sesion.js"></script>
</html>
  