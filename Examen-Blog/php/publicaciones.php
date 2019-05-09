<?php
    session_start();
    require ('funciones.php');
    $usuario=validarSesionAbierta();  

    //Inicializa variables
    $contador = 0; 
    if(isset($_POST["cuenta"])) 
	{	
        $contador = 33;
    }
    
    
    
?>



<div class="col-sm-12">
        <h4><small>PUBLICACIÓN RECIENTE</small></h4>
        <hr>
        <span class="titulo"><h2>Mejorar tus habilidades de jugador</h2></span>
        <span class="descripcion">
            <p><strong>Aprende a realizar el servicio por encima de la cabeza.</strong> Si bien muchos de los mejores jugadores han perfeccionado el servicio con salto, uno simple por encima de la cabeza podría ser igual de eficaz. Mantente detrás de la línea de servicio, lanza la pelota a una altura cómoda por encima de tu cabeza y golpéala con la palma de la mano extendida sobre la red lo más fuerte que puedas. La pelota debe quedar dentro de los límites del lado contrario de la cancha. Si bien los servicios por debajo del hombro y los laterales colocan la pelota en juego, no son tan difíciles de devolver como los que se realizan por encima de la cabeza y además no son los favoritos para aprender.</p>
            <ul>
                <li><span><b>Practica tu saque.</b> Para ambos tipos de servicio, debes lanzar la pelota con la mano que usarás para golpearla y apuntar a la parte más baja de ella. No trates de golpearla con la palma de la mano sino con la parte del arco para lograr un servicio más preciso. Asegúrate de posicionarte y apuntar correctamente o la pelota saldrá desviada.</span></li>
                <li><span><b>Prueba aplicando fuerza.</b> ¿Qué es demasiado? ¿Qué es muy poco? Muy pronto tus músculos recordarán lo que funciona y podrás apuntar la pelota como si se tratara de una bala en una pistola.</span></li>
            </ul>
        </span>
        <h5><span class="glyphicon glyphicon-time"></span><span class="autor"> Mireia Martorell, 10 de mayo de 2019.</h5>
        <!--button type="button" class="btn btn-default btn-sm" onclick="contadorLikes('MireiaMartorell10052019')">
                <span class="glyphicon glyphicon-thumbs-up"></span><?php echo $contador;?>
        </button-->
        <form method="post">
            <button type="button" name="cuenta" class="btn btn-default btn-sm" ><span class="glyphicon glyphicon-thumbs-up"></span></button>
            <span><?php echo $contador;?></span-->
            
        </form>
        <h5><span class="label label-danger">Food</span> <span class="label label-primary">Ipsum</span></h5><br>
        <br><br>
      
      <h4><small>RECENT POSTS</small></h4>
      <hr>
      <h2>Officially Blogging</h2>
      <h5><span class="glyphicon glyphicon-time"></span> Post by John Doe, Sep 24, 2015.</h5>
      <h5><span class="label label-success">Lorem</span></h5><br>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <hr>

      <h4>Leave a Comment:</h4>
      <form role="form">
        <div class="form-group">
          <textarea class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
      </form>
      <br><br>
      
      <p><span class="badge">2</span> Comments:</p><br>
      
      <div class="row">
        <div class="col-sm-2 text-center">
          <img src="bandmember.jpg" class="img-circle" height="65" width="65" alt="Avatar">
        </div>
        <div class="col-sm-10">
          <h4>Anja <small>Sep 29, 2015, 9:12 PM</small></h4>
          <p>Keep up the GREAT work! I am cheering for you!! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          <br>
        </div>
        <div class="col-sm-2 text-center">
          <img src="bird.jpg" class="img-circle" height="65" width="65" alt="Avatar">
        </div>
        <div class="col-sm-10">
          <h4>John Row <small>Sep 25, 2015, 8:25 PM</small></h4>
          <p>I am so happy for you man! Finally. I am looking forward to read about your trendy life. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          <br>
          <p><span class="badge">1</span> Comment:</p><br>
          <div class="row">
            <div class="col-sm-2 text-center">
              <img src="bird.jpg" class="img-circle" height="65" width="65" alt="Avatar">
            </div>
            <div class="col-xs-10">
              <h4>Nested Bro <small>Sep 25, 2015, 8:28 PM</small></h4>
              <p>Me too! WOW!</p>
              <br>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
