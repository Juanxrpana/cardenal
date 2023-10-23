<?php

    
    if (!is_file("../modelo/proveedor.php")){

        echo "Falta definir la clase proveedor";
        exit;
    }

    require_once ("../modelo/proveedor.php");
    $obj= new Registroproveedor();
    $datos=$obj->mostrarproveedor();

    $tablaproveedor='<table class="table table-striped table-hover" id="tproveedor">
                     <thead>
                             <tr>
                                <th scope="col">rif</th>
                                <th scope="col">nombre</th>
                                <th scope="col">ciudad</th>
                                <th scope="col">telefono</th>
                                <th scope="col">Modificar/Eliminar</th>
                            </tr>
                     </thead>
                     <tbody>';
    $datosTablaproveedor="";
    foreach ($datos as $key => $value){
        $a = $value['id_proveedor'];
        $datosTablaproveedor=$datosTablaproveedor.'  
                            <tr style="cursor:pointer">
                                <td>****</td>
                                <td>'.$value['rif'].'</td>
                                <td>'.$value['nombre'].' '.$value['apellido'].'</td>
                                <td>'.$value['ciudad'].'</td>
                                <td>'.$value['telefono'].'</td>
                                <td>                              
                                <a id="modify" class="btn btn-success btn-sm" data-toggle="modal" data-target="#Modalproveedor" data-id="'.$value['id_proveedor'].'"onclick="modificarDatos('.$value['id_proveedor'].')"><i class="fa-solid fa-user-pen"></i></a>
                                <a class="btn btn-danger id="eliminar" btn-sm" data-id="'.$value['id_proveedor'].'" onclick="eliminarproveedor('.$value['id_proveedor'].')"><i class="fa-solid fa-user-xmark"></i></a>
                                </td>
                                
                               
                                
                            </tr>';

    }
    echo $tablaproveedor.$datosTablaproveedor.'</tbody></table>';
?>

