<div class="container">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">          
				<?php
					$con = conectaBBDD();
					$sql = "SELECT * FROM galeria";
					$resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
					$totalFotos = mysqli_num_rows($resultat);
						
					for ($x = 0; $x <= $totalFotos; $x++)
					{
				?>
						<li data-target="#myCarousel" data-slide-to="<?php echo '$x';?>" <?php if($x==0){ echo "class='active'";}?>></li>
				<?php
					}
					mysqli_close($con);
				?>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner">
				<?php
					$primero = 1;

					$con = conectaBBDD();
					$sql = "SELECT * FROM galeria";
					$resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
									
					while ($registre = mysqli_fetch_array($resultat, MYSQLI_ASSOC)) 
					{	
						if ($primero==1)
						{
					
						echo "<div class='item active'>";
				
						$primero = 5;    
						}	
						else
						{
					
						echo "<div class='item'>";
				
					}
					if ($origen=="look")
					{
        		?>
						<img src="../<?php echo $registre['imagen'];?>" alt="<?php echo $registre['titulo'];?>" style="width:100%;">
				<?php
					}
					else
					{
				?>
						<img src="<?php echo $registre['imagen'];?>" alt="<?php echo $registre['titulo'];?>" style="width:100%;">
				<?php
					}
				?>
						<div class="carousel-caption">
							<h2 style="color:limegreen;font-weight:bolder"><?php echo $registre['titulo'];?></h2>
							<h3 style="color:CHARTREUSE;font-weight:bolder"><?php echo $registre['descripcion'];?></h3>
						</div>
					</div>
				<?php    
				}
				mysqli_close($con);
				?>
				</div>
				<!-- Left and right controls -->
				<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">Next</span>
				</a>
			</div>
			<div class="textoPortada">
			<?php
				if ($origen=="look")
				{
					echo "<img src='../img/s.png' hspace='5' style='float: left;'>";
				}
				else
				{
					echo "<img src='img/s.png' hspace='5' style='float: left;'>";
				}
			?>
				<br><span>  omos una revista pensada para la mujer dinámica y femenina.
				Nos centramos en la divulgación de pequeñas publicaciones relacionadas
				con el estilo de vida de la mujer actual. Se trata de un espacio abierto
				a todos los miembros de la comunidad LOOK que deseen compartir artículos relacionados.</span>
			</div>
		</div>
