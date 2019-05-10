function cambiar(act,inact)
{
	for (var i = 1; i < 3; i++) 
	{
		var tmp="menu"+i;
		document.getElementById(tmp).className="inactive";
	}
	document.getElementById(act).className="active";
	document.getElementById(inact).className="inactive";
}







