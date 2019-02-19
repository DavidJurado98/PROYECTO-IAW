<?php

  //Open the session
  session_start();

  if (!isset($_SESSION["email"])) {
    session_destroy();
    header("Location: ../login/login.php");
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
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
            <div class="col-md-12">
                <?php//========================MENU==============================?>
                <nav class="menu">
                        <ul style="margin-bottom: 0px";>
                            <li><a href="../precios.php">Precios</a></li>
                            <li><a href="../clientes/clientes.php">Clientes</a></li>
                            <li><a href="../citas/citas.php">Citas</a></li> 
                            <li><a href="../trabajadores/trabajadores.php">Trabajadores</a></li>
                        </ul>                             
                            
                    </nav>               
                </header>
            </div>
                           
        </div>
        <div id="linea" class="row">
            <div  class="col-md-12">
            </div>
        </div>        
        <?php//========================BODY==============================?>

        
            <div id="content">
            
            <?php if (!isset($_POST["ser"])): ?>

            <form method="post">
                <br>
                <center><table>
                    <tr>
                        <td>Servicio:</td><td><input type="text" name="ser" required></td>
                    </tr>
                    <tr>
                        <td>Precio:</td><td><input min="0" type="number" name="pre" required></td>
                    </tr>
                    
                </table></center><br>
                <center><table><tr><td></td><td><input id="insertar" type="submit" value="Insertar"></td></tr></table></center><br>

                
            </form>
        <?php else: ?>

    <?php
        //CREATING THE CONNECTION
        $connection = new mysqli("localhost", "root", "2asirtriana", "proyecto");
        $connection->set_charset("utf8");
        //TESTING IF THE CONNECTION WAS RIGHT
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }

        $serv = $_POST["ser"];
        $prec = $_POST["pre"];
        //MAKING A SELECT QUERY
        /* Consultas de selección que devuelven un conjunto de resultados */
        $query = "INSERT INTO servicio VALUES ('','$serv','$prec');";
        if ($result = $connection->query($query) ) {

            echo "<script>location.href='../precios.php'</script>";
            //header("Location: ../precios.php");
            exit();

        } 
        else { 
                echo "<h1>Error en consulta</h1>";
        }
        unset($connection);
    ?>

        <?php endif?>

    </div>  
     
        <?php//========================FOOTER==============================?>  
        <div id="pepe" class="row"><div class="col-md-10"></div></div>

        <div class="row">
            <div id="fut" class="col-md-12">
                <footer>
                    <div class="footer"><center>Designed by: Higinio David Jurado Palomino</center></div>
                </footer>
            </div>    
        </div>

    </div>      
</body>
</html>