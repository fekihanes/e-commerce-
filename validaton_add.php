<?php
include_once "conn_bd.php";
session_start();

if ($_SESSION['niv'] >= 2) {
    if (isset($_POST['nom'])) {
        $nom = $_POST['nom'];
    }
    if (isset($_POST['auteur'])) {
        $auteur = $_POST['auteur'];
    }
    if (isset($_POST['type'])) {
        $type = $_POST['type'];
    }
    if (isset($_POST['categories'])) {
        $categories = $_POST['categories'];
    }
    if (isset($_POST['img'])) {
        $img = $_POST['img'];
    }
    if (isset($_POST['prix'])) {
        $prix = $_POST['prix'];
    }
    if (isset($_POST['quality'])) {
        $quality = $_POST['quality'];
    }
    if (isset($_POST['prom'])) {
        $prom = $_POST['prom'];
    }
    if (isset($_POST['description'])) {
        $description = $_POST['description'];
    }
    $stmt = $con->prepare("INSERT INTO manga (img, nom, type, description, categories, prix, quality, prom, auteur, date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("ssssssssss", $img, $nom, $type, $description, $categories, $prix, $quality, $prom, $auteur, date('Y/m/d'));
    $success = $stmt->execute();
    if ($success) {
        header("Location: erreur.php?ch=add successfully");
    } else {
        header("Location: erreur.php?ch=error in query execution");
    }
    $stmt->close();
} else {
    header("Location: erreur.php?ch=cet page pour admin");
}
?>
