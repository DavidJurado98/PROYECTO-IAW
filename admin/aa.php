<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>


<html>
<head><title>CONSULTA</title></head>
<body>
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
if ($result = $connection->query("select * from servicio;")) {

    printf("<p>The select query returned %d rows.</p>", $result->num_rows);

?>

    <!-- PRINT THE TABLE AND THE HEADER -->
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
    <tbody>
<?php

    //FETCHING OBJECTS FROM THE RESULT SET
    //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
    while($obj = $result->fetch_object()) {
        //PRINTING EACH ROW
        echo"<tr>";
        echo"<th scope='row'>$obj->cod_servicio</th>";
        echo"<td>$obj->servicio</td>";
        echo"<td>$obj->precio</td>";
        echo"<td><a href=td><a href='editar_alumnos.php?n=Manuel&a=López&email=manuellopez@gmail.com'>
                <img src='lapiz.png'>
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

