<?php

    
    if (!is_file("../modelo/persona.php")){

        echo "Falta definir la clase personas";
        exit;
    }

    require_once ("../modelo/persona.php");
    $obj= new RegistroPersonas();
    $datos=$obj->mostrarPersonas();

    $tablapersonas='<table class="table table-striped table-hover" id="tpersonas">
                     <thead>
                             <tr>
                                <th scope="col">N° Cliente</th>
                                <th scope="col">Cédula</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Organización</th>
                                <th scope="col">Modificar/borrar</th>
                            </tr>
                     </thead>
                     <tbody>';
    $datosTablapersonas="";
    foreach ($datos as $key => $value){
        $a = $value['id_persona'];
        $datosTablapersonas=$datosTablapersonas.'  
                            <tr style="cursor:pointer">
                                <td>****</td>
                                <td>'.$value['id_persona'].'</td>
                                <td>'.$value['nombre'].' '.$value['apellido'].'</td>
                                <td>'.$value['telefono'].'</td>
                                <td>'.$value['organizacion'].'</td>
                                <td>                              
                                <a id="modify" class="btn btn-success btn-sm" data-toggle="modal" data-target="#ModalPersona" data-id="'.$value['id_persona'].'"onclick="modificarDatos('.$value['id_persona'].')"><i class="fa-solid fa-user-pen"></i></a>
                                <a class="btn btn-danger id="borrar" btn-sm" data-id="'.$value['id_persona'].'" onclick="borrarPersona('.$value['id_persona'].')"><i class="fa-solid fa-user-xmark"></i></a>
                                </td>
                                
                               
                                
                            </tr>
                            <a href="logout.php">Cerrar Sesión</a>';

    }
    echo $tablapersonas.$datosTablapersonas.'</tbody></table>';
?>

