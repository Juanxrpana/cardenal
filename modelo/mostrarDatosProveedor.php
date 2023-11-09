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
                                <th scope="col">ID</th>
                                <th scope="col">Identificación</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Ubicación</th>
                                <th scope="col">Finca</th>
                                <th scope="col">Modificar/borrar</th>
                            </tr>
                     </thead>
                     <tbody>';
    $datosTablaproveedor="";
    foreach ($datos as $key => $value){
        $a = $value['id_prov'];
        $datosTablaproveedor=$datosTablaproveedor.'  
                            <tr style="cursor:pointer">
                                <td>'.$value['id_prov'].'</td>
                                <td>'.$value['identificacion'].'</td>
                                <td>'.$value['nombre_prov'].'</td>
                                <td>'.$value['ubicacion'].'</td>
                                <td>'.$value['nombre_finca'].'</td>
                                <td>                              
                                <a id="modificar" class="btn btn-success btn" data-id="'.$value['id_prov'].'"onclick="modificarDatos('.$value['id_prov'].')"><i class="fa-solid fa-user-pen"></i></a>
                                <a class="btn btn-danger id="eliminar" btn" data-id="'.$value['id_prov'].'" onclick="borrarproveedor('.$value['id_prov'].')"><i class="fa-solid fa-user-xmark"></i></a>
                                </td>
                                
                               
                                
                            </tr>';

    }
    echo $tablaproveedor.$datosTablaproveedor.'</tbody></table>';
?>

