<?php
    session_start();
    require ('funciones.php');
    $mostrarError="";
    if(isset($_REQUEST["inicio"])) 
    {
        if (empty($_REQUEST['nombre']) || empty($_REQUEST['contrasena']))
        {	
            $mostrarError="Nombre y contraseña obligatorios, no pueden estar vacíos."; 
        }
        else
        {
            if (!$tmp=validarUsuario(strtolower($_REQUEST['nombre']),$_REQUEST['contrasena']))
            {		
                $mostrarError="ERROR al validar usuario";										
            }
            else
            {
                guardarCookie(strtolower($_REQUEST['nombre']),$_REQUEST['contrasena'],$_REQUEST['recordar']);
                if (iniciarSesion($_REQUEST['nombre'],$_REQUEST['contrasena']))
                {
                    header("Location: look.php");
                    exit;
                }
            }
        }
        if (!empty($mostrarError))
        {
            header("Location: inicio.php?text=$mostrarError");

        }  
    }
?>
<script>
    function comprobarNombre(valor)
    {
        if(document.forms[0].nombre.value.length<1)
        {
            alert("Se requiere el nombre para recuperar la contraseña");
        }
        else
        {
            if (valor=='pwd')
            {
                window.location.href="funcion-enviar-pwd.php?nom="+document.forms[0].nombre.value;
            }
            else
            {
                window.location.href="funcion-enviar-token.php?nom="+document.forms[0].nombre.value;
            }
        }
    }
</script>
<!DOCTYPE html>
	<html lang="en">
	<head>
        <?php
			require ('../html/head.html');
		?>
	</head>
	<body>
		<noscript>Disculpe, su navegador no soporta JavaScript!</noscript>
		<!----------------------------------CABECERA------------------------------------------------>
		<?php
			include ('../html/cabecera.html');
		?>
		<!---------------------------------BARRA NAVEGACIÓN------------------------------------------>
		<?php
            $opcio="menu1";
            $barra="inicio";
			include ('../html/barra.html');
		?>
        <!----------------------------MODAL LOGIN--------------------------------------------------->
        <div id="id01" class="modalInd">             
            <form class="modal-content-ind animate" method="post" onsubmit="return validarLogin()"><!--/form> action="http://localhost/php/Examen-UF2-3/php/inicio.php"-->
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Cerrar Modal">&times;</span>
                <div class="imgcontainer">
                    <h1 class="look">LOOK</h1>
                </div>
                
                <div class="container loginIndex espacio">
                    <br>
                    <!--span class="error"><?php echo $mostrarError;?></span-->
                    <span id="mostrarError"></span>
                    <br>
                    <label for="lnombre"><b>Usuario</b></label><br>
                    <input type="text" placeholder="Nombre usuario" name="nombre" id="lnombre" maxlength="20" required>
                    <br>            
                    <label for="lcontrasena"><b>Contraseña</b></label><br>
                    <input type="password" placeholder="Password" name="contrasena" id="lcontrasena" minlength="4" maxlength="8" required>
                    <br>             
                    <button type="submit" name="inicio">Iniciar sesión</button>
                    <br>
                    <label><br>¿Has olvidado tu contraseña?</label>                        
                    <label class="normal">
                        <a class="altaUsuario" onClick="comprobarNombre('pwd'); return false;" href="#">Recibe una nueva </a>
                        o bien
                        <a class="altaUsuario" onClick="comprobarNombre('token'); return false;" href="#"> un token</a>
                    <br><br></label>
                    <br>
                    <label>
                        <input type="checkbox" checked="checked"  name="recordar"> Recordar usuario
                    </label>
                    <br><br><br>
                    <label>
                        <a class="altaUsuario" href="funcion-alta-usuario.php">Registrar nuevo usuario</a>
                    </label>
                    <br><br>
                </div>
                
                <div class="loginPie" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancelar</button>
                    <span class="psw">Olvidar <a href="#" onclick="borrarCookie();">usuario?</a></span>
                </div>
            </form>
        </div>
        <!----------------------------AVISO NO ACTIVO MENÚ-------------------------------------------->
        <div id="avis" class="modal fade" role="dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <!--h1 class="modal-title">LOOK</h1-->
                    <img src="../img/look-22.png" width="40%">
                    <br>
                </div>
                <div class="modal-body">
                    <h3>AVISO:</h3>
                    <h3>MENÚ NO ACTIVO</h3>
                    <br>
                    <p><b>Para acceder a cualquier menú, debe iniciar la sesión con su usuario.</b></p>
                    <br>
                    <p>Si no dispone de usuario, puede crear uno nuevo.</p>
                    <br>
                    <a href="#" data-toggle="modal" data-target="#login" data-dismiss="modal" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Iniciar sesión</a>
                    <br>
                    <a class="altaUsuario" href="funcion-alta-usuario.php">Registrar nuevo usuario</a>
                </div>
                <div class="modal-footer" style="background-color:#f1f1f1" >
                    <button type="button" class="cancelbtn" data-dismiss="modal">Cerrar</button>
                </div>    
            </div>
        </div>  
        <!----------------------------FORMULARIO TOKEN -------------------------------------------->

		<?php
 
        if (validaToken($_REQUEST['codigo']))
        {

            $contrasenaError = $contrasena = '';
            $respuesta = true;

            if(isset($_REQUEST["enviar"])) 
            {	                
                if (empty($_REQUEST['contrasena']) || empty($_REQUEST['contrasena2']) || (($_REQUEST['contrasena'])!=($_REQUEST['contrasena'])))
                {
                    $contrasenaError = "Debe introducir una nueva contraseña y repetirla para su validación. <br>"; 
                    $respuesta = false;
                }
                else
                {
                    $respuesta=validarContrasena($_REQUEST['contrasena']);
                }

                if ($respuesta)
                {
                    if (!guardaContrasena($_REQUEST['contrasena'],$_REQUEST['token']))
                        header("Location: ../index.php");
                }
            }       
        ?>
            <div class="token"> 
                <h2>Recuperar contraseña</h2>
                <br>
                <form method="POST">
                    <label>Nueva contraseña: <input type="password" name="contrasena" minlength="4" maxlength="8" value="<?php echo $contrasena;?>"></label>
                    <br><br>	
                    <label>Repite contraseña: <input type="password" name="contrasena2" minlength="4" maxlength="8"></label>
                    <br><br>
                    <label><span class="error"><?php echo $contrasenaError;?></span></label>
                    <br><br>
                    <input type="submit" name="enviar" value="Cambiar">
                    <br><br>
                </form>
            </div>	
        <?php
        }
        else
        {
            echo "<h3>Su link no es valido o ha caducado</h3>";
        }	
        ?>
        


        <?php
			include ('../html/pie.html');
		?>        
	</body>
</html>