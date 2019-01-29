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
                            <li><a href="../clientes.php">Clientes</a></li>
                            <li><a href="citas/citas.php">Citas</a></li> 
                            <li><a href="trabajadores/trabajadores.php">Trabajadores</a></li>
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
            
            <?php if (isset($_GET["email"]) && !isset($_POST["email"])) : ?>
                <br>
                <form method="post">
                <center><table>
                    <tr>
                        <td>Email:</td>
                        <td><input type="email" name="email" required value="<?php  echo $_GET["email"]; ?>"></td>
                    </tr>
                    <tr>
                        <td>Nombre:</td>
                        <td><input type="text" name="nombre" required value="<?php echo $_GET["nombre"]; ?>"></td>
                    </tr>
                    <tr>
                        <td>Apellidos:</td>
                        <td><input type="text" name="apellidos" required value="<?php  echo $_GET["apellidos"]; ?>"></td>
                    </tr>
                    <tr>
                        <td>Teléfono:</td>
                        <td><input type="text" name="telefono" min="0" max="999999999" maxlength="9" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="<?php  echo $_GET["telefono"]; ?>"></td>
                    </tr>
                    <tr>
                        <td>Domicilio:</td>
                        <td><input type="text" name="domicilio" required value="<?php  echo $_GET["domicilio"]; ?>"></td>
                    </tr>
                    <tr>
                        <td>Sexo:</td>
                        <td><select name="sexo" id=""><option value="Masculino">Masculino</option><option value="Femenino">Femenino</option></select></td>
                    </tr>
                
                    <tr><td></td><td><p><input type="submit" id="editar" value="Editar" ></p></td></tr>
                </table></center>
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

//MAKING A SELECT QUERY
/* Consultas de selección que devuelven un conjunto de resultados */
$query = "update clientes
set email = '$_POST[email]',
    nombre = '$_POST[nombre]',
    apellidos = '$_POST[apellidos]',
    telefono = '$_POST[telefono]',
    domicilio = '$_POST[domicilio]',
    sexo = '$_POST[sexo]'

 where cod_clientes = $_GET[cod_clientes]";

if ($result = $connection->query($query)) {

    echo "<script>location.href='../clientes.php'</script>";
    exit();
  


} 

$result->close();
unset($obj);
unset($connection);

?>

<?php endif?>

            </div>
        
        <?php//========================FOOTER==============================?>  
        <div id="linea1" class="row">
            <div  class="col-md-12"></div>
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