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
    <style>@import url('https://fonts.googleapis.com/css?family=Allura');</style>
    
    
</head>
<body>
<div class="container">
    <!--======================================================================-->
        <div class="row justify-content-md-center formularioregistro">
        <?php if (!isset($_POST["email"])): ?>
            <form action="registro1.php" method="post">
                
                <div class="form-group">
                <center><h2 id="registrate">Regístrate</h2></center>   
                <label for="exampleInputEmail1">Correo electrónico:</label>
                    <input type="email" name="email" class="form-control" id="remail" aria-describedby="emailHelp" placeholder="ejemplo@ejemplo.com" required>
                </div>
               
                <div class="form-group">
                    <label for="exampleInputPassword1">Contraseña:</label>
                    <input type="password" name="password" class="form-control" id="rpassword" placeholder="Contraseña" required>
                </div>
                
                <div class="form-group">
                    <label for="exampleInputPassword1">DNI:</label>
                    <input type="text" name="dni" class="form-control" id="rdni" placeholder="12345678X" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Nombre:</label>
                    <input type="text" name="nombre" class="form-control" id="rnombre" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Apellidos:</label>
                    <input type="text" name="apellidos" class="form-control" id="rapellido" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Domicilio:</label>
                    <input type="text" name="domicilio" class="form-control" id="rdomicilio" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Telefono:</label>
                    <input type="text" name="telefono" class="form-control" id="rtelefono" placeholder="123 456 789" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Sexo:</label>
                    <input type="text" name="sexo" class="form-control" id="rsexo" placeholder="Masculino / Femenino" required>
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



        $query = "insert into clientes (email,password,dni,nombre,apellidos,domicilio,telefono,sexo) values 
        ('$_POST[email]',md5('$_POST[password]'),'$_POST[dni]','$_POST[nombre]','$_POST[apellidos]','$_POST[domicilio]',
        '$_POST[telefono]','$_POST[sexo]')";
        

        if ($result = $connection->query($query) ) {


                echo "<h1>¡Se ha registrado con exito!</h1>";


        } 
        else { 
            echo $query;
                echo "<h1>Error en consulta</h1>";
        }



        unset($connection);

        ?>

        <?php endif?>
        </div>

    <!--======================================================================-->
      </div>




</body>
</html>