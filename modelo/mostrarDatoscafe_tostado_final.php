<?php

    
    if (!is_file("../modelo/cafe_tostado.php")){

        echo "Falta definir la clase cafe_tostado";
        exit;
    }

    require_once ("../modelo/cafe_tostado.php");
    $obj= new Registrocafe_tostado();
    $datos=$obj->mostrarcafe_tostado();

    $tablacafe_tostado='<table class="table table-striped table-hover" id="tcafe_tostado">
                     <thead>
                             <tr>
                                <th scope="col">Indentificación</th>
                                <th scope="col">Quintales</th>
                                <th scope="col">Fecha de Tostado</th>
                                <th scope="col">Tipo de Molido</th>
                                <th scope="col">Tipo de Tostado</th>
                                <th scope="col">Finalizar</th>
                            </tr>
                     </thead>
                     <tbody>';
    $datosTablacafe_tostado="";
    foreach ($datos as $key => $value){
        $a = $value['idcafe_tostado'];
        $datosTablacafe_tostado=$datosTablacafe_tostado.'  
                            <tr style="cursor:pointer">
                                <td>'.$value['idcafe_tostado'].'</td>
                                <td>'.$value['cantidad'].'</td>
                                <td>'.$value['fecha_tostado'].'</td>
                                <td>'.$value['nivel_molido'].'</td>
                                <td>'.$value['nivel_tostado'].'</td>
                                <td>                              
                                <a id="finalizar" class="btn btn-success btn" data-toggle="modal" data-target="#Modalcafe_tostado" data-id="'.$value['idcafe_tostado'].'"onclick="finalizarDatos('.$value['idcafe_tostado'].')"><i class="fa-solid fa-check"></i></a>
                                </td>
                                
                               
                                
                            </tr>';

    }
    echo $tablacafe_tostado.$datosTablacafe_tostado.'</tbody></table>';
?>

