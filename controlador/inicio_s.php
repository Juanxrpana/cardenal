<?php

  //verifica que exista la vista de
  //la pagina

    if (!is_file("modelo/".$pagina.".php")){
      //alli pregunte que si no es archivo se niega //con !
      //si no existe envio mensaje y me salgo
      echo "Falta definir la clase ".$pagina;
      exit;
    }
    require_once("modelo/".$pagina.".php");


    if(is_file("vista/".$pagina.".php")){ 
    if(!empty($_POST)){
      
$accion = $_POST['accion'];
        
      $o = new inicio();
      $o->set_usuario($_POST['usuario']);
      $o->set_clave($_POST['contra']);

       $resultado_busqueda = $o->busca();
      if ($resultado_busqueda == "¡Error en los datos ingresados!") {
        $mensaje = "Usuario o clave inválida";
       }
        
        else{
          session_start();
          $_SESSION['id_usuario'] = $_POST['usuario'];
          
          // Obtiene el cargo del usuario
          $cargo_usuario = $o->busca_cargo();
          if ( $cargo_usuario == "1" ||  $cargo_usuario == "2") {
                $_SESSION['nivel'] = $cargo_usuario;
                echo $_SESSION['id_usuario'];
                echo  $_SESSION['nivel'];
                header("Location: .?pagina=inicio");
                exit;
              }
                else{
                  $mensaje="Faltan permisos";
                }
        }
      
      
      


      
      

     





      /* $mensaje = $o-> $arrayEmpleado[0][0];
      $cedulaEmpleado = $arrayEmpleado[0][1];
      
      if($mensaje == "exito"){
      session_start();
      $_SESSION['nivel'] = $mensaje;

      header("Location: .?pagina=inicio");
      }
      else{
        $mensaje = "Usuario o clave invalida";
      } */
      
    }
    
    require_once("vista/".$pagina.".php"); 
  }
  else{
	  echo "pagina en construccion";
  }
?>