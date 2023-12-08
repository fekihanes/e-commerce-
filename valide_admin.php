<?php
  include_once "conn_bd.php";
  session_start();
  $login=$_POST['login'];
  $password=$_POST['password'];
  $rec=mysqli_query($con, "SELECT * FROM user WHERE (login='$login' and password='$password')or (email='$login' and password='$password') ");
  if($u = mysqli_fetch_assoc($rec)){
    $_SESSION['lastname']=$u['login'];
    $_SESSION['niv']=$u['niv'];
    header("Location:home.php");
  }else{
    header("Location:erreur.php?ch=account not exist");
    }
  

?>