<?php
    session_start();
    require ('../php/funciones.php');
    $usuario=validarSesionAbierta();
    if (!validarTipoUsuario($usuario,'admin'))
	{
		header("Location: aviso-admin.php");
	}
	
    if(isset($_REQUEST["cerrar"])) 
    {	
        cerrarSesion();
    }  
?>

<!DOCTYPE html>
	<html lang="en">
	<head>
		<?php
            require ('../html/head.html');
        ?>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>		
	</head>
	<body>
		<noscript>Disculpe, su navegador no soporta JavaScript!</noscript>
		<!----------------------------------CABECERA------------------------------------------------>
		<?php
			include ('../html/cabecera.html');
		?>
		<!---------------------------------BARRA NAVEGACIÓN------------------------------------------>
		<?php
			$opcio="menu5";
            $barra="admin";
			include ('../php/barra.php');
		?>		
		
		<!----------------------------------------CARGAR DATOS----------------------------->
		<?php		
			
			$con = conectaBBDD();
			//-------------------visitas total----------------------------------------------------
			$sql = "SELECT COUNT(*) as totalVisitas FROM contador";
			$resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
			$registre = mysqli_fetch_assoc($resultat);
            $totalVisitas = $registre['totalVisitas'];
            mysqli_close($con);
            //--------------------visitas por horas -------------------------
            $visitas3h = cuentaHoras(0,3);
            $visitas6h = cuentaHoras(3,6);
            $visitas9h = cuentaHoras(6,9);
            $visitas12h = cuentaHoras(9,12);
            $visitas15h = cuentaHoras(12,15);
            $visitas18h = cuentaHoras(15,18);
            $visitas21h = cuentaHoras(18,21);
            $visitas24h = cuentaHoras(21,24);
            //---------------------------visitas por dias -----------------
            $lunes = cuentadias(1);
            $martes = cuentadias(2);
            $miercoles = cuentadias(3);
            $jueves = cuentadias(4);
            $viernes = cuentadias(5);
            $sabado = cuentadias(6);
            $domingo = cuentadias(0);
            //-----------------------------noticias publicadas por mes-------------------------------------
            $enero = cuentaPublicacionMes(1);
            $febrero = cuentaPublicacionMes(2);
            $ = cuentaPublicacionMes(3);
            $ = cuentaPublicacionMes(4);
            $ = cuentaPublicacionMes(5);
            $ = cuentaPublicacionMes(6);
            $ = cuentaPublicacionMes(7);
            $ = cuentaPublicacionMes(8);
            $ = cuentaPublicacionMes(9);
            $ = cuentaPublicacionMes(10);
            $ = cuentaPublicacionMes(11);
            $ = cuentaPublicacionMes(12);
            
			
		?>
				<div id="recuadrolistado">
					<div id="registrolistado" >						
						<?php			
							//echo "<span class='visita'>Visitas web: $visitas</span>";
						?>
                        <h1>Informe visitas en la web</h1>
                        <h3>Total visitas: <?php echo "$totalVisitas";?></h3>
                        <h4>Visitas por horas</h4>
                        <canvas id="myChart"></canvas>
                        <br>
                        <h4>Visitas por dias</h4>
                        <canvas id="myChart1"></canvas>
                        <br>
                        <h4>Comparativa por meses</h4>
                        <canvas id="myChart2"></canvas>
                        <br>
                        <script>
                        var ctx2 = document.getElementById('myChart').getContext('2d');
                        var chart = new Chart(ctx2, {
                            type: 'doughnut',
                            data: 	
                            {
                                        datasets: [{
                                            data: [<?php echo "$visitas3h,$visitas6h,$visitas9h,$visitas12h,$visitas15h,$visitas18h,$visitas21h,$visitas24h";?>],
                                            backgroundColor: ['#0E6655','#5D6D7E','#2ECC71','#C0392B','#8E44AD','#F4D03F','#3498DB','#E67E22'],
                                            label: 'Visitas por horas'
                                        }],
                                        labels: [
                                            '0-3h',
                                            '3-6h',
                                            '6-9h',
                                            '9-12h',
                                            '12-15h',
                                            '15-18h',
                                            '18-21h',
                                            '21-24h',
                                        ]},
                            options: {}
                        });
                        var ctx1 = document.getElementById('myChart1').getContext('2d');
                        var chart = new Chart(ctx1, {
                            type: 'line',
                            data: {
                                labels: ['Lunes','Martes','Miércoles','Jueves','Viernes','Sabado','Domingo'],
                                datasets: [{
                                    label: 'Actividad',
                                    backgroundColor: '#42a5f5',
                                    borderColor: 'white',
                                    data: [<?php echo"$lunes,$martes,$miercoles,$jueves,$viernes,$sabado,$domingo";?>]
                                }		
                                ]},
                            options: {}
                        });
                        var ctx = document.getElementById('myChart2').getContext('2d');
                        var chart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                                datasets: [{
                                    label: 'Visitas',
                                    backgroundColor: '#42a5f5',
                                    borderColor: 'gray',
                                    data: [7, 8, 5, 2, 8, 10, 7,-7,4,9,-8,5]
                                },{
                                    label: 'Publicaciones',
                                    backgroundColor: '#ffab91',
                                    borderColor: 'yellow',
                                    data: [5, -8, 10, 3,-7,6,8,-2,-6,9,-7,2]
                                }		
                                ]},
                            options: {responsive: true}
                        });

                        </script>
					</div>
				</div>
		<!-----------------------------------PIE------------------------------------------------------>
		<?php
			include ('../html/pie.html');
		?>
	</body>
</html>