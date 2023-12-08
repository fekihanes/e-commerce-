<?php
session_start();
include_once "conn_bd.php";

$ids = array_keys($_SESSION['panier']);
$products = mysqli_query($con, "SELECT * FROM manga WHERE id IN (" . implode(',', $ids) . ")");
$test = 1;
$ch = "";
$idsStr = "";
$qtysStr = "";

foreach ($products as $product) {
    $id = $product['id'];
    if ($product['quality'] < $_SESSION['panier'][$id]) {
        $test = 0;
        $ch = "L'article {$product['nom']} a un stock de {$product['quality']} et vous avez commandé {$_SESSION['panier'][$id]} exemplaire(s).<br>";
    } else {
        $idsStr .= $product['id'] . ',';
        $qtysStr .= $_SESSION['panier'][$id] . ',';
        $ret = $product['quality'] - $_SESSION['panier'][$id];
        $tph = "UPDATE manga SET quality=$ret WHERE id=$id";
        mysqli_query($con, $tph);
        unset($_SESSION['panier'][$id]);
    }
}

if ($test == 1) {  

    $rec = mysqli_query($con, "INSERT INTO orders (login, ids, qty, date) VALUES ('" . $_SESSION['lastname'] . "', '$idsStr', '$qtysStr', '" . date('Y/m/d') . "')");

    header("Location: erreur.php?ch=pay successfully");
} else {
    header("Location: erreur.php?ch=$ch");
}
?>
