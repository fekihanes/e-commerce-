<?php 
      $con = mysqli_connect("localhost","root","","mix_manga");
   if(!$con) {
    die('Erreur :'.mysqli_connect_error()) ;
   }
  
?>