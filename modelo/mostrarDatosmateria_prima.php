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
                                <th scope="col">Indentificación</th>
                                <th scope="col">Nombre (empresa/persona)</th>
                                <th scope="col">Quintales</th>
                                <th scope="col">Fecha Compra</th>
                                <th scope="col">Modificar/borrar</th>
                            </tr>
                     </thead>
                     <tbody>';
    $datosTablamateria_prima="";
    foreach ($datos as $key => $value){
        $a = $value['idcompra'];
        $datosTablamateria_prima=$datosTablamateria_prima.'  
                            <tr style="cursor:pointer">
                                <td>'.$value['datos_prov_identificacion'].'</td>
                                <td>'.$value['nombre_prov'].'</td>
                                <td>'.$value['total_cantidad'].'</td>
                                <td>'.$value['fecha_compra'].'</td>
                                <td>                              
                                <a id="modificar" class="btn btn-success btn" data-toggle="modal" data-target="#Modalmateria_prima" data-id="'.$value['idcompra'].'"onclick="modificarDatos('.$value['idcompra'].')"><i class="fa-solid fa-user-pen"></i></a>
                                <a class="btn btn-danger id="eliminar" btn" data-id="'.$value['idcompra'].'" onclick="borrarmateria_prima('.$value['idcompra'].')"><i class="fa-solid fa-user-xmark"></i></a>
                                </td>
                                
                               
                                
                            </tr>';

    }
    echo $tablamateria_prima.$datosTablamateria_prima.'</tbody></table>';
?>

