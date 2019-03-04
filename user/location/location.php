<?php

  //Open the session
  session_start();

  if (!isset($_SESSION["email"])) {
    session_destroy();
    header("Location: ../../login/login.php");
  }
 ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Proyect CutHair</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
        crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="estilos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div id="carusel" class="col-md-12">
                <header>
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="sl1.jpg" alt="">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="sl2.jpg" alt="">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-11">
                <?php//========================MENU==============================?>
                <nav class="menu">
                    <ul style="margin-bottom: 0px" ;>
                        <li><a href="../precios.php">Precios</a></li>
                        <li><a href="../citas/citas.php">Citas</a></li>
                        <li><a href="location.php">¿Donde estamos?</a></li>
                        <li><a href="../trabajadores/trabajadores.php">Trabajadores</a></li>
                    </ul>

                </nav>
                </header>
            </div>
            <div id="salir" class="col-md-1">
                <nav class="menu">
                    <ul style="margin-bottom: 0px" ;>
                        <li><a href="../perfil/perfil.php">Perfil</a></li>
                        <a id="logout" href="../../login/cerrar_sesion.php"><img src="logout.png" /></a>                       
                    </ul>
                </nav>

            </div>
        </div>
        <div id="linea" class="row">
            <div class="col-md-12">
            </div>
        </div>
        <?php//========================BODY==============================?>
        <div id="content" class="row">
        <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">

                <div id="mapa" class="z-depth-1-half map-container" style="height: 100%">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d197.7066604023058!2d-6.053653326398992!3d37.54784042675269!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd1240bd8bec7a79%3A0x37a2ae0baec38bc!2sCalle+San+Fernando%2C+27%2C+41210+Guillena%2C+Sevilla!5e0!3m2!1ses!2ses!4v1548841848815" width="100%" height="400px" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>


        </div>
            <?php//========================FOOTER==============================?>
            <div id="linea1" class="row">
                <div class="col-md-12"></div>
            </div>

            <div class="row">
                <div id="fut" class="col-md-12">
                    <footer>
                        <div class="footer">
                            <center>Designed by: Higinio David Jurado Palomino</center>
                        </div>
                    </footer>
                </div>
            </div>

        
</body>

</html>