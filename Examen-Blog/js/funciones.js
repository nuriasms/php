function cargar(pag,escogido)
{
	$("#capa").load(pag);
	for (var i = 1; i < 3; i++) 
	{
		var tmp="menu"+i;
		document.getElementById(tmp).className="inactive";
	}
	document.getElementById(escogido).className="active";
}

$(document).ready(function()
{
	$("#capa").load(pag);
});






