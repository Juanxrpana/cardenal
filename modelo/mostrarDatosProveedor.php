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
                             <tr id="tr">
                                <th scope="col">RIF</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Ciudad</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Modificar/Eliminar</th>
                            </tr>
                     </thead>
                     <tbody>';
    $datosTablaproveedor="";
    foreach ($datos as $key => $value){
        $a = $value['id_proveedor'];
        $datosTablaproveedor=$datosTablaproveedor.'  
                            <tr style="cursor:pointer">
                                
                                <td>'.$value['rif'].'</td>
                                <td>'.$value['nombre'].'</td>
                                <td>'.$value['ciudad'].'</td>
                                <td>'.$value['telefono'].'</td>
                                <td>                              
                                <a id="modify" class="btn btn-success btn-sm" data-toggle="modal" data-target="#Modalproveedor" data-id="'.$value['rif'].'"onclick="modificarDatos('.$value['rif'].')"><i class="fa-solid fa-user-pen"></i></a>
                                <a class="btn btn-danger btn-sm borrar" id="borrar" btn-sm" data-rif="'.$value['rif'].'" "><i class="fa-solid fa-user-xmark"></i></a>
                                </td>
                                
                               
                                
                            </tr>';

    }
    echo $tablaproveedor.$datosTablaproveedor.'</tbody></table>';
?>

