<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Page Title</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>

        <?php if (!isset($_POST["dni"])): ?>

            <form method="post">

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



        $query = "insert into clientes (dni,nombre,apellidos,domicilio,telefono,sexo) values ('$_POST[dni]','$_POST[nom]','$_POST[ap]','$_POST[dom]','$_POST[tef]','$_POST[sex]')";


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