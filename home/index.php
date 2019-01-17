<?php

  //Open the session
  session_start();

  if (isset($_SESSION["email"])) {
    //SESSION ALREADY CREATED
    //SHOW SESSION DATA
    var_dump($_SESSION);
  
  if ($_SESSION["email"] == "admin@gmail.com") {
    header("Location: admin.php");
    
  } else {
    header("Location: user.php");
  }
  
  
  } 
  
  
  else {
    session_destroy();
   header("Location: home.php");    
  }


 ?>
