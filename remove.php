<?php
session_start() ;
include_once "conn_bd.php";
 if($_SESSION['niv']<2){
  header("Location:erreur.php?ch=cet page pour admin");
}
if(isset($_GET['cause']) && isset($_GET['id'])){
  $id=$_GET['id'];
    $cause=$_GET['cause'];
    $result = mysqli_query($con, "UPDATE  orders SET etap='refuses' , cause='$cause' WHERE id=$id ");
header("Location: erreur.php?ch=update successfully");
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
      a {
        text-decoration: none; 
        color: inherit;
        display: block; 
      }
      li{
        margin-left: 20px;
      }
      select{
        background-color: #343a40;
        color: #ffffff;
      }
      </style>
</head>
<body>
  <?php include "navbar.php"?>
<section>
      <form action="" method=GET >
        <input type="hidden" name="id" value="<?=$_GET['id']?>">
        <h1> donner la cause de refuses</h1>
        <input type="text" name="cause" placeholder="donner la cause de refuses " id="cause" onblur="myFunctioncause()"><BR>
        <button type="submit" class="btn btn-success" style="margin-top: 10px" disabled id="submit">submit</button>
      </form>
</section>
<script >function myFunctioncause(){
    var cause = document.getElementById('cause').value;
    if(cause!="" ){
        document.getElementById('submit').disabled = false;
    }
}</script>
</body>
</html>

