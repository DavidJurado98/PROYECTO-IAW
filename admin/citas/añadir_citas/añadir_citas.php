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
            <div class="col-md-11">
                <?php//========================MENU==============================?>
                    <nav class="menu">
                        <ul style="margin-bottom: 0px";>
                            <li><a href="../../precios.php">Precios</a></li>
                            <li><a href="../../clientes/clientes.php">Clientes</a></li>
                            <li><a href="../../citas/citas.php">Citas</a></li> 
                            <li><a href="../../trabajadores/trabajadores.php">Trabajadores</a></li>
                        </ul>                             
                            
                    </nav>               
                </header>
            </div>
            <div id="salir" class="col-md-1">
                <nav class="menu">
                    <ul style="margin-bottom: 0px";>
                        <li><a href="../perfil/perfil.php">Perfil</a></li> 
                        <a id="logout" href="../../login/cerrar_sesion.php"><img src="logout.png" /></a>                       
                    </ul>                               
                </nav>

            </div>
                           
        </div>
        <div id="linea" class="row">
            <div  class="col-md-12">
            </div>
        </div>        
        <?php//========================BODY==============================?>

        
            <div id="content">
            
            <?php if (!isset($_POST["servicioelegido"])): ?>

            <form method="post" >
                <br>
                <center><table>
                    <tr>
                        <td>Servicio:</td><td>
                        <select name="servicioelegido" id="" >

                        <?php
                        $connection = new mysqli("localhost", "root", "2asirtriana", "proyecto");
                        $connection->set_charset("utf8");
                        //TESTING IF THE CONNECTION WAS RIGHT
                        if ($connection->connect_errno) {
                            printf("Connection failed: %s\n", $connection->connect_error);
                            exit();
                        }
                        $query="select * from servicio";
                        if ($result = $connection->query($query) ) {

                        while ($obj = $result->fetch_object()) {
                            echo "<option value='$obj->servicios'>$obj->servicios </option>";
                        }
                                }       
                        ?>                       
                        </select>             
                        
                        </td>
                    </tr>
                    <tr>
                        <td>Fecha:</td><td> <input type="date" name="fecha" required min=
     <?php
         echo date('Y-m-d');
     ?>
 ></td> </tr>
                        <tr><td>Hora:</td><td><select name="hora1" id="">
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        </select><a> : </a><select name="hora2" id="">
                        <option value="00">00</option>
                        <option value="30">30</option>
                        </select></td>
                        
                    </tr>
                    
                </table></center><br>
                <center><table><tr>
               
                <td><button class="btn btn-primary" type="submit">PEDIR CITA</button></td>
                
                <td><p>&nbsp;&nbsp;&nbsp;</p></td>

                <td><a class="btn btn-primary" href="../miscitas.php" role="button">MIS CITAS</a></td></tr></table>
   
                <br>
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

        $servicio = $_POST["servicioelegido"];
        $fecha = $_POST["fecha"];
        $h1 = $_POST["hora1"];
        $h2 = $_POST["hora2"];
        $h= "$h1".":"."$h2";
       
        $query2 = "select cod_servicio FROM servicio where servicios='$servicio'";
        if ($result2 = $connection->query($query2) ) {        
            $obj2 = $result2->fetch_object();
            $cod_servicio= $obj2->cod_servicio;
            

        }
        $query4 = "select cod_clientes FROM clientes where email='$_SESSION[email]'";
        if ($result4 = $connection->query($query4) ) { 
            $obj4 = $result4->fetch_object();   
            $cod_clientes= $obj4->cod_clientes;


        }
        $query8 = "select hora, fecha from citas where hora='$h' and fecha='$fecha'";
        if ($result8 = $connection->query($query8)) {

            if ($result8->num_rows===0) {
         $query = "INSERT INTO `proyecto`.`citas` 
        (`fecha`, `cod_clientes`, `hora`) VALUES ('$fecha',$cod_clientes, '$h')";


            
            

        if ($result1 = $connection->query($query) ) {   
            $id=$connection->insert_id;

             
            $query1 = "INSERT INTO `proyecto`.`servicio_prestado` (`cod_servicio`, `cod_cita`, `cod_peluquero`)
             VALUES ($cod_servicio,$id,1)";
            
            if ($result = $connection->query($query1) ) {  
              
                echo "<div class='alert alert-success' role='alert'><center>
                <strong>¡Bien hecho ADMIN!</strong> Tu cita se ha realizado con éxito.</center>
                </div>";
                echo "<script>setTimeout(function() {
                    window.location.href = 'añadir_citas.php';
                }, 1600);</script>";

                exit();
     
                    }
                    else {
                        echo $query1;

                    }    
                
                } 
                    else {
                        echo $query;
                    } 
        
                }
                else {
                    echo "<div class='alert alert-danger' role='alert'><center>
                <strong>¡Error!</strong> Tu cita no esta disponible a esa hora o fecha.</center>
                </div>";
                echo "<script>setTimeout(function() {
                    window.location.href = 'añadir_citas.php';
                }, 2700);</script>";
                }
}
    ?>

        <?php endif?>

    </div>  
     
        <?php//========================FOOTER==============================?>  
        <div id="linea1" class="row">
            <div  class="col-md-12"> </div>
        </div>

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