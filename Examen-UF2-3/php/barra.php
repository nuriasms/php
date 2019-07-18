<script src="../js/funciones.js"></script>
<!---------------------------------BARRA NAVEGACIÓN------------------------------------------>
<nav class="navbar navbar-default">		 
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <div class="container-fluid collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
            <?php
                switch ($barra)                
                { 

                    case 'inicio':
            ?>
                        <li id='menu1' class='active'><a href='index.php'>Inicio</a></li>
                        <li id='menu2' class='inactive'><a href='php/look-consulta.php'>Consulta noticias</a></li>
            <?php            
                        break;
                    case 'publico': 
            ?>           
                        <li id='menu1' class='inactive'><a href='../index.php'>Inicio</a></li>
                        <li id='menu2' class='active'><a href='look-consulta.php'>Consulta noticias</a></li>
            <?php
                        break;
                    case 'basic':
            ?>
                        <li id='menu1' class='inactive' ><a href='look.php'>Inicio</a></li>
                        <li id='menu2' class='inactive'><a href='look-consulta.php' >Consulta noticias</a></li>
                        <li id='menu3' class='inactive'><a href='look-alta-noticia.php'>Alta artículo</a></li>
            <?php
                        break;
                    case 'admin':
            ?>
                        <li id='menu1' class='inactive' ><a href='look.php'>Inicio</a></li>
                        <li id='menu2' class='inactive'><a href='look-consulta.php' >Consulta noticias</a></li>
                        <li id='menu3' class='inactive'><a href='look-alta-noticia.php'>Alta artículo</a></li>
                        <li id='menu4' class='inactive'><a href='look-edita.php' >Edita artículos</a></li>
            <?php
                        break;
                    default:
                }   
            ?>   
        </ul>
    </div>
</nav>
<script>
    cargar('<?php echo $opcio;?>');
</script>





