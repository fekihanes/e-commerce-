<?php
session_start();
include_once "conn_bd.php";
if($_SESSION['niv']!=3){
    header("Location:erreur.php?ch=XD");
}
if(isset($_POST['login'])){
    $login=$_POST['login'];
    $result = mysqli_query($con ,"SELECT * FROM user WHERE login ='$login' or email='$login'");  
    $row = mysqli_fetch_assoc($result);
    if($row==NULL){
        header("Location:erreur.php?ch=account dont exist");
    }else{
        $result = $con->query("UPDATE user SET niv='2' WHERE login ='$login' or email='$login'");
        
        header("Location: erreur.php?ch=update successfully");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <style>
      a {
        text-decoration: none; 
        color: inherit;
        display: block; 
      }
      li{
        margin-left: 20px;
      }
      a img {
      height: 100px;
      width: 250px;
      }


    
    .ainput{
        margin-top: 25px;
        margin-bottom:20px ;
    }

    select{
        background-color: #343a40;
        color: #ffffff;
      }

</style>
</head>
<body>
<?php include "navbar.php"?>

<section style="text-align: center;margin-top: 7%;">      
            <h1 style="color: red; text-align: center;">ajoute admin</h1><br>
            <form action="" method="POST" style=" text-align: center;">
                <h2>login : 
                <input type="text" name="login" class="ainput" placeholder="tap email or user name">
                </h2><br>
                
                <button class="btn btn-success my-2 my-sm-0" type="submit">update</button>
            </form>
            
    </section>
    <script src="sc.js"></script>
  </body>
</html>
