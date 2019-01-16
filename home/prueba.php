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
</head>
<body>

    <?php if (!isset($_POST["correo"])): ?>

    <form method="post">
        Correo:  <input type="text" name="correo" required>
        Contraseña:<input type="text" name="contraseña" required>
        DNI: <input type="text" name="dni" required>
        Nombre: <input type="text" name="nom" required>
        Apellidos: <input type="text" name="ap" required>
        Domicilio: <input type="text" name="dom" required>
        Telefono: <input type="text" name="tef" required>
        Sexo: <input type="text" name="sex" required>
        <input type="submit" value="Registrarse">

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



    $query = "insert into clientes (correo,contraseña,dni,nombre,apellidos,domicilio,telefono,sexo) values ('$_POST[correo]','$_POST[contraseña]','$_POST[dni]','$_POST[nom]','$_POST[ap]','$_POST[dom]','$_POST[tef]','$_POST[sex]')";


    if ($result = $connection->query($query) ) {


        echo "<h1>Cliente insertado correctamente</h1>";


    } 
    else { 
        echo "<h1>Error en consulta</h1>";
    }



    unset($connection);

    ?>

    <?php endif?>    
</body>
</html>