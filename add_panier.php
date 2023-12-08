<?php
 include_once "conn_bd.php";
 if(!isset($_SESSION)){
    session_start();
 }
 if(!isset($_SESSION['panier'])){
    $_SESSION['panier'] = array();
 }
 if(isset($_GET['loca']) ){
    $loca = $_GET['loca'] ;
}

  if(isset($_GET['id']) ){
    $id = $_GET['id'] ;
    $produit = mysqli_query($con ,"SELECT * FROM manga WHERE id = $id") ;
    if(isset($_SESSION['panier'][$id])){// si le produit est déjà dans le panier
        $_SESSION['panier'][$id]++; //Représente la quantité 
    }else {
        //si non on ajoute le produit
        $_SESSION['panier'][$id]= 1 ;
    }
    if(isset($_GET['max']) ){
        header("Location:".$loca."&max=".$_GET['max']);
    }else{
   header("Location:".$loca);
    }

  }