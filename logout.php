<?php
session_start();
$_SESSION['lastname']=null;
$_SESSION['niv']=null;

header("Location:login.php");

?>