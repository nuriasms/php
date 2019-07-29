<?php
    session_start();
	require ('funciones.php');

	//Inicializa variables
    $usuario = $contrasena = $contrasena2 = $envio = $correo = $nacimiento = $id = "";

    $estat = true;
    $resposta = ' ';

    if( isset($_REQUEST['usuario']) && isset($_REQUEST['nacimiento']) && isset($_REQUEST['correo']) && isset($_REQUEST['contrasena']) && isset($_REQUEST['contrasena2'])) {
        if( !empty($_REQUEST["usuario"]) ) {

            $usuario = test_input($_REQUEST["usuario"]);
			// comprueba que lleva solo letras y espacios
			if (!preg_match("/^[0-9a-zA-Z áéíóúÁÉÍÓÚÑñàèòÀÈÒçÇ·\-]*$/",$usuario)) { 
                   
                $estat = false;
				$resposta .= "Solo admite letras y espacios en blanco";
                
            }
            
        } else {
            
            $estat = false;
            $resposta .= 'Nombre usuario obligatorio';
            
        }

        if( !empty($_REQUEST["nacimiento"]) ) {

            $edad = calculaEdad($_REQUEST["nacimiento"]);
			if ($edad < 18){

                $estat = false;
                $resposta .= 'Debe ser mayor de edad';
                
            }
			else{

				$nacimiento = $_REQUEST["nacimiento"];
                
            }
            
        } else {
            
            $estat = false;
            $resposta .= 'Fecha nacimiento obligatorio';
            
        }

        if( !empty($_REQUEST["correo"]) ) {

             $correo = test_input($_REQUEST["correo"]);
			// Comprueba que el formato es correcto
			if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) { 
				
                $estat = false;
                $resposta .= 'Formato de correo erróneo';
                
            }
            
        } else {
            
            $estat = false;
            $resposta .= 'Correo obligatorio';
            
        }

        if( !empty($_REQUEST["contrasena"]) ) {

            $tmp = validarContrasena($_REQUEST['contrasena']);
			if (!empty($tmp)) {

                $estat = false;
				$resposta .= "La contraseña ha de tener:".$tmp;
			}
			else {

				$contrasena = $_REQUEST['contrasena'];
			}
            
        } else {
            
            $estat = false;
            $resposta .= 'Contraseña obligatoria.<br> Longitud de 4 a 8 carácteres ';
            
        }

        if (($_REQUEST['contrasena']) != ($_REQUEST['contrasena2'])) { 

            $estat = false;
			$resposta .= "Contraseñas diferentes";
        }
        
        if (($_REQUEST['nivel']) != "basic") { 

            $estat = false;
			$resposta .= "Datos inconsistentes";
		}
			  
            
	    if ($estat==true) {
		    $respuesta=altaUsuario($usuario,$nacimiento,$correo,$contrasena,$_REQUEST['nivel']);
		    if (!$respuesta){

                $estat = false;
                $resposta .= "Este nombre de usuario ya existe";

		    } else{
                $resposta .= "Alta correcta";
                guardarCookie($_REQUEST['usuario'],$_REQUEST['contrasena'],$_REQUEST['recordar']);
                iniciarSesion($_REQUEST['usuario'],$_REQUEST['contrasena']);
               
            } 
        }
              
        $jsondata = array(
            'estado' => $estat,
            'msg' => $resposta,
            'nombre' => $usuario, 
            'contrasena1' => $contrasena,
            'correo' => $correo, 
            'nacimiento' => $nacimiento
        );
        //Devolvemos el array pasado a JSON como objeto
        //echo json_encode($datos, JSON_FORCE_OBJECT);

       // header('Content-Type: application/json');
       header('Content-type: application/json; charset=utf-8');

        //Aunque el content-type no sea un problema en la mayoría de casos, es recomendable especificarlo
        echo json_encode($jsondata);
     
        exit;
    
  }
     
?> 