$(document).ready(function(){
	jQuery.validator.setDefaults({
		debug: true,
		success: "valid"				
		});

	$("#formulario-login").validate({
		event: "blur",
		rules: {	
			'nombre': {
				required: true,
				maxlength: 20
			},
			'contrasena': {
				required: true,
				minlength: 4,
				maxlength: 8
			}
		},
		messages: {
			'nombre': {
				required: "Por favor, indica tu nombre",
				maxlength: "La longitud máxima es 20"
			},
			'contrasena': {
				required: "Por favor, introduce la contraseña",
				minlength: "La longitud mínima es 4",
				maxlength: "La longitud máxima es 8"
            }
        },
		debug: true,errorElement: "label",				
		submitHandler: function(form){
			if ( $('#alert').hasClass('alert-danger'))
			{
				$('#alert').removeClass('alert-danger');
				$('#alert').addClass('alert-success');
			}
			$("#alert").show();
			$("#alert").html("<img src='img/ajax-loader.gif' style='vertical-align:middle;margin:0 10px 0 0' /><strong>Enviando mensaje...</strong>");
			setTimeout(function() {
				$('#alert').fadeOut('slow');
			}, 3000);
		    $.ajax({
				type: "POST",
				url: (lugar == "inicio") ? "php/cabecera.php" : "cabecera.php",
				data: "nombre="+escape($('#nombre').val())+"&contrasena="+escape($('#contrasena').val())+"&recordar="+escape($('#recordar').val())+"&origen="+escape($('#origen').val()),
				success: function(jsondata){
					//console.log(jsondata.msg);
					console.log(JSON.stringify(jsondata));
					//$("#alert").html(jsondata.msg);

					if (jsondata.estado) {
						$("#alert").html(jsondata.msg);
						setTimeout(function() {
						    $('#alert').fadeOut('slow');
						}, 9000);		
            			document.getElementById("nombre").value="";
						document.getElementById("contrasena").value="";
						location.replace(jsondata.fichero);
						//location.href ="../php/look.php";
					}else{
						if ( $('#alert').hasClass('alert-success'))
						{
							$('#alert').removeClass('alert-success');
							$('#alert').addClass('alert-danger');
						}
						$("#alert").html(jsondata.msg);	
						setTimeout(function() {
							$('#alert').fadeOut('slow');
						}, 9000);		
					}
				},
				error: function(xhr, status, error){
         			var errorMessage = xhr.status + ': ' + xhr.statusText;
					//this will be triggered when the request fails
					console.log('Codigo estado del envío: ' + errorMessage);//200 es correcto OK
				}					
			});
		}
	});
});
