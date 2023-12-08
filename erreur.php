<?php 
 session_start() ;
 if(isset($_GET['ch'])){
  $ch = $_GET['ch'] ; 
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$ch?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
h1 {
  margin-top: 7%;
  font-size:60px;
  text-align: center;
  color:red;
}
h3 {
  margin-top: 10%;
  text-align: center;
}
      a {
        text-decoration: none; 
        color: inherit;
        display: block; 
      }
      li{
        margin-left: 20px;
      }select{
        background-color: #343a40;
        color: #ffffff;
      }
</style>
</head>
<body>
    <?php include "navbar.php"?>
    <h1><?=$ch;?></h1>
    <script src="sc.js"></script>

</body>
</html>
