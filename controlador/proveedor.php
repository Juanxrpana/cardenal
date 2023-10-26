<?php
  
//llamda al archivo que contiene la clase
//usuarios, en ella estara el codigo que me premitira
//guardar, consultar y modificar dentro de mi base de datos
require_once('modelo/proveedor.php');

//lo primero que se debe hacer es verificar al igual que en la vista que exista el archivo
if (!is_file("modelo/".$pagina.".php")){
	//alli pregunte que si no es archivo se niega con !
	//si no existe envio mensaje y me salgo
	echo "Falta definir la clase ".$pagina;
	exit;
}  
  
  if(is_file("vista/".$pagina.".php")){
	  
	  //bien si estamos aca es porque existe la vista y la clase
	  //por lo que lo primero que debemos hace es realizar una instancia de la clase
	  //instanciar es crear una variable local, que contiene los metodos de la clase
	  //para poderlos usar
	  
	  $o = new Registroproveedor(); //ahora nuestro objeto se llama $o y es una copia en memoria de la
	  //clase usuarios
	  
	  if(isset($_POST['accion'])){
		  
		  //como ya sabemos si estamos aca es porque se recibio alguna informacion
		  //de la vista, por lo que lo primero que debemos hacer ahora que tenemos una 
		  //clase es guardar esos valores en ella con los metodos set

		$accion = $_POST['accion'];


		  if($accion=='mostrarproveedor'){
			echo  $o->mostrarproveedor($_POST['rif']);
			exit;
		  }
		  $o->set_id_proveedor($_POST['id_proveedor']);
		  $o->set_rif($_POST['rif']);
		  $o->set_nombre($_POST['nombre']);
		  $o->set_estado($_POST['estado']);
		  $o->set_municipio($_POST['municipio']);
		  $o->set_parroquia($_POST['parroquia']);
		  $o->set_direccion($_POST['direccion']);
		  $o->set_telefono($_POST['telefono']);
		  
		  if($accion=='incluir'){
			echo  $o->agregarproveedor();
		  }

		  elseif($accion=='modificarproveedor'){
			echo  $o->modificarproveedor();
			
		  }
		  elseif($accion=='eliminarproveedor'){
			echo  $o->eliminarproveedor();
			
		  }
		  exit;
	  }
	  
	  require_once("vista/".$pagina.".php"); 
  }
  else{
	  echo "pagina en construccion";
  }
?>

