<?php

    
    if (!is_file("../modelo/materia_prima.php")){

        echo "Falta definir la clase materia_prima";
        exit;
    }

    require_once ("../modelo/materia_prima.php");
    $obj= new Registromateria_prima();
    $obj->contador_total_materia_prima();
    $datos=$obj->mostrar_contador();


    
    echo "contador de materia prima: ".$datos. "/2.000 QUINTALES";
 
?>


