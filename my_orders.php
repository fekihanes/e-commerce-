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
      }
      select{
        background-color: #343a40;
        color: #ffffff;
      }
      .imgpar{
        height: 120px;
        width: 80px;
      }
      table{
        width: 70%;
      }
      .imgac{
        height: 40px;
        width: 40px;
      }

      </style>
</head>
<body>
    <?php include "navbar.php"?>

    <div style="margin-left: 100px">
        <div style="margin-top: 7%; float: left;">
            <form method="GET" action="my_orders.php">
                <label>date</label><br>
                <input type="date" name="date"><br>
                <button type="submit" class="btn btn-outline-success" style="margin-top: 10px">Search</button>
            </form>
            <div>
                <button type="submit" class="btn btn-outline-success" style="margin-top: 10px; width: 80px;"><a href="my_orders.php?login=valide">liste de valide</a></button>
                <button type="submit" class="btn btn-outline-danger" style="margin-top: 10px ;width: 80px;"><a href="my_orders.php?login=refuses">liste de refusés</a></button>
                <button type="submit" class="btn btn-outline-info" style="margin-top: 10px; width: 120px;"><a href="my_orders.php?login=au cours de traitement">au cours de traitement</a></button>
            </div>
        </div>

        <div class="container" style="margin-top: 7%;  float:left;margin-left: 50px">
            <?php
            include_once "conn_bd.php";
            $Data = array();
            $login = isset($_GET['login']) ? mysqli_real_escape_string($con, $_GET['login']) : '';
            $date = isset($_GET['date']) ? mysqli_real_escape_string($con, $_GET['date']) : '';

            if ($login != '') {
                $reqorders = mysqli_prepare($con, "SELECT * FROM orders WHERE login=? and etap=?");
                mysqli_stmt_bind_param($reqorders, 'ss', $_SESSION['lastname'], $login);
                mysqli_stmt_execute($reqorders);
                $result = mysqli_stmt_get_result($reqorders);
            } elseif ($date != '') {
                $reqorders = mysqli_prepare($con, "SELECT * FROM orders WHERE login=? and date=?");
                mysqli_stmt_bind_param($reqorders, 'ss', $_SESSION['lastname'], $date);
                mysqli_stmt_execute($reqorders);
                $result = mysqli_stmt_get_result($reqorders);
            } else {
                $result = mysqli_query($con, "SELECT * FROM orders WHERE login='{$_SESSION['lastname']}' ORDER BY date DESC");
            }

            while ($row = mysqli_fetch_assoc($result)) {
                $Data[] = $row;
            }

            if (count($Data) < 1) {
                ?>
                <h2 style="margin-left: 30%">Orders not exist</h2>
                <?php
            }

            foreach ($Data as $row) {
                $qty = $row["qty"];
                $ids = $row["ids"];
                ?>
                <table style="color: #000;">
                    <tr style="border-bottom: 0px">
                        <td style="color: #000; border-top: 0px;"><h3><?= $row['login'] ?></h3></td>
                        <td style="color: #000; border-top: 0px;"><h3><?= $row['date'] ?></h3></td>
                    </tr>
                    <tr>
                        <td style="color: <?php
                        if ($row['etap'] == "au cours de traitement") {
                            echo '#37a6ff';
                        } elseif ($row['etap'] == "valide") {
                            echo '#32890A';
                        } else {
                            echo 'red';
                        }
                        ?>; border-top: 0px;"><h3><?= $row['etap'] ?></h3></td>
                        
                        <td style="color: red; border-top: 0px;"><h3><?php
                                                                            if($row['cause'] !=null ){
                                                                                echo "cause: " . $row['cause'];
                                                                            }
                                                                        ?>  
                        </h3></td>
                    </tr>
                </table>

                <br>
                <table style="margin-bottom: 100px">
                    <tr>
                        <th></th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                    </tr>
                    <?php
                    while ($ids != "") {
                        $pos = strpos($ids, ',');
                        $partie = substr($ids, 0, $pos);
                        $ids = substr($ids, $pos + 1);
                        $reqManga = mysqli_query($con, "SELECT * FROM manga WHERE id ='$partie'");
                        $row1 = mysqli_fetch_assoc($reqManga);
                        ?>
                        <tr>
                            <td><img src="<?= $row1['img'] ?>" alt="Image" class="imgpar"></td>
                            <td><?= $row1['nom'] ?></td>
                            <td>
                                <?php
                                if ($row1['prom'] != 0) {
                                    echo "<strike style='color:red '>" . $row1['prix'] . "</strike> " . ($row1['prix'] - $row1['prix'] * $row1['prom'] / 100) . " DT";
                                } else {
                                    echo $row1['prix'] . " DT";
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                $pos = strpos($qty, ',');
                                $partie = substr($qty, 0, $pos);
                                $qty = substr($qty, $pos + 1);
                                echo $partie;
                                ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
                <br>
            <?php
            }
            ?>
        </div>
    </div>
    <script src="sc.js"></script>
</body>
</html>