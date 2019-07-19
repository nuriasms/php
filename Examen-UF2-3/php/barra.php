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
                        echo "<li class='active'><a href='index.php'>Inicio</a></li>";
                        echo "<li class='inactive'><a href='php/look-consulta.php'>Consulta noticias</a></li>";
                        break;
                    case 'publico': 
                        echo "<li class='inactive'><a href='../index.php'>Inicio</a></li>";
                        echo "<li class='active'><a href='look-consulta.php'>Consulta noticias</a></li>";
                        break;
                    case 'privado':
                        switch ($opcio)                
                        { 
                            case 'menu1':
                                echo "<li class='active' ><a href='look.php'>Inicio</a></li>";
                                echo "<li class='inactive'><a href='look-consulta.php' >Consulta noticias</a></li>";
                                echo "<li class='inactive'><a href='look-alta-noticia.php'>Alta artículo</a></li>";
                                echo "<li class='inactive'><a href='look-listado.php' >Listado artículos</a></li>";
                                break;
                            case 'menu2':
                                echo "<li class='inactive' ><a href='look.php'>Inicio</a></li>";
                                echo "<li class='active'><a href='look-consulta.php' >Consulta noticias</a></li>";
                                echo "<li class='inactive'><a href='look-alta-noticia.php'>Alta artículo</a></li>";
                                echo "<li class='inactive'><a href='look-listado.php' >Listado artículos</a></li>";
                                break;
                            case 'menu3':
                                echo "<li class='inactive' ><a href='look.php'>Inicio</a></li>";
                                echo "<li class='inactive'><a href='look-consulta.php' >Consulta noticias</a></li>";
                                echo "<li class='active'><a href='look-alta-noticia.php'>Alta artículo</a></li>";
                                echo "<li class='inactive'><a href='look-listado.php' >Listado artículos</a></li>";
                                break;
                            case 'menu4':
                                echo "<li class='inactive' ><a href='look.php'>Inicio</a></li>";
                                echo "<li class='inactive'><a href='look-consulta.php' >Consulta noticias</a></li>";
                                echo "<li class='inactive'><a href='look-alta-noticia.php'>Alta artículo</a></li>";
                                echo "<li class='active'><a href='look-listado.php' >Listado artículos</a></li>";
                                break;
                            default:
                                break;
                        }
                        break;
                    case 'admin': 
                        switch ($opcio)                
                        { 
                            case 'menu1':
                                echo "<li class='active' ><a href='look.php'>Inicio</a></li>";
                                echo "<li class='inactive'><a href='look-consulta.php' >Consulta noticias</a></li>";
                                echo "<li class='inactive'><a href='look-alta-noticia.php'>Alta artículo</a></li>";
                                echo "<li class='inactive'><a href='look-listado.php' >Listado artículos</a></li>";
                                echo "<li class='inactive'><a href='look-informe.php' >Informe interno</a></li>";
                                break;
                            case 'menu2':
                                echo "<li class='inactive' ><a href='look.php'>Inicio</a></li>";
                                echo "<li class='active'><a href='look-consulta.php' >Consulta noticias</a></li>";
                                echo "<li class='inactive'><a href='look-alta-noticia.php'>Alta artículo</a></li>";
                                echo "<li class='inactive'><a href='look-listado.php' >Listado artículos</a></li>";
                                echo "<li class='inactive'><a href='look-informe.php' >Informe interno</a></li>";
                                break;
                            case 'menu3':
                                echo "<li class='inactive' ><a href='look.php'>Inicio</a></li>";
                                echo "<li class='inactive'><a href='look-consulta.php' >Consulta noticias</a></li>";
                                echo "<li class='active'><a href='look-alta-noticia.php'>Alta artículo</a></li>";
                                echo "<li class='inactive'><a href='look-listado.php' >Listado artículos</a></li>";
                                echo "<li class='inactive'><a href='look-informe.php' >Informe interno</a></li>";
                                break;
                            case 'menu4':
                                echo "<li class='inactive' ><a href='look.php'>Inicio</a></li>";
                                echo "<li class='inactive'><a href='look-consulta.php' >Consulta noticias</a></li>";
                                echo "<li class='inactive'><a href='look-alta-noticia.php'>Alta artículo</a></li>";
                                echo "<li class='active'><a href='look-listado.php' >Listado artículos</a></li>";
                                echo "<li class='inactive'><a href='look-informe.php' >Informe interno</a></li>";
                                break;
                            case 'menu5':
                                echo "<li class='inactive' ><a href='look.php'>Inicio</a></li>";
                                echo "<li class='inactive'><a href='look-consulta.php' >Consulta noticias</a></li>";
                                echo "<li class='inactive'><a href='look-alta-noticia.php'>Alta artículo</a></li>";
                                echo "<li class='inactive'><a href='look-listado.php' >Listado artículos</a></li>";
                                echo "<li class='active'><a href='look-informe.php' >Informe interno</a></li>";
                                break;
                            default:
                                break;
                        }
                        break;
                    default:
                        break;
                }   
            ?>   
        </ul>
    </div>
</nav>





