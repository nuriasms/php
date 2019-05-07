function cargar(pag)
{
	$("#capa").load(pag);
}

$(document).ready(function()
{
	$("#capa").load(pag);
});

/*---------------------------------------------------------------------------------------------*/

var modal = document.getElementById('id01');

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
function aviso(error,literal)
{
	$("#"+error).text(literal);
	$("#"+error).css({'color': 'red','marginLeft': '15px','padding': '3px 18px','border': '1px solid red'});
}
 
function avisoContrasena()
{
	$(".oculto").css('visibility', 'visible');
}

function limpiarAviso(error)
{
	$("#"+error).text("");
	$("#"+error).css('border', 'none');
	$(".oculto").css('visibility', 'hidden');
}

function errorTexto(datos,texto)
{
	var error = "error_"+datos;
	document.getElementById(error).innerHTML=texto;
	document.getElementById(error).style.color="red";	
	document.getElementById(error).style.marginLeft="15px";	
	document.getElementById(datos).style.border="1px solid red";
}

function limpiar(datos)
{
	var error = "error_"+datos;
	document.getElementById(error).innerHTML="";
	document.getElementById(datos).style.border="1px solid #a9a9a9";
}


function campoRelleno(datos,literal)
{
	var estado=true;
	var datosValidar = document.getElementById(datos).value;
	if ((datosValidar.length == 0) || (/^\s+$/.test(datosValidar)))
	{
		errorTexto(datos,literal);	
		estado=false;
	}
	else
	{
		limpiar(datos);
	}

	return estado;
}

function validarTelefono(datos,literal)
{
	var estado=true;
	var trabajo=true;
	var telefono = document.getElementById(datos).value;
	var nom = document.getElementById(datos).name;
	if (nom=="telefono")
	{
		estado=campoRelleno('ltelefono','Teléfono obligatorio');
	}
	else
	{
		if ((telefono.length == 0) || (/^\s+$/.test(telefono)))
		{	
			estado=false;
		}
	}

	if (estado==true)
	{
		if (!(/^(\+34|0034|34)?[\s|\-|\.]?[6|7|8|9][\s|\-|\.]?([0-9][\s|\-|\.]?){8}$/.test(telefono))) 
		{
	  		errorTexto(datos,'Teléfono no válido');
			estado=false;
		}
		else
		{
			limpiar(datos);
		}
	}
	return estado;
}

function validarNacimiento(datos,literal)
{
	var estado=true;
	var nacimiento = document.getElementById(datos).value;
	var fecha = new Date();
	var hoy =(fecha.getFullYear() + "-" + (fecha.getMonth() +1) + "-" + fecha.getDate());
	var anos = (parseFloat(hoy.substr(-10,4)) - parseFloat(nacimiento.substr(-10,4)));
	
	if ((nacimiento > hoy) || (nacimiento.length == 0) || (/^\s+$/.test(nacimiento)) || (anos > 100))
	{
		errorTexto(datos,literal);	
		estado=false;
	}
	else
	{
		limpiar(datos);
	}
	return estado;
}

function validarGenero(datos,literal)
{
	var genero = document.getElementsByName(datos);
	var error = "error_"+datos;			
	var estado=false;
	for (var i = 0; i < genero.length; i++) 
	{
		if (genero[i].checked)
		{
			estado =true;
			document.getElementById(error).innerHTML="";
			break;
		}
	}

	if (estado==false)
	{
		errorTexto(datos,literal);
	}
	else
	{
		document.getElementById(error).innerHTML="";	
	}
	
	return estado;
}

function validarProfesion(datos,literal)
{
	var indice = document.getElementById(datos).selectedIndex;
	var profesion = document.getElementById(datos).options;
	var estado=false;
	if (profesion[indice].value == "")
	{
		errorTexto(datos,literal);
	}
	else
	{
		limpiar(datos);
		estado=true;
	}
	return estado;
}

function comprobarCorreo(datos,literal)
{
	var estado=true;
	var datosCorreo = document.getElementById(datos).value;
		if (!(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$/.test(datosCorreo))) 
	{
		errorTexto(datos,literal);
		estado=false;
	}
	else
	{
		limpiar(datos);
	}
		
	return estado;
}

function validarContrasena(datos,literal)
{
    var mensaje ="";
    var estado=true;
    var letra=true;
    var puntos=0;
    var caracteres = "0123456789àèòáéíóúÁÉÍÓÚabcçdefghijklmnñopqrstuvwxyzÀÈÒÁÉÍÓÚABCÇDEFGHIJKLMNÑOPQRSTVWXYZ";
    var error = "error_"+datos;
    var tmpCtr = document.getElementById(datos).value;
	estado=campoRelleno(datos,literal);
	for (var i = 0; i < tmpCtr.length; i++) 
	{
	  	if (caracteres.search(tmpCtr[i])==-1)
	  	{
	  		letra = false;
	  		mensaje = mensaje+"No se admiten símbolos. ";
	  		break;
	  	} 
	}		

	if ((estado==true) && (letra==true))
	{		
		if (tmpCtr.search(/[0-9]/) == -1)
		{
            mensaje = mensaje+"Falta un número mínimo. ";
            puntos--;
		}
                
		if (tmpCtr.search(/[A-Z]/g) == -1)
		{
            mensaje = mensaje+("Falta una letra mayúscula mínimo. ");
            puntos--;
		}
                
		if (tmpCtr.search(/[a-z]/g) == -1)
		{ 
            mensaje = mensaje+("Falta una letra minúscula mínimo. ");
            puntos--;
		}

        if ((tmpCtr.length < 8) || (tmpCtr.length > 12))
	    {
            mensaje = mensaje+("Error de longitud (longitud mínima 8, máxima 12). ");
            puntos--;
            estado=false;
        }
        else
        {
        	for (var i = 0; i < tmpCtr.length; i++) {
				puntos++;
			}
        }
    }

    if ((mensaje != "") || (estado==false) || (letra==false))
    {
    	mensaje = "CONTRASEÑA NO VÁLIDA: "+mensaje;
    	errorTexto(datos,mensaje);
    	estado=false;
    }
    else
    {
    	if (puntos<9)
        {
        	document.getElementById(error).innerHTML="CLAVE DÉBIL. " + mensaje;
			document.getElementById(error).style.color="darkorange";	
			document.getElementById(error).style.marginLeft="15px";	
        }

        if ((puntos>=9)&&(puntos<12))
        {
        	document.getElementById(error).innerHTML="CLAVE MEDIA. " + mensaje;
			document.getElementById(error).style.color="gold";	
			document.getElementById(error).style.marginLeft="15px";	
        }
        if (puntos>=12)
        {
	        document.getElementById(error).innerHTML="CLAVE SEGURA. ";
			document.getElementById(error).style.color="green";	
			document.getElementById(error).style.marginLeft="15px";
		}
    }
    return estado;
}

function validarAceptar(datos)
{
	var error = "error_"+datos;
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
	var relleno1 = campoRelleno("lnombre","Nombre obligatorio");
	var relleno2 = campoRelleno("lapellido","Apellido obligatorio");
	var relleno3 = validarTelefono("ltelefono","Teléfono obligatorio");
	var relleno4 = validarNacimiento("lnacimiento","Fecha nacimiento obligatoria");
	var relleno5 = validarGenero("lsexo","Obligatorio escoger genero");
	var relleno6 = validarProfesion("lprofesion","Obligatorio escoger una área");
	var relleno7 = validarTelefono("lteltrab","");
	var relleno8 = comprobarCorreo("lcorreo","Email no válido");
	var relleno9 = validarContrasena("lcontrasena","Contraseña obligatoria");
	var relleno10 = validarAceptar("laceptar");

	if ((relleno1 == false) || (relleno2 == false) || (relleno3 == false) || (relleno4 == false) || (relleno5 == false)	|| (relleno6 == false) || (relleno7 == false) || (relleno8 == false) || (relleno9 == false) || (relleno10 == false))
	{
		return false;
	}	
	else
	{
		document.getElementById("envio").disabled="true";
		document.getElementById("envio").value="Enviando";
		document.getElementById("envio").style.color="red";
		return true;				
	}
}

var TRange=null

function buscar(cadena) 
{
 	if (parseInt(navigator.appVersion)<4) return;
 	var strFound;
 	if (window.find) 
 	{
	  	strFound=self.find(cadena);
	  	if (!strFound) 
	  	{
	   		strFound=self.find(cadena,0,1)
   			while (self.find(cadena,0,1)) continue
  		}
 	}
 	else if (navigator.appName.indexOf("Microsoft")!=-1) 
	 	{
		    if (TRange!=null) 
		    {
		   		TRange.collapse(false)
		   		strFound=TRange.findText(cadena)
		   		if (strFound) TRange.select()
		  	}
		  	if (TRange==null || strFound==0) 
		  	{
		   		TRange=self.document.body.createTextRange()
		   		strFound=TRange.findText(str)
		   		if (strFound) TRange.select()
		  	}
	 	}
 		else if (navigator.appName=="Opera") 
 		{
  			alert ("Opera no soporta la busqueda");
  			return;
 		}
 	if (!strFound) alert ("No se ha encontrado: "+cadena)
 	return;
}

function ampliarFoto(dato)
{
	var fotoEscogida=document.images[dato].src;
	document.images["fotoVisor"].src=fotoEscogida;
	var texto=document.images[dato].alt;
	document.getElementById("descripcion").innerHTML=texto;
	document.images["fotoVisor"].alt=texto;
	document.images["fotoVisor"].title=texto;

	var album=document.getElementsByTagName("img"); 
	for (var i = 0; i < album.length; i++)
	{
		album[i].style.boxShadow="none";
	}	
	document.images[dato].style.boxShadow="0 0 5px 5px #5A5858";	    
}

function muestra(mas,menos)
{
	document.getElementById(mas).className="ver";
	document.getElementById(menos).className="noVer";
}
function ocultar(mas,menos)
{
	document.getElementById(mas).className="noVer";
	document.getElementById(menos).className="ver";
}


var modal = document.getElementById('ventanaModal');
var btn = document.getElementById("abrirVentanaModal");
var span = document.getElementsByClassName("cerrarVentanaModal")[0];

btn.onclick = function() {
	modal.style.display = "block";
}
span.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}



