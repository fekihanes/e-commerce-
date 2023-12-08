<?php 
   session_start();
   include_once "conn_bd.php";

   //supprimer les produits
   //si la variable del existe
   if(isset($_GET['del'])){
    $id_del = $_GET['del'] ;
    //suppression
    unset($_SESSION['panier'][$id_del]);
   }
   if(isset($_GET['plus'])){
    $id_plus = $_GET['plus'] ;
    $_SESSION['panier'][$id_plus]++ ;
  }
  if(isset($_GET['minus'])){
    $id_minus = $_GET['minus'] ;
    if($_SESSION['panier'][$id_minus]==1){
      unset($_SESSION['panier'][$id_minus]);
    }else{
    $_SESSION['panier'][$id_minus]-- ;
    }
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>panier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
      li{
        margin-left: 20px;
      }
      select{
        background-color: #343a40;
        color: #ffffff;
      }
      </style>
</head>
<body >
<?php include "navbar.php"?>


  <section class="panier">
        <table>
            <tr>
                <th></th>
                <th>Nom</th>
                <th >Prix</th>
                <th >Quantité</th>
                <th >Action</th>
            </tr>
            <?php 
              $total = 0 ;
              if(isset($_SESSION['panier'])){
              $ids = array_keys($_SESSION['panier']);
              //s'il n'y a aucune clé dans le tableau
              if(empty($ids)){
                echo "Votre panier est vide";
              }else {
                //si oui 
                $products = mysqli_query($con, "SELECT * FROM manga WHERE id IN (".implode(',', $ids).")");

                //lise des produit avec une boucle foreach
                foreach($products as $product):
                    $total = $total + $product['prix'] * $_SESSION['panier'][$product['id']] -($product['prix'] * $_SESSION['panier'][$product['id']]*$product['prom']/100)  ;
                ?>
                <tr>
                    <td><img src="<?=$product['img']?>"></td>
                    <td><?=$product['nom']?></td>
                    <td style="margin-left: 20px ">prix :  
                      <?php 
                          if($product['prom'] != 0) {
                              echo "<strike style='color:red '>" . $product['prix'] . "</strike> " . ($product['prix'] -$product['prix'] * $product['prom'] / 100) . " DT";
                          } else {
                              echo $product['prix'] . " DT";
                          }
                      ?>
                      </td>
                    <td><?=$_SESSION['panier'][$product['id']] ?></td>
                    <td>
                      <a href="panier.php?plus=<?=$product['id']?>"><img  class="imgp" src="icon/plus.png"></a>
                      <a href="panier.php?minus=<?=$product['id']?>"><img  class="imgp" src="icon/minus.png"></a>
                      <a href="panier.php?del=<?=$product['id']?>"><img  class="imgp" src="icon/delete.png"></a>
                  </td>
                </tr>
            <?php endforeach ;}} ?>

            <tr class="total">
                <th><h2>Total : <?=$total?>DT</h2></th>
                <?php
                  if(empty($ids)){
                    echo"<th > <button class='btn btn-info' style='margin-left:1300%;' disabled><a href='login.php'>pay</a></button></th>";
                  }
                  elseif(isset($_SESSION['lastname'])){
                    echo"<th > <button class='btn btn-info' style='margin-left:1300%;' ><a href='form_pay.php'>pay</a></button></th>";
                  } else{
                    echo"<th > <button class='btn btn-info' style='margin-left:1300%;'  ><a href='login.php'>pay</a></button></th>";
                  }
                ?>
            </tr>
        </table>            
  </section>
  <script src="sc.js"></script>
</body>
</html>
