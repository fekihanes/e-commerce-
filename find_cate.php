<?php 
 session_start() ;
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
      }select{
        background-color: #343a40;
        color: #ffffff;
      }
      </style>
</head>
<body>
<?php include "navbar.php"?>

    <section>

        <?php
        include_once "conn_bd.php";
        
        $Data = array();
        $reqManga = mysqli_query($con, "SELECT * FROM manga WHERE categories LIKE '{$_GET["categories"]}'  order by date desc");

        if ($reqManga) {
            while ($row = mysqli_fetch_assoc($reqManga)) {
                $Data[] = $row;
            }
        }

        if(count($Data) < 1){
            ?>
            <p class="vide_message">La store est vide.</p>
            <?php
        }

        foreach($Data as $row) {
        ?>         
            <div class="<?php echo ($row['prom'] != 0) ? 'boxprom' : 'box'; ?>">
            <a href="more_info.php?id=<?=$row['id']?>">
              <img class="img_principal" src="<?=$row['img']?>" >
              <div><h6>nom :  <?=$row['nom']?></h6></div>
              <div><h6>Quantité :  <?=$row['quality']?></h6></div>
              <div><h6>categories :  <?=$row['categories']?></h6></div>

              <div>
                <?php
                    $tab = array();
                    $productId = isset($row['id']) ? $row['id'] : null;

                    if ($productId !== null) {
                        $rec1 = mysqli_query($con, "SELECT * FROM rate WHERE id_product=$productId");

                        if ($rec1) {
                            while ($rows = mysqli_fetch_assoc($rec1)) {
                                $tab[] = $rows;
                            }
                        }

                        // Check if the function exists before declaring it
                        if (!function_exists('avg')) {
                            function avg($tab) {
                                $res = 0;
                                $count = count($tab);

                                if ($count > 0) {
                                    foreach ($tab as $row) {
                                        $res += $row['note'];
                                    }
                                    return $res / $count;
                                } else {
                                    return 0;
                                }
                            }
                        }
                    }
                ?>
                <h4 style="margin-left: 20px "><?= (avg($tab)) ?> &#x2605;</h4>
                </div>

              <div><h4 style="margin-left: 20px ">prix :  
                    <?php 
                        if($row['prom'] != 0) {
                            echo "<strike style='color:red '>" . $row['prix'] . "</strike> " . ($row['prix'] -$row['prix'] * $row['prom'] / 100) . " DT";
                          } else {
                            echo $row['prix'] . " DT";
                          }
                          ?>
                    </h4>
                </div>
            </a>

                  <a class="delete_btn" href="add_panier.php?id=<?=$row['id']?>&loca=find_cate.php?categories=<?=$_GET['categories']?>">
                    <img src="icon/plus.png">
                  </a>
                  <?php
                  if(isset($_SESSION['niv']))
                   if( $_SESSION['niv']>=2){
                    echo("<button class='btn btn-warning my-2 my-sm-0'><a href='update.php?id={$row['id']}'>update</a></button>");
                    echo("<button class='btn btn-danger my-2 my-sm-0'style='margin-left: 20px;'><a href='delete.php?id={$row['id']}'>delete</a></button>");

                   }
                  ?>
            </div>
        <?php
        }
        ?>

    </section>
    <script src="sc.js"></script>
</body>
</html>
