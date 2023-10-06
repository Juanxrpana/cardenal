<?php

if (!is_file("modelo/".$pagina.".php")){
    //alli pregunte que si no es archivo se niega //con !
    //si no existe envio mensaje y me salgo
    echo "Falta definir la clase ".$pagina;
    exit;
}
require_once("modelo/" . $pagina . ".php");
if (is_file("vista/" . $pagina . ".php")) {
    // Bien, si estamos aquí es porque existe la vista y la clase
    // Por lo que lo primero que debemos hacer es realizar una instancia de la clase
    $o = new RegistroPersonas(); // Ahora nuestro objeto se llama $o y es una copia en memoria de la clase RegistroPersonas

    if (!empty($_POST)) {
        $accion = $_POST['accion'];
        
     
        
        // Como ya sabemos si estamos aquí es porque se recibió alguna información
        // de la vista, por lo que lo primero que debemos hacer ahora que tenemos una
        // clase es guardar esos valores en ella con los métodos set

        
           /*  $o->set_id_persona($_POST['id_persona']);
            $o->set_nombre($_POST['nombre']);
            $o->set_nombre1($_POST['nombre1']);
            $o->set_apellido($_POST['apellido']);
            $o->set_apellido($_POST['apellido']);
            $o->set_telefono($_POST['telefono']);
            $o->set_rif($_POST['rif']);
            $o->set_tipo_cliente_id($_POST['tipo_cliente_id']);
            echo $o->agregarPersona(); */

            
        switch($accion){

            case 'agregarPersona':
                $o->set_id_persona($_POST['id_persona']);
                $o->set_nombre($_POST['nombre']);
                $o->set_nombre1($_POST['nombre1']);
                $o->set_apellido($_POST['apellido']);
                $o->set_apellido($_POST['apellido']);
                $o->set_telefono($_POST['telefono']);
                $o->set_rif($_POST['rif']);
                $o->set_tipo_cliente_id($_POST['tipo_cliente_id']);
                echo $o->agregarPersona();

                $resultado = $o->agregarPersona();
                if ($resultado) {
                    echo json_encode(['success' => true, 'message' => 'Persona agregada exitosamente.']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Error al agregar persona.']);
                }
                break;
                
            case 'eliminarPersona':

                $o->set_id_persona($_POST['id_persona']);
                echo  $o->eliminarPersona();
            
            default:
                // Manejar acciones desconocidas
                echo json_encode(['success' => false, 'message' => 'Acción desconocida.']);
                break;


        }
           exit; 
        }
        require_once("vista/".$pagina.".php");
    }
   
?>