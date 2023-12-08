<?php

    include_once "conn_bd.php";
    session_start() ;
    if($_SESSION['niv']<2){
     header("Location:erreur.php?ch=cet page pour admin");
   }
   
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $result = mysqli_query($con, "UPDATE  orders SET etap='valide' WHERE id=$id ");
        header("Location: erreur.php?ch=update successfully");
    }
   



?>