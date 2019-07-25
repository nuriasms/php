<?php
	session_start();
	require ('funciones.php');
	//https://mimentevuela.wordpress.com/2016/08/29/devolver-json-en-php-y-obtener-datos-con-ajax/
	//https://cybmeta.com/ajax-con-json-y-php-ejemplo-paso-a-paso
    
    $jsondata = array();
    $estat = true;
    $resposta = '';


	//Inicializa variables
    $usuario = $contrasena = $contrasena2 = $envio = $correo = $nacimiento = $id = "";
    $usuarioError = $contrasenaError1 = $contrasenaError2 = $contrasena2Error = $correoError = $nacimientoError = "";
	$respuesta = true;

    if( isset($_REQUEST['usuario']) && isset($_REQUEST['nacimiento']) && isset($_REQUEST['correo']) && isset($_REQUEST['contrasena']) && isset($_REQUEST['contrasena2'])) {

        if( !empty($_REQUEST["usuario"]) ) {

            $usuario = test_input($_REQUEST["usuario"]);
			// comprueba que lleva solo letras y espacios
			if (!preg_match("/^[a-zA-Z áéíóúÁÉÍÓÚÑñàèòÀÈÒçÇ·\-]*$/",$usuario)) { 
                   
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
			
	    if ($estat==true) {
		    $respuesta=altaUsuario($usuario,$nacimiento,$correo,$contrasena,$_REQUEST['nivel']);
		    if (!$respuesta){

                $estat = false;
                $resposta .= "No se ha dado de alta";

		    }
		    else{

                $resposta = "Alta correcta";
			    guardarCookie($_REQUEST['usuario'],$_REQUEST['contrasena'],$_REQUEST['recordar']);
                iniciarSesion($_REQUEST['usuario'],$_REQUEST['contrasena']);
		    }
        }

        $jsondata['success']= $estat;
        $jsondata['msg']= $resposta;
        $jsondata['nombre']=$usuario;
        $jsondata['contrasena1']=$contrasena;
        $jsondata['nacimiento']=$nacimiento;
        $jsondata['correo']=$correo;

        //Aunque el content-type no sea un problema en la mayoría de casos, es recomendable especificarlo
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsondata);
        exit();
    }
     
?> 