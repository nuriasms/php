<?php
    session_start();
    require ('funciones.php');
    validarSesionAbierta();  
?>
<!DOCTYPE html>
<html lang="en">
	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../lib/css/bootstrap.min.css">
        <script src="../lib/js/jquery.min.js"></script>
        <script src="../lib/js/bootstrap.min.js"></script>
		<script src="../js/GestionNoticias.js"></script>
        <title>GN-Menú</title>
        <link rel="stylesheet" href="../css/style.css"> 
        
	</head>
	<body class="prensa">
        <noscript>Disculpe, su navegador no soporta JavaScript!</noscript>
		<header>
			<span id="inicio"></span>
			<!--img src="img/logo.png" alt="Logo del planetario"-->
			<h1>Menú noticias</h1>
		</header>
		<div class="col-md-10 main">
			<article class="artDerecha">
				<h2 class="titular">El pudor de Mané: el hijo del imán que oculta su Bentley</h2>
				<br><br>
				<img src="../img/mane.jpg">
				<br><br>
				<p class="contenido">El senegalés, que vive alejado de la purpurina del fútbol, fue grabado limpiando los baños de su mezquita.
				El sueño de Sadio Mané (Sédhiou, Senegal, 10 de abril de 1992), en realidad, ya se cumplió. 
				Ocurrió el día en que, por primera vez, se subió a un avión rumbo a Europa. A Francia.
				 Su madre pensaba que aún estaba en Dakar, a 437 kilómetros de la pequeña aldea de Bambali que le vio crecer. 
				 Junto al río Casanza. Pero Sadio, aquel niño que hizo su primera prueba como futbolista con unas botas repletas de agujeros 
				 -«eran las únicas que tenía», se disculpó-, tomó rumbo hacia lo desconocido. Metz. Después Salzburgo, en Austria. 
				 El puerto de Southampton, ya en esa Premier cargada de purpurina. Y por el último Liverpool, 
				 donde esconde el Bentley en el garaje para no olvidar sus raíces. Mané es la gran esperanza del Merseyside para levantar la eliminatoria de Champions frente al Barcelona.</p>
				
				 <p class="autor">Pepe Perico</p>				 
				<p class="fecha">martes, 07 de mayo de 2019</p>
			</article>		
			<hr>
			<article class="artIzquierda">
				<h2 class="titular">Llibres i lletres</h2>	
				<br><br>				
				<img src="../img/libros.jpg">
				<br><br>
				<p class="contenido">Després de les pluges i ben entrada la primavera comença el temps de les fires del llibre. A principis de maig als carrers, 
				a les places i als parcs els vianants pregunten els llibreters, signen els autors i s'anima el teixit cultural. 
				Passejant per una albereda escoltes des d'una caseta un sonsonet familiar, el qual repeteix «tot està en els llibres»... 
				La memòria és trasllada a la teua adolescència quan la música acompanyava la tertúlia televisiva d'un conegut programa... Una cançoneta que t'invitava a viatjar a qualsevol lloc del món, 
				perqué les lletres tenen la virtut de ser universals. Les veus en femení de Vainica Doble cantaven al unicornio, Alejandría, Aldana en Alcazarquivir, Kim de la India y Samarkanda, Santa Teresa y Boabdil, 
				Ítaca, la muralla china, las minas del rey Salomón, flores del mal y gatopardos y caminos de perfección. Las nieves de Kilimanjaro, la vida en el Mississipí, Canterbury, París, Lisboa, San Juan, Santiago, 
				San Fermín, las mil y una noches, los Vedas, Nueva Orleans, Sebastopol, Venecia, Nápoles, Atenas, Don Juan, Gargantúa, Hiperión. Los campos de Soria, la Pampa, la isla del tesoro, el Grial, Romeo y Julieta, 
				Alejandro, Sócrates, Don Quijote, Bagdad, lo que el viento se llevó, Granada, Buda, Lanzarote, Lord Jim, infiernos, cielos, paraísos, Carmen, Angélica, Beatriz. El minotauro, el laberinto, Hércules, Gárgoris, 
				Sansón, capitán Nemo, Platero, Sherlock Holmes y Guillermo Brown, Alicia, Nils Holgersson, Pinocho, Sandokán, Huckleberry Finn, Scherezade, el judío errante, la Celestina, Brandomín.... 
				Ara de nou a la fira és revifen les imatges del passat. Un vell lletraferit valencià i referent cultural està present per tot arreu...Vicent Andrés Estellés. Sona una cançó junt al rètol d'una editorial valenciana, 
				una jove meneja el cap i balla, al seu costat un jove tatuat atén una parella entre rialles. Compartixen una cigarreta de cannabis sense complexes alhora que reubiquen cartells, flyers, revistes i poemaris. 
				Els pregunte pel nom del tema que escolten...no la coneixes?...Responen a l'uníson Aspencat... una lletra inspirada en Estellés, el poeta de Burjassot. No passa el temps pel seu missatge engrescador...quan caminàvem 
				per la desobediencia, quan tu i jo teniem somnis rebels, quan sobreviure forma part de l'essència a la meua terra hi ha una pluja d'estels... Per camins d'horta sembrada avancem, enyorem un temps que no s'ha vist encara. 
				Un passat de lluita accelerada, assaig d'una esperança, que camina fermament i transforma aquest present...Hui no tinc cap dubte, hui t'estime encara més. Hui vull fer l'amor de matinada. Hui voldrie ser un gran deixeble d'Estellés, 
				veig murals a les parets. Saps que no vull glòria ni riqueses, no vull cartes de promeses enfonsades en la mar. Que no vull palaus ni vull princeses, no vull plors, ni vull tristeses, comencem a caminar.</p>
				<br>
				<p class="autor">Pep Perico</p>
				<br>
				<p class="fecha">miercoles, 08 de mayo de 2019</p>
			</article>
			<hr>			
		</div>           
	</body>
</html>