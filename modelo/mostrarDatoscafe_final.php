<?php

    
    if (!is_file("../modelo/cafe_final.php")){

        echo "Falta definir la clase cafe_final";
        exit;
    }

    require_once ("../modelo/cafe_final.php");
    $obj= new Registrocafe_final();
    $datos=$obj->mostrarcafe_final();

    $tablacafe_final='<table class="table table-striped table-hover" id="tcafe_final">
                     <thead>
                             <tr>
                                <th scope="col">Indentificación</th>
                                <th scope="col">Identificación café final</th>
                                <th scope="col">Cantidad de paquetes</th>
                                <th scope="col">Fecha de empaque</th>
                                <th scope="col">Identificacion bulto</th>
                                <th scope="col">estado</th>
                                <th scope="col">Modificar/Eliminar</th>
                            </tr>
                     </thead>
                     <tbody>';
    $datosTablacafe_final="";
    foreach ($datos as $key => $value){
        $a = $value['idcafe_final'];
        $datosTablacafe_final=$datosTablacafe_final.'  
                            <tr style="cursor:pointer">
                                <td>'.$value['id_cafe_final'].'</td>
                                <td>'.$value['idcafe_final'].'</td>
                                <td>'.$value['cantidad_paquetes'].'</td>
                                <td>'.$value['fecha_empaquetado'].'</td>
                                <td>'.$value['id_bulto'].'</td>
                                <td>'.$value['estado'].'</td>
                                <td>                              
                                <a id="modificar" class="btn btn-success btn" data-toggle="modal" data-target="#Modalcafe_final" data-id="'.$value['idcafe_final'].'"onclick="modificarDatos('.$value['idcafe_final'].')"><i class="fa-solid fa-user-pen"></i></a>
                                <a class="btn btn-danger id="eliminar" btn" data-id="'.$value['idcafe_final'].'" onclick="borrarcafe_final('.$value['idcafe_final'].')"><i class="fa-solid fa-user-xmark"></i></a>
                                </td>
                                
                               
                                
                            </tr>';

    }
    echo $tablacafe_final.$datosTablacafe_final.'</tbody></table>';
?>

