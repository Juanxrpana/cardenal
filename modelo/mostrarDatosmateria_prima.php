<?php

    
    if (!is_file("../modelo/materia_prima.php")){

        echo "Falta definir la clase materia_prima";
        exit;
    }

    require_once ("../modelo/materia_prima.php");
    $obj= new Registromateria_prima();
    $datos=$obj->mostrarmateria_prima();

    $tablamateria_prima='<table class="table table-striped table-hover" id="tmateria_prima">
                     <thead>
                             <tr>
                                <th scope="col">rif</th>
                                <th scope="col">nombre</th>
                                <th scope="col">ciudad</th>
                                <th scope="col">telefono</th>
                                <th scope="col">Modificar/borrar</th>
                            </tr>
                     </thead>
                     <tbody>';
    $datosTablamateria_prima="";
    foreach ($datos as $key => $value){
        $a = $value['id_materia_prima'];
        $datosTablamateria_prima=$datosTablamateria_prima.'  
                            <tr style="cursor:pointer">
                                <td>****</td>
                                <td>'.$value['rif'].'</td>
                                <td>'.$value['nombre'].'</td>
                                <td>'.$value['ciudad'].'</td>
                                <td>'.$value['telefono'].'</td>
                                <td>                              
                                <a id="modify" class="btn btn-success btn-sm" data-toggle="modal" data-target="#Modalmateria_prima" data-id="'.$value['id_materia_prima'].'"onclick="modificarDatos('.$value['id_materia_prima'].')"><i class="fa-solid fa-user-pen"></i></a>
                                <a class="btn btn-danger id="borrar" btn-sm" data-id="'.$value['id_materia_prima'].'" onclick="borrarmateria_prima('.$value['id_materia_prima'].')"><i class="fa-solid fa-user-xmark"></i></a>
                                </td>
                                
                               
                                
                            </tr>';

    }
    echo $tablamateria_prima.$datosTablamateria_prima.'</tbody></table>';
?>

