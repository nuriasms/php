<?php
    session_start();
	require ('funciones.php');

    //Validaciones de usuario   
    $estat = true;
    $resposta = ' ';
    $fitxer = '';

    if(isset($_REQUEST["nombre"]) && isset($_REQUEST['contrasena'])) {

        if (empty($_REQUEST['nombre']) || empty($_REQUEST['contrasena'])) {

            $resposta .= "Nombre y contraseña obligatorios."; 
            $estat = false;
        }else {

            if (!$tmp=validarUsuario(strtolower($_REQUEST['nombre']),$_REQUEST['contrasena'])) {

                $resposta .= "ERROR al validar usuario";
                $estat = false;									
            } else {

                guardarCookie(strtolower($_REQUEST['nombre']),$_REQUEST['contrasena'],$_REQUEST['recordar']);
                iniciarSesion($_REQUEST['nombre'],$_REQUEST['contrasena']);
                
                    if ($_REQUEST['origen']=="consulta")
                    {
                        $fitxer="look.php";
                        //header("Location:php/look.php");
                    }
                    else
                    {
                        $fitxer="php/look.php";
                        //header("Location:look.php");
                    }                    
                   // exit;
                
            }
        }

        $jsondata = array(
            'estado' => $estat,
            'msg' => $resposta,
            'fichero' => $fitxer
        );

        //Aunque el content-type no sea un problema en la mayoría de casos, es recomendable especificarlo
        header('Content-type: application/json; charset=utf-8');

        echo json_encode($jsondata);
     
        exit;
    }
?>
