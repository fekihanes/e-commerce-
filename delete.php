<?php
include_once "conn_bd.php";
session_start();

if ($_SESSION['niv']>=2) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    $result = $con->query("DELETE FROM manga WHERE id = $id");

    header("Location: erreur.php?ch=delete successfully");
} else {
    header("Location: erreur.php?ch=cet page pour admin");
}
?>
