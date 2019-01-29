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
    <?php
      session_start();

        //FORM SUBMITTED
        if (isset($_POST["email"])) {

          //CREATING THE CONNECTION
          $connection = new mysqli("localhost", "root", "2asirtriana", "proyecto");

          //TESTING IF THE CONNECTION WAS RIGHT
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }

          //MAKING A SELECT QUERY
          //Password coded with md5 at the database. Look for better options
          $consulta="select * from clientes where
          email='$_POST[email]' and password=md5('$_POST[password]')";
          

          //Test if the query was correct
          //SQL Injection Possible
          //Check http://php.net/manual/es/mysqli.prepare.php for more security
          if ($result = $connection->query($consulta)) {

              //No rows returned
              if ($result->num_rows===0) {

                echo "<script type='text/javascript'>alert('El correo o contraseña introducidos son incorrectos');</script>";    
           
            } else {
                  
                //VALID LOGIN. SETTING SESSION VARS
                $_SESSION["email"]=$_POST["email"];
                $_SESSION["password"]=$_POST["password"];
                
                header("Location: ../index.php");
              }

              

          } else {
            echo "Wrong Query";
          }
      } 

    ?>
    <div class="container">
    <!--======================================================================-->
        <div class="row justify-content-md-center formulario">
            <form action="login.php" method="post">
                <div class="form-group">
                <center><h2 id="Bienvenido" class="titulo">Bienvenido</h2></center>   
                <label for="exampleInputEmail1" class="blanca" id="email">Correo electrónico:</label>
                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="ejemplo@ejemplo.com">
                    <small id="emailHelp" class="form-text text-muted">Tu correo electrónico no será compartido con nadie.</small>
                </div>
                <div class="form-group">
                <label for="exampleInputPassword1" class="blanca" id="password">Contraseña:</label>
                    <input type="password" name="password" class="form-control" placeholder="Contraseña">
                </div>
                <button type="submit" class="btn btn-primary" >Acceder</button>
               <small class="form-text text-muted"><a  id="registro"  href="registro1.php">¿Aún no tienes cuenta? ¡Registrate aquí!</a></small>
            </form>
        </div>
    <!--======================================================================-->
      </div>
</body>
</html>