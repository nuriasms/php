/*---------------------------------------------------------------------------------------------*/

var modal = document.getElementById('id01');

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
/*----------------------------------------------------------------------------------------------*/
/* function cambiar(arg1):                                                                 */
/* Cambia la clase activo/inactivo según requiera la selección del cliente                      */
/*                                                                                              */
/* Parametros: recibe pestaña activa en menú                                 */
/*----------------------------------------------------------------------------------------------*/
function cargar(activar)
{
	/* Pone todas las pestañas del menu a inactivo*/
	for (var i = 1; i < 12; i++) 
	{
		var tmp="menu"+i;
		document.getElementById(tmp).className="inactive";
	}
	/* Al tratarse de dos pestañas pone el estado directamente*/
	document.getElementById(activar).className="active";	
}
function comprobarNombre(valor,origen)
{
    if(document.forms[0].nombre.value.length<1)
    {
        alert("Se requiere el nombre para recuperar la contraseña");
    }
    else
    {
        if (valor=='passwd')
        {
			if (origen=='consulta') {
            	window.location.href="../php/enviar-passwd.php?nom="+document.forms[0].nombre.value;
			}else {
				window.location.href="php/enviar-passwd.php?nom="+document.forms[0].nombre.value;
			}

		}
        else
        {
			if (origen=='consulta') {
            	window.location.href="../php/enviar-token.php?nom="+document.forms[0].nombre.value;
			}else {
            	window.location.href="php/enviar-token.php?nom="+document.forms[0].nombre.value;
			}
		}
    }
}

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

/*----------------------------------------------------------------------------------------------*/
/* function visibilidad(arg):                                                                   */
/* Oculta o hace visible un div según ha pulsado el usuario                                     */
/*                                                                                              */
/* Parametros: recibe id del div a tratar                                                       */
/*----------------------------------------------------------------------------------------------*/
function visibilidad(datos)
{
	var tmp = document.getElementById(datos);
	if (tmp.style.display == 'block')
		tmp.style.display = 'none';
	else
		tmp.style.display = 'block';
}
/*----------------------------------------------------------------------------------------------*/
/* function validarLogin():                                                                          */
/* Comprueba que se han rellenado los campos del login                                          */
/*----------------------------------------------------------------------------------------------*/
function validarLogin()
{
	var estado=true;
	var nombre = document.getElementById('lnombre').value;
	if ((nombre.length == 0) || (nombre.length >30) || (/^\s+$/.test(nombre)) || (!isNaN(nombre)))
	{	
		document.getElementById('mostrarError').innerHTML="Nombre obligatorio.";
		document.getElementById('mostrarError').style.color="red";
		estado=false;
	}
	else
	{
		document.getElementById('mostrarError').innerHTML="";
	}

	var contrasena = document.getElementById('lcontrasena').value;
	if ((contrasena.length > 8) || (contrasena.length < 4)) 
	{
		errorTexto(datos,error,literal);	
		document.getElementById('mostrarError').innerHTML="Contraseña obligatoria.";
		document.getElementById('mostrarError').style.color="red";
		estado=false;
	}
	else
	{
		document.getElementById('mostrarError').innerHTML="";
	}	
	return estado;
}







