<?php
if (!is_file("../modelo/proveedor.php")) {
    echo "Falta definir la clase proveedor";
    exit;
}

require_once("../modelo/proveedor.php");
$obj = new Registroproveedor();
$datos1 = $obj->mostrarproveedor();

$tablaproveedor = '<table class="table table-striped table-hover" id="tproveedor">
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
$datosTablaproveedor = "";
foreach ($datos1 as $key => $value) {
    $a = $value['id_prov'];
    $datosTablaproveedor .= '  
                            <tr style="cursor:pointer">
                                <td>' . $value['id_prov'] . '</td>
                                <td>' . $value['identificacion'] . '</td>
                                <td>' . $value['nombre_prov'] . '</td>
                                <td>' . $value['ubicacion'] . '</td>
                                <td>' . $value['nombre_finca'] . '</td>
                                <td>                              
                                <a id="modificar" class="btn btn-success btn" data-id="' . $value['id_prov'] . '" onclick="modificarDatos(' . $value['id_prov'] . ')"><span class="icon-pencil"></span></a>
                                <a class="btn btn-danger" id="eliminar" btn" data-id="' . $value['id_prov'] . '" onclick="borrarproveedor(' . $value['id_prov'] . ')"><span class="icon-trashcan"></span></a>
                                </td>
                            </tr>';
}

echo $tablaproveedor . $datosTablaproveedor . '</tbody></table>';

$datos2 = $obj->mostrartodo();


/*
$tablaproveedor2 = '<table class="table table-striped table-hover" id="tproveedor2" hidden>
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
if($datos_json==!null){
$datosTablaproveedor2 = "";
foreach ($datos2 as $key => $value) {
    $a2 = $value["id_prov"];
    $datosTablaproveedor2 .= '  
                            <tr style="cursor:pointer">
                                <td>' . $value['id_prov'] . '</td>
                                <td>' . $value['identificacion'] . '</td>
                                <td>' . $value['nombre_prov'] . '</td>
                                <td>' . $value['ubicacion'] . '</td>
                                <td>' . $value['nombre_finca'] . '</td>
                                <td>                              
                                <a id="modificar" class="btn btn-success btn" data-id="' . $value['id_prov'] . '" onclick="modificarDatos(' . $value['id_prov'] . ')"><span class="icon-pencil"></span></a>
                                <a class="btn btn-danger" id="eliminar" btn" data-id="' . $value['id_prov'] . '" onclick="borrarproveedor(' . $value['id_prov'] . ')"><span class="icon-trashcan"></span></a>
                                </td>
                            </tr>';
}

echo $tablaproveedor2 . $datosTablaproveedor2 . '</tbody></table>';}
else echo "No hay datos ERROR";
 */