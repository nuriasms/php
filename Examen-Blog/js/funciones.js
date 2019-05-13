/*----------------------------------------------------------------------------------------------*/
/* function cambiar(arg1,arg2):                                                                 */
/* Cambia la clase activo/inactivo según requiera la selección del cliente                      */
/*                                                                                              */
/* Parametros: recibe pestaña activa en menú y pestaña inactiva                                 */
/*----------------------------------------------------------------------------------------------*/
function cambiar(act,inact)
{
	/* Pone todas las pestañas del menu a inactivo*/
	for (var i = 1; i < 3; i++) 
	{
		var tmp="menu"+i;
		document.getElementById(tmp).className="inactive";
	}
	/* Al tratarse de dos pestañas pone el estado directamente*/
	document.getElementById(act).className="active";
	document.getElementById(inact).className="inactive";
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







