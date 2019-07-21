<?php
    session_start();
    require ('../php/funciones.php');
    $usuario=validarSesionAbierta();
    if (!validarTipoUsuario($usuario,'admin')) header("Location: aviso-admin.php");
	
    if(isset($_REQUEST["cerrar"])) cerrarSesion();
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
        <span id="inicio"></span>
        <?php
            $origen="look";
			include ('../html/cabecera.html');
		?>
		<!---------------------------------BARRA NAVEGACIÓN------------------------------------------>
		<?php
			$opcio="menu5";
            $barra="admin";
			include ('../php/barra.php');
		?>		
		
		<!----------------------------------------CARGAR DATOS----------------------------->
        <div class="bajar">
			<a href="#final" class="glyphicon glyphicon-chevron-down"></a>
		</div>
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
            $eneroP = cuentaDatosMes('noticies','data',1);
            $febreroP = cuentaDatosMes('noticies','data',2);
            $marzoP = cuentaDatosMes('noticies','data',3);
            $abrilP = cuentaDatosMes('noticies','data',4);
            $mayoP = cuentaDatosMes('noticies','data',5);
            $junioP = cuentaDatosMes('noticies','data',6);
            $julioP = cuentaDatosMes('noticies','data',7);
            $agostoP = cuentaDatosMes('noticies','data',8);
            $septiembreP = cuentaDatosMes('noticies','data',9);
            $octubreP = cuentaDatosMes('noticies','data',10);
            $noviembreP = cuentaDatosMes('noticies','data',11);
            $diciembreP = cuentaDatosMes('noticies','data',12);
            //-----------------------------visitas por mes-------------------------------------
            $eneroV = cuentaDatosMes('contador','fecha',1);
            $febreroV = cuentaDatosMes('contador','fecha',2);
            $marzoV = cuentaDatosMes('contador','fecha',3);
            $abrilV = cuentaDatosMes('contador','fecha',4);
            $mayoV = cuentaDatosMes('contador','fecha',5);
            $junioV = cuentaDatosMes('contador','fecha',6);
            $julioV = cuentaDatosMes('contador','fecha',7);
            $agostoV = cuentaDatosMes('contador','fecha',8);
            $septiembreV = cuentaDatosMes('contador','fecha',9);
            $octubreV = cuentaDatosMes('contador','fecha',10);
            $noviembreV = cuentaDatosMes('contador','fecha',11);
            $diciembreV = cuentaDatosMes('contador','fecha',12);
			
		?>
		<div id="recuadrolistado">
			<div id="registrolistado" >						
                <h1>Informe visitas en la web</h1>
                <h3>Total visitas: <?php echo "$totalVisitas";?></h3>
                <br>
                <h4>Visitas por horas</h4>
                <canvas id="myChart"></canvas>
                <br><hr><br>
                <h4>Visitas por dias</h4>
                <canvas id="myChart1"></canvas>
                <br><hr><br>
                <h4>Comparativa por meses</h4>
                <canvas id="myChart2"></canvas>
                <br>
                <script>
                    var ctx2 = document.getElementById('myChart').getContext('2d');
                    var chart = new Chart(ctx2, {
                        type: 'doughnut',//'pie', //tipo pastel
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
                            options: { 
                                legend: {
                                    labels: {
                                        fontColor: "white",
                                        fontSize: 14
                                    }
                                }
                            }
                    });
                    var ctx1 = document.getElementById('myChart1').getContext('2d');
                    var chart = new Chart(ctx1, {
                        type: 'line',
                        data: {
                            labels: ['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo'],
                            datasets: [{
                                label: 'Actividad',
                                backgroundColor: '#42a5f5',
                                borderColor: 'white',
                                data: [<?php echo"$lunes,$martes,$miercoles,$jueves,$viernes,$sabado,$domingo";?>]
                            }		
                            ]},
                            options: { 
                                legend: {
                                    labels: {
                                        fontColor: "white",
                                        fontSize: 14
                                    }
                                },
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            fontColor: "white",
                                            fontSize: 14,
                                            //stepSize: 1,
                                            beginAtZero: true
                                        },
                                        gridLines: {
                                            color: "#d3d1d1",
                                            lineWidth:1,
                                            zeroLineColor :"#d3d1d1",
                                            zeroLineWidth : 2
                                        },
                                    }],
                                    hover: {
                                        mode: 'nearest',
                                        intersect: true
                                    },
                                    xAxes: [{
                                        ticks: {
                                            fontColor: "white",
                                            fontSize: 14
                                        },
                                        gridLines: {
                                            color: "#d3d1d1",
                                            lineWidth:1,
                                            zeroLineColor :"#d3d1d1",
                                            zeroLineWidth : 2
                                        },
                                    }]
                                }
                            }
                    });
                    var ctx = document.getElementById('myChart2').getContext('2d');
                    var chart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                            datasets: [{
                                label: 'Visitas',
                                backgroundColor: '#736BCD',//'#42a5f5',
                                borderColor: 'white',
                                data: [<?php echo "$eneroV,$febreroV,$marzoV,$abrilV,$mayoV,$junioV,$julioV,$agostoV,$septiembreV,$octubreV,$noviembreV,$diciembreV";?>]
                            },{
                                label: 'Publicaciones',
                                backgroundColor: '#B75C87',//'#ffab91',
                                borderColor: 'white',
                                data: [<?php echo "$eneroP,$febreroP,$mayoP,$abrilP,$mayoP,$junioP,$julioP,$agostoP,$septiembreP,$octubreP,$noviembreP,$diciembreP";?>]
                            }		
                            ]},
                            options: { 
                                responsive: true,
                                legend: {
                                    labels: {
                                        fontColor: "white",
                                        fontSize: 14
                                    }
                                },
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            fontColor: "white",
                                            fontSize: 14,
                                            //stepSize: 1,
                                            beginAtZero: true
                                        },
                                        gridLines: {
                                            color: "#d3d1d1",
                                            lineWidth:1,
                                            zeroLineColor :"#d3d1d1",
                                            zeroLineWidth : 2
                                        },
                                    }],
                                    hover: {
                                        mode: 'nearest',
                                        intersect: true
                                    },
                                    xAxes: [{
                                        ticks: {
                                            fontColor: "white",
                                            fontSize: 14,
                                            //stepSize: 1,
                                            beginAtZero: true
                                        },
                                        gridLines: {
                                            color: "#d3d1d1",
                                            lineWidth:1,
                                            zeroLineColor :"#d3d1d1",
                                            zeroLineWidth : 2
                                        },                                            
                                    }]
                                }
                            }
                        });
                </script>
			</div>
        </div>
        <div class="subir">
			<a href="#inicio" class="glyphicon glyphicon-chevron-up"></a>
        </div>		
        <span id="final"></span>
		<!-----------------------------------PIE------------------------------------------------------>
		<?php
            $origen="look";
			include ('../html/pie.html');
		?>
	</body>
</html>