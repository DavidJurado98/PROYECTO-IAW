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
    <title>[ADMIN] Precios</title>
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
                            <li><a href="../precios.php">Precios</a></li>
                            <li><a href="../clientes/clientes.php">Clientes</a></li>
                            <li><a href="citas.php">Citas</a></li> 
                            <li><a href="../trabajadores/trabajadores.php">Trabajadores</a></li>
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
        <?php//======================== BODY ==============================?>
        
        <div id="linea" class="row">
            <div  class="col-md-12">
                             
            </div>
        </div>

        <div id="content" class="row">
            <div  class="col-md-12">
             
            
            <?php

                //CREATING THE CONNECTION
                $connection = new mysqli("localhost", "root", "2asirtriana", "proyecto");
                $connection->set_charset("utf8");

                //TESTING IF THE CONNECTION WAS RIGHT
                if ($connection->connect_errno) {
                    exit();
                }

                //MAKING A SELECT QUERY
                /* Consultas de selección que devuelven un conjunto de resultados */
                if ($result = $connection->query("SELECT c.nombre, c.apellidos,c.telefono,s.servicios,ci.hora,ci.fecha,ci.cod_cita as cc
                FROM clientes c
                JOIN citas ci on c.cod_clientes = ci.cod_clientes
                JOIN servicio_prestado sp on ci.cod_cita = sp.cod_cita
                JOIN servicio  s on sp.cod_servicio = s.cod_servicio
                ORDER BY ci.fecha ASC;")) {

    
            ?>

    <!-- PRINT THE TABLE AND THE HEADER -->
    <table class="table">
  <thead>
    <tr>
      
      <th scope="col">Nombre</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Servicio</th>
      <th scope="col">Hora</th>
      <th scope="col">Fecha</th>
      <th scope="col">Telefono</th>
      <th scope="col">Editar</th>
      <th scope="col">Borrar</th>

    </tr>
  </thead>
    <tbody>
<?php

    //FETCHING OBJECTS FROM THE RESULT SET
    //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
    while($obj = $result->fetch_object()) {
        //PRINTING EACH ROW
        echo"<tr>";
        echo"<td>$obj->nombre</td>";
        echo"<td>$obj->apellidos</td>";
        echo"<td>$obj->servicios</td>";
        echo"<td>$obj->hora</td>";
        echo"<td>$obj->fecha</td>";
        echo"<td>$obj->telefono</td>";
        echo"<td><a href='añadir_citas/añadir_citas.php?cod_cita=$obj->cc'>
                <img src='lapiz.png'>
                </a></td>";
        echo "<td><a href='borrar_citas/borrar_citas.php?cod_cita=$obj->cc'>
        <img src='borrar.png'>
        </a></td>";     
      echo'</tr>';

    }

    //Free the result. Avoid High Memory Usages
    $result->close();
    unset($obj);
    unset($connection);

} //END OF THE IF CHECKING IF THE QUERY WAS RIGHT





?>

</tbody>

</table>
<form action="añadir_citas/añadir_citas.php">
    <center><input type="submit" value="Añadir cita"/></center>
    <br>
</form>
    
            </div>
        </div>

        <?php//========================FOOTER==============================?>  
        <div id="linea1" class="row">
            <div  class="col-md-12">

            </div>
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