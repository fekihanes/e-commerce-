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
    <title>ajoute un article</title>
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
        display: flex; /* Use flexbox */
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
      </style>
</head>
<body>
<?php include "navbar.php"?>

<section>
  
  <?php
        
        include_once "conn_bd.php";
        
       
        ?>   
          <section>      
            <form action="validaton_add.php" method="POST" class="aform">
                <label>nom : </label>
                <input type="text" name="nom" id="nom" onblur="myFunction_add_article()" placeholder="nom de article" class="ainput">
                <br>
                <label>auteur :</label>
                <input type="text" name="auteur" id="auteur" onblur="myFunction_add_article()" placeholder="nom de auteur" class="ainput">
                <br>
                <label>type : </label>
                <select name="type" class="aselect">
        <option value="manga">Manga</option>
        <option value="manhwa" >Manhwa</option>
    </select>
                <br>
                <label>categories : </label>
                <select name="categories"  class="aselect">
                    <option value="shonen" >shonen</option>
                    <option value="seinen" >seinen</option>
                    <option value="shojo">shojo</option>
                    <option value="Horror">Horror</option>
                    <option value="action">action</option>
                    <option value="Sport">Sport</option>
                    <option value="samourai">samourai</option>
                    <option value="isekai">isekai</option>
                    <option value="ecchi">ecchi</option>
                    <option value="mika">mika</option>
                  </select>
                <br>
                <label>img "url* : </label>
                <input type="text" name="img" id="img" onblur="myFunction_add_article()" placeholder="url de image"class="ainput">
                <br>
                <label>prix : </label>
                <input type="number" name="prix" id="prix" onblur="myFunction_add_article()"placeholder="prix"class="ainput">
                <br>
                <label>Quantité :</label>
                <input type="number" name="quality" id="quality" onblur="myFunction_add_article()" placeholder="Quantité"class="ainput">
                <br>
                <label>prom : </label>
                <input type="number" name="prom" id="prom" onblur="myFunction_add_article()" placeholder="prom"class="ainput">
                <br>
                <label style="float:left;">description : </label>
                
                <textarea name="description" id="description" onblur="myFunction_add_article()" placeholder="description"></textarea> 
                <br>
                <button class="btn btn-success my-2 my-sm-0" type="submit" id="submit"  disabled>ajoute</button>
            </form>
            <?php
        
        ?>

    </section>
    <script src="sc.js"></script>
  </body>
</html>
