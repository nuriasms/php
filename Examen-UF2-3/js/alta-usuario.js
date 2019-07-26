		
		$(document).ready(function(){
			jQuery.validator.setDefaults({
				debug: true,
				success: "valid"
				
				});
				
					
			jQuery.validator.addMethod(
				"regex",
				function(value, element, regexp) {
					var re = new RegExp(regexp);
					return this.optional(element) || re.test(value);
				},
					"No se admiten carácteres especiales",	
			);
			
			jQuery.validator.addMethod(
				"edad", 
				function(value, element) {              
					var from = value.split("-"); //YYY MM DD

					var dia = from[2];
					var mes = from[1];
					var ano = from[0];

					// cogemos los valores actuales
					var fecha_hoy = new Date();
					var ahora_ano = fecha_hoy.getYear();
					var ahora_mes = fecha_hoy.getMonth()+1;
					var ahora_dia = fecha_hoy.getDate();
			
					// realizamos el calculo
					var edad = (ahora_ano + 1900) - ano;
					if ( ahora_mes < mes ) {
						edad--;
					}
					if ((mes == ahora_mes) && (ahora_dia < dia)) {
						edad--;
					}
					if (edad > 1900) {
						edad -= 1900;
					}

					if (edad >=18) {
						return true;
					}else {
						return false;
					}
				},	
			);

			$("#formulario-alta").validate({
				event: "blur",
				rules: {	
					'usuario': {
							required: true,
							maxlength: 30,
							regex: "^[0-9a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑçÇüÜ_\s]{1,30}$"
					},
					'nacimiento': {
							required:true,
							date:true,
							edad: true
					},
					'correo': {
						required: true,
						email: true
					},
					'contrasena': {
						required: true,
						minlength: 4,
						maxlength: 8
					},
					'contrasena2': {
						required: true,
						equalTo: "#contrasena1"
					},
				},
				messages: {
							'usuario': {
								required: "Por favor indica tu nombre",
								maxlength: "Ha excedido la longitud máxima de 30"
							},
							'correo': {
								required: "Por favor, indica una dirección de e-mail válida",
								email: "Formato correo erroneo"
							},
							'nacimiento': {
								required: "Por favor, indica tu fecha de nacimiento!",
								date: "Por favor, fecha no valida",
								edad: "Por favor, debe ser mayor de edad"
							},
							'contrasena': {
								required: "Por favor, introduce la contraseña que desees",
								minlength: "La longitud mínima es 4",
								maxlength: "La longitud máxima es 8"
							},
							'contrasena2': {
								required: "Por favor, retipe la contraseña"},
								equalTo: "Las contraseñas no coinciden"
							},
				debug: true,errorElement: "label",				
				submitHandler: function(form){
						if ( $('#alert').hasClass('alert-danger'))
						{
							$('#alert').removeClass('alert-danger');
							$('#alert').addClass('alert-success');
						}
						$("#alert").show();
						$("#alert").html("<img src='../img/ajax-loader.gif' style='vertical-align:middle;margin:0 10px 0 0' /><strong>Enviando mensaje...</strong>");
						setTimeout(function() {
							$('#alert').fadeOut('slow');
						}, 3000);
					$.ajax({
						type: "POST",
						url:"../php/alta-usuario.php",
						//dataType: 'JSON', //'html', //Para enviar y recibir con una estruccura simple
						data: "usuario="+escape($('#nombre').val())+"&nacimiento="+escape($('#nacimiento').val())+"&correo="+escape($('#correo').val())+"&contrasena="+escape($('#contrasena1').val())+"&contrasena2="+escape($('#contrasena2').val())+"&nivel="+escape($('#nivel').val())+"&recordar="+escape($('#recordar').val()),
						success: function(jsondata){
							console.log(jsondata);
							console.log(jsondata.msg);
							//$("#alert").html(jsondata.msg);

							if (jsondata.estado) {
								$("#alert").html(jsondata.msg);
								setTimeout(function() {
									$('#alert').fadeOut('slow');
								}, 9000);		
            					document.getElementById("nombre").value="";
								document.getElementById("nacimiento").value="";
								document.getElementById("correo").value="";
								document.getElementById("contrasena1").value="";
								document.getElementById("contrasena2").value="";
								location.replace("../php/look.php");
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
						// Ya lo hace en el inicio el reloj
						//beforeSend: function(){
							//this will be triggered before sending the ajax request
							//console.log('Enviando datos desde AJAX ...');
						//},
						error: function(xhr, status, error){
         					var errorMessage = xhr.status + ': ' + xhr.statusText;
							//this will be triggered when the request fails
							console.log('Codigo estado del envío: ' + errorMessage);//200 es correcto OK
						}					
					});
				}
			});
		});

