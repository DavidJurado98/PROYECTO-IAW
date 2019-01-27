<?php if (!isset($_POST["ser"])): ?>

            <form method="post">

                Servicio <input type="text" name="ser" required>
                Precio <input type="number" name="pre" required>
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
    
                echo "<h1>Cliente insertado correctamente</h1>";
                header('Location:../precios.php');
        
        } 
        else { 
                echo "<h1>Error en consulta</h1>";
        }
        unset($connection);
    ?>

        <?php endif?>