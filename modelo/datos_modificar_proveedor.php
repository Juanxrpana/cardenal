<?php

    
    if (!is_file("../modelo/proveedor.php")){

        echo "Falta definir la clase proveedor";
        exit;
    }

    require_once ("../modelo/proveedor.php");
    $obj= new Registroproveedor();
    
    $datos=$obj->mostrartodo();
   


    
    echo $datos;
 
?>
