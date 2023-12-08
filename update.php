<?php
    session_start();
    if($_SESSION['niv']<2){
        header("Location:erreur.php?ch=cet page pour admin");
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
      section {
        max-width: 80%;
        height: 50%;
        margin: 50px auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: flex; 
    }
    .aform{
        width: 700px;
        text-align: center;
    }
    .ainput{
        margin-top: 25px;
        margin-left:20px ;
    }
    textarea{
        margin-top: 20px;
        width: 500px;
        height: 150px;
    }
    a img {
    height: 100px;
    width: 250px;
    }select{
        background-color: #343a40;
        color: #ffffff;
      }
    .aselect{
      background-color: white;
        color: #000;
margin-top: 20px;

}
    a img {
    height: 100px;
    width: 250px;
    }

      </style>
</head>
<body>
<?php include "navbar.php"?>

<section>
  
  <?php
        
        include_once "conn_bd.php";
        
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $result = mysqli_query($con ,"SELECT * FROM manga WHERE id = $id");
    
            if ( $row = mysqli_fetch_assoc($result)){
        }
        ?>   
          <section>      
            <form action="validaton_update.php?id=<?=$id?>" method="POST" class="aform">
                <label>nom : </label>
                <input type="text" name="nom" value="<?=$row['nom']?>" class="ainput">
                <br>
                <label>auteur :</label>
                <input type="text" name="auteur" value="<?=$row['auteur']?>" class="ainput">
                <br>
                <label>type : </label>
                <select name="type" id="type" class="aselect">
        <option value="manga" <?= ($row['type'] == 'manga') ? 'selected' : '' ?>>Manga</option>
        <option value="manhwa" <?= ($row['type'] == 'manhwa') ? 'selected' : '' ?>>Manhwa</option>
    </select>
                <br>
                <label>categories : </label>
                <select name="categories" class="aselect">
                    <option value="shonen" <?= ($row['categories'] == 'shonen') ? 'selected' : '' ?>>shonen</option>
                    <option value="seinen" <?= ($row['categories'] == 'seinen') ? 'selected' : '' ?>>seinen</option>
                    <option value="shojo" <?= ($row['categories'] == 'shojo') ? 'selected' : '' ?>>shojo</option>
                    <option value="Horror" <?= ($row['categories'] == 'Horror') ? 'selected' : '' ?>>Horror</option>
                    <option value="action" <?= ($row['categories'] == 'action') ? 'selected' : '' ?>>action</option>
                    <option value="Sport" <?= ($row['categories'] == 'Sport') ? 'selected' : '' ?>>Sport</option>
                    <option value="samourai" <?= ($row['categories'] == 'samourai') ? 'selected' : '' ?>>samourai</option>
                    <option value="isekai" <?= ($row['categories'] == 'isekai') ? 'selected' : '' ?>>isekai</option>
                    <option value="ecchi" <?= ($row['categories'] == 'ecchi') ? 'selected' : '' ?>>ecchi</option>
                    <option value="mika" <?= ($row['categories'] == 'mika') ? 'selected' : '' ?>>mika</option>
              </select>
                <br>
                <label>img "url* : </label>
                <input type="text" name="img" value="<?=$row['img']?>" class="ainput">
                <br>
                <label>prix : </label>
                <input type="text" name="prix" value="<?=$row['prix']?>" class="ainput">
                <br>
                <label>quantity :</label>
                <input type="text" name="quality" value="<?=$row['quality']?>" class="ainput">
                <br>
                <label>prom : </label>
                <input type="text" name="prom" value="<?=$row['prom']?>" class="ainput">
                <br>
                <label style="float:left;">description : </label>
                
                <textarea name="description" ><?=$row['description']?></textarea> 
                <br>
                <button class="btn btn-success my-2 my-sm-0" type="submit">update</button>
            </form>
            <?php
        }
        ?>

    </section>
    <script src="sc.js"></script>
  </body>
</html>
