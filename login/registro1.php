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
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
    <style>@import url('https://fonts.googleapis.com/css?family=Allura');</style>
</head>
<body>
<div class="container">
    <!--======================================================================-->
        <div class="row justify-content-md-center formularioregistro">
        <?php if (!isset($_POST["email"])): ?>
            <form action="registro1.php" method="post">
                
                <div class="form-group blanca">
                <center><h2 id="Registrate" class="titulo">Regístrate</h2></center>   
                <label for="exampleInputEmail1">Correo electrónico:</label>
                    <input type="email" name="email"class="form-control" class=blanca   id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ejemplo@ejemplo.com" required>
                </div>
               
                <div class="form-group blanca">
                    <label for="exampleInputPassword1">Contraseña:</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña" required>
                </div>

                <div class="form-group blanca">
                    <label for="exampleInputPassword1">Nombre:</label>
                    <input type="text" name="nombre" class="form-control" id="exampleInputPassword1" required>
                </div>

                <div class="form-group blanca">
                    <label for="exampleInputPassword1">Apellidos:</label>
                    <input type="text" name="apellidos" class="form-control" id="exampleInputPassword1" required>
                </div>

                 <div class="form-group blanca">
                    <label for="exampleInputPassword1">Teléfono:</label>
                    <input type="text" name="telefono" class="form-control" id="exampleInputPassword1" placeholder="123 456 789" required>
                </div>

                <div class="form-group blanca">
                    <label for="exampleInputPassword1">Domicilio:</label>
                    <input type="text" name="domicilio" class="form-control" id="exampleInputPassword1" required>
                </div>

                <div class="form-group blanca">
                    <label for="exampleInputPassword1">Sexo:</label>
                    <?php //<input type="text" name="sexo" class="form-control" id="exampleInputPassword1" placeholder="Masculino / Femenino" required>?>
                    <select name="sexo" class="form-control" id="exampleInputPassword1"><option value="Masculino">Masculino</option><option value="Femenino">Femenino</option></select>
                </div>
                <button type="submit" class="btn btn-primary">Registrar</button>
               
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

        

        $query = "insert into clientes (email,password,nombre,apellidos,telefono,domicilio,sexo) values 
        ('$_POST[email]',md5('$_POST[password]'),'$_POST[nombre]','$_POST[apellidos]','$_POST[telefono]',
        '$_POST[domicilio]','$_POST[sexo]')";
        
        $consulta2="select * from clientes where email='$_POST[email]'";

        //Test if the query was correct
        //SQL Injection Possible
        //Check http://php.net/manual/es/mysqli.prepare.php for more security
        if ($result1 = $connection->query($consulta2)) {
          
            //No rows returned
            if ($result1->num_rows===0) {
              if ($result2 = $connection->query($query)) {
                  header("Location: login.php");
              }
            } else {
                  echo "<h1>Usuario ya registrado; ingrese otro usuario</h1>";
                  header("refresh:3;url=registro1.php");
              
            }

        } else {
          echo "Wrong Query";
        }
 
         





        unset($connection);

        ?>

        <?php endif?>
        </div>

    <!--======================================================================-->
      </div>




</body>
</html>