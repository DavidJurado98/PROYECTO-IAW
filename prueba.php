<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <?php
    //CREATING THE CONNECTION
    $connection = new mysqli("localhost", "root", "2asirtriana", "proyecto");
    $connection->set_charset("uft8");
    //TESTING IF THE CONNECTION WAS RIGHT
    if ($connection->connect_errno) {
        printf("Connection failed: %s\n", $connection->connect_error);
        exit();
    }
    //MAKING A SELECT QUERY
    /* Consultas de selección que devuelven un conjunto de resultados */
    /* Pulsando en el codigo de cliente reenviara a una pagina que muestre todos
       los datos de ese cliente */
      $query="select * from clientes";
      
    if ($result = $connection->query($query)) {
        printf("<p>The select query returned %d rows.</p>", $result->num_rows);
    ?>

        <!-- PRINT THE TABLE AND THE HEADER -->
        <table style="border:1px solid black">
        <thead>
          <tr>
            <th>DNI</th>
            <th>Nombre</th>
            <th>apellidos</th>
            <th>domicilio</th>
            <th>telefono</th>
            <th>sexo</th>
            <th>cod_cita</th>
          </tr> 
            
        </thead>

    <?php
        //FETCHING OBJECTS FROM THE RESULT SET
        //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
        while($obj = $result->fetch_object()) {
            //PRINTING EACH ROW
            echo "<tr>";
              echo "<td>".$obj->dni."</td>";
              echo "<td>".$obj->nombre."</td>";
              echo "<td>".$obj->apellidos."</td>";
              echo "<td>".$obj->domicilio."</td>";
              echo "<td>".$obj->telefono."</td>";
              echo "<td>".$obj->sexo."</td>";
              echo "<td>".$obj->cod_cita."</td>";

            echo "</tr>";
        }
        //Free the result. Avoid High Memory Usages
        $result->close();
        unset($obj);
        unset($connection);
    } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
    
    ?>
</body>
</html>