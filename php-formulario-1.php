<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Formulario entregable</title>
	<?php
			require ('php-functions-formulari-1.php');
	?>
	<script>
		var estado=true;
		function campoRelleno(datos,error)
		{
			//var estado=true;
			var datosValidar = document.getElementById(datos).value;
			if ((datosValidar.length == 0) || (/^\s+$/.test(datosValidar)))
			{
				document.getElementById(error).innerHTML="Campo obligatorio";
				document.getElementById(error).style.color="red";	
				document.getElementById(error).style.marginLeft="20px";	
				document.getElementById(datos).style.border="1px solid red";
				estado=false;
			}
			else
			{
				document.getElementById(error).innerHTML="";
				document.getElementById(datos).style.border="1px solid black";
			}

			return estado;
		}

		function cambio(datos)
		{
			var datosValidar = document.getElementById(datos).value;
			if ((datosValidar.length == 0) || (/^\s+$/.test(datosValidar)))
			{
				alert("El nombre se ha cambiado y no es valido: " + datosValidar);
			}
			else
			{
				alert("El nombre se ha cambiado: " + datosValidar);
			}

		}

		var estado=false;
		function comprobarNick(datos,error)
		{
			//var estado=false;
			var valorNick = document.getElementById(datos).value;
			for (var i = 0; i < valorNick.length; i++) 
			{
				var caracter = valorNick[i];
				if ((isNaN(caracter))==false)
				{
					estado=true;
				}
			}

			if (estado == true) 
			{
				document.getElementById(error).innerHTML="";
				document.getElementById(datos).style.border="1px solid black";
			}
			else
			{
				document.getElementById(error).innerHTML="Error en Nick";
				document.getElementById(error).style.color="red";	
				document.getElementById(error).style.marginLeft="20px";	
				document.getElementById(datos).style.border="1px solid red";
			}
			return estado;
		}

		var estado=true;
		function comprobarDNI(datos,error)
		{
			//var estado=true;
			var valordni = document.getElementById(datos).value;
			var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];

			if ((!(/^\d{8}[A-Z]$/.test(valordni))) && ((valordni.charAt(8).toUpperCase()) != (letras[(valordni.substring(0, 8))%23])))
			{
  				document.getElementById(error).innerHTML="Error en DNI";
				document.getElementById(error).style.color="red";	
				document.getElementById(error).style.marginLeft="20px";	
				document.getElementById(datos).style.border="1px solid red";	
				estado=false;
			}
			else
			{
				document.getElementById(error).innerHTML="";
				document.getElementById(datos).style.border="1px solid black";
			}
			return estado;
		}

		var estado=true;
		function comprobarCorreo(datos,error)
		{
			//var estado=true;
			var datosCorreo = document.getElementById(datos).value;
			//if (!(/^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/.test(datosCorreo))) 
			if (!(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$/.test(datosCorreo))) 
			{
  				document.getElementById(error).innerHTML="Email no válido";
				document.getElementById(error).style.color="red";	
				document.getElementById(error).style.marginLeft="20px";	
				document.getElementById(datos).style.border="1px solid red";
				estado=false;
			}
			else
			{
				document.getElementById(error).innerHTML="";
				document.getElementById(datos).style.border="1px solid black";
			}
			
			return estado;

		}
		var estado=false;
		function validarBoton(datos,error)
		{
			var elementos = document.getElementsByName(datos);
			//var estado=false;
			for (var i = 0; i < elementos.length; i++) 
			{
				if (elementos[i].checked)
				{
					estado =true;
					break;
				}
			}

			if (estado==false)
			{
				document.getElementById(error).innerHTML="Campo obligatorio";
				document.getElementById(error).style.color="red";
			}
			else
			{
				document.getElementById(error).innerHTML="";
			}
			return estado;
		}

		function validarAceptar(datos,error)
		{
			if (document.getElementById(datos).checked)
			{	
				document.getElementById(error).innerHTML="";
				return true;
			}
			else
			{
				document.getElementById(error).innerHTML="Obligatorio aceptar para continuar";
				document.getElementById(error).style.color="red";
				return false;
			}
		}

		function validar()
		{
			var relleno;
			//relleno = campoRelleno("lnombre","error_lnombre");
			relleno = campoRelleno("lapellido1","error_lapellido1");
			relleno = comprobarNick("lnick","error_lnick");
			relleno = comprobarDNI("ldni","error_ldni");
			relleno = comprobarCorreo("lcorreo","error_lcorreo");
			relleno = validarBoton("estudios","error_lestudios");
			relleno = validarAceptar("laceptar","error_laceptar");

			return false;
		}
	</script>
</head>
<body>
	<?php
			if(isset($_POST["env"]))
			{
				$respuesta=validaRelleno($_POST["nombre"]);
				echo $respuesta;
					
			}
			else
			{
				?>
				<form method="POST" action="php-formulario-1.php" name="miformulario" onsubmit="return validar()">
					<h1>Formulario entregable</h1>
					<label for="lnombre">Nombre de usuario: <span id="error_lnombre"></span><br><input name="nombre" id="lnombre" maxlength="20" type="text" onchange='cambio("lnombre")' autofocus></label><br><br>
					<label for="lapellido">Primer apellido: <span id="error_lapellido"></span><br><input id="lapellido" name="apellido" maxlength="25" type="text"></label><br><br>
					<!--label for="lnick">Nick (debe contener algun número): <span id="error_lnick"></span><br><input id="lnick" name="nick" maxlength="15" type="text"></label><br><br>
					<label for="ldni">DNI: <span id="error_ldni"></span><br><input id="ldni" name="dni" maxlength="9" type="text" placeholder="12345678A"></label><br><br>
					<label for="lcorreo">Email: <span id="error_lcorreo"></span><br><input id="lcorreo" name="correo" maxlength="30" type="text" placeholder="@"></label><br><br>
					<label>Nivel de estudios: <span id="error_lestudios"></span><br>

						<input name="estudios" type="radio"> Certificado escolar
						<br>
						<input name="estudios" type="radio">Graduado en E.S.O.
						<br>
						<input name="estudios" type="radio">Bachiller - Formación Profesional
						<br>
						<input name="estudios" type="radio">Diplomado
						<br>
						<input name="estudios" type="radio">Licenciado o Doctorado
					</label><br><br>
					<label for="laceptar">Aceptas condiciones:<input name="aceptar" type="checkbox" id="laceptar"><span id="error_laceptar"></span></label><br><br>
					<label for="lcomentario">Comentario:<br><textarea id="lcomentario" rows="10" cols="30"></textarea></label><br><br-->
					<hr>
					<br>
					<input type="submit" name="env" value="Enviar">
				</form>
			<?php
			}
		?>
</body>
</html>