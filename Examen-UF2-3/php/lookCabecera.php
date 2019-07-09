
<!----------------------------------CABECERA------------------------------------------------>
<header class="container">
			<ul class="barraUsuari"> 
				<li><form method="get">
						<button type="submit" name="cerrar" class="glyphicon glyphicon-log-out nada"></button>
					</form></li>
				<li>
					<?php 
						if (!empty ($usuario))
						{
						?>
							<span class="nomUsuari glyphicon glyphicon-user"> 
							<?php echo ucwords($usuario);/*echo utf8_encode(ucwords($usuario));*/?>
							</span>
						<?php
						}
						else
						{
							
						}
					?>
				</li>    
			</ul>
			<h1>LOOK</h1>   
		</header>