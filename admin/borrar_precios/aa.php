<!DOCTYPE html>


    <?php
        //CREATING THE CONNECTION
        $connection = new mysqli("localhost", "tf", "123456", "tf");
        $connection->set_charset("utf8");
        //TESTING IF THE CONNECTION WAS RIGHT
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }
        //MAKING A SELECT QUERY
        /* Consultas de selección que devuelven un conjunto de resultados */
        $query = "delete from servicio
        where cod_servicio='$_GET[cod_servicio]'";
        if ($result = $connection->query($query) ) {
    
                echo "<h1>Cliente borrado correctamente</h1>";
        
        
        } 
        else { 
                echo "<h1>Error en consulta</h1>";
                echo "<h1>Cliente no existe</h1>";
        }
        unset($connection);
    ?>



