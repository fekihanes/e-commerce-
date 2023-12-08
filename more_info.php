<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f8f9fa;
    }

    nav {
        background-color: #343a40;
    }

    section {
        max-width: 80%;
        height: 500px;
        margin: 50px auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: flex; 
    }

    img.img_principal {
        height: 450px;
        width: 300px;
        border-radius: 8px;
        margin: 0 20px 20px 0; 
    }

    .box {
        text-align: left;
        margin-left: 50px !important; 
    }

    .box div {
        margin-bottom: 10px;
    }
    a img {
    height: 100px;
    width: 250px;
    }
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


    <?php
    include_once "conn_bd.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $result = mysqli_query($con ,"SELECT * FROM manga WHERE id = $id");

        if ( $product = mysqli_fetch_assoc($result)) {
    ?>
    <section>
            <img src="<?= $product['img'] ?>" class="img_principal">
            <div class="box">
                <div><b>nom</b> <?= $product['nom'] ?></div>
                <div><b>auteur</b> <?= $product['auteur'] ?></div>
                <div><b>categories</b> <?= $product['categories'] ?></div>
                <div><b>prix</b> <?= $product['prix'] ?> DT</div>
                <div><b>quality</b> <?= $product['quality'] ?></div>
                <div><b>description</b> <?= $product['description'] ?></div>
                <div>
                <?php
                    $lastname = isset($_SESSION['lastname']) ? $_SESSION['lastname'] : null;
                    $rec = mysqli_query($con, "SELECT * FROM rate WHERE login='$lastname' AND id_product='$id'");                    
                   $row = mysqli_fetch_assoc($rec);
                   $Data = array();
                    $rec1 = mysqli_query($con, "SELECT * FROM rate WHERE id_product='$id'");
                    if ($rec1) {
                      while ($rows = mysqli_fetch_assoc($rec1)) {
                        $Data[] = $rows;
                      }
                    }
                    function sum($tab,$e){
                      $nb=0;
                      foreach($tab as $row) {
                        if($row['note']==$e){
                          $nb++;
                        }
                      }
                      return $nb;
                    }
                    function avg($tab){
                      $res=0;
                      foreach($tab as $row) {
                        $res+=$row['note'];                        
                      }
                      $count = count($tab);
                      return $count > 0 ? $res / $count : 0;
                      
                    }
                  ?>
                  <h1 style="padding: 50px; float:left;";><?=(avg($Data))?></h1>
                <div style="margin-left: 200px; ">
                  
                  <form id="myForm" method="POST" action="donnerete.php">                   
                  <input type="hidden" name="login" value="<?= isset($_SESSION['lastname']) ? $_SESSION['lastname'] : '' ?>">
                  <input type="hidden" name="id" value="<?= $product['id'] ?>"> 
                  <label>1</label><input type="radio" name="value" value="1" onclick="submitForm()" <?= isset($row) ? ($row['note'] == 1 ? 'checked' : '') : '' ?> style="margin-left: 8px; margin-right: 8px;"><?=sum($Data,1)?><br>
                    <label>2</label><input type="radio" name="value" value="2" onclick="submitForm()" <?= isset($row) ? ($row['note'] == 2 ? 'checked' : '') : '' ?> style="margin-left: 8px; margin-right: 8px;"><?=sum($Data,2)?><br>
                    <label>3</label><input type="radio" name="value" value="3" onclick="submitForm()" <?= isset($row) ? ($row['note'] == 3 ? 'checked' : '') : '' ?> style="margin-left: 8px; margin-right: 8px;"><?=sum($Data,3)?><br>
                    <label>4</label><input type="radio" name="value" value="4" onclick="submitForm()"<?= isset($row) ? ($row['note'] == 4 ? 'checked' : '') : '' ?> style="margin-left: 8px; margin-right: 8px;"><?=sum($Data,4)?><br>
                    <label>5</label><input type="radio" name="value" value="5" onclick="submitForm()" <?= isset($row) ? ($row['note'] == 5 ? 'checked' : '') : '' ?> style="margin-left: 8px; margin-right: 8px;"><?=sum($Data,5)?><br>

                  </form>
                </div>
                </div>
                <div>
                    <button type="button" class="btn btn-outline-secondary">
                        <a class="btn" href="add_panier.php?id=<?= $product['id'] ?>&loca=more_info.php?id=<?= $product['id'] ?>">ajoute ou panier</a> 
                    </button>
                    <?php
                  if(isset($_SESSION['niv']))
                   if( $_SESSION['niv']>=2){
                    echo("<button class='btn btn-warning my-2 my-sm-0'style='margin-left: 20px;'><a <a class='btn' href='update.php?id={$product['id']}'>update</a></button>");
                    echo("<button class='btn btn-danger my-2 my-sm-0'style='margin-left: 20px;'><a <a class='btn' href='delete.php?id={$product['id']}'>delete</a></button>");

                   }
                  ?>
                </div>
                
            </div>
    <?php
        } 
    }
    ?>
    </section>    
    <script src="sc.js"></script>
</body>

</html>
