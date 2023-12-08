<?php
include_once "conn_bd.php";
session_start();

if ($_SESSION['niv'] >= 2) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    if (isset($_POST['nom'])) {
        $nom = $con->real_escape_string($_POST['nom']);
    }
    if (isset($_POST['auteur'])) {
        $auteur = $con->real_escape_string($_POST['auteur']);
    }
    if (isset($_POST['type'])) {
        $type = $con->real_escape_string($_POST['type']);
    }
    if (isset($_POST['categories'])) {
        $categories = $con->real_escape_string($_POST['categories']);
    }
    if (isset($_POST['img'])) {
        $img = $con->real_escape_string($_POST['img']);
    }
    if (isset($_POST['prix'])) {
        $prix = $con->real_escape_string($_POST['prix']);
    }

    if (isset($_POST['quality'])) {
        $quality = $con->real_escape_string($_POST['quality']);
    }
    if (isset($_POST['prom'])) {
        $prom = $con->real_escape_string($_POST['prom']);
    }
    if (isset($_POST['description'])) {
        $description = $con->real_escape_string($_POST['description']);
    }
    $result = $con->query("UPDATE manga SET nom='$nom', auteur='$auteur', type='$type', categories='$categories', img='$img', prix='$prix', quality='$quality', prom='$prom', description='$description' WHERE id=$id");
        
    header("Location: erreur.php?ch=update successfully");
    
} else {
    header("Location: erreur.php?ch=cet page pour admin");
}
?>
