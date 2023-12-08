<?php
session_start();

if ($_SESSION['lastname'] != null) {
    if(isset($_POST['login'])){
        $login = $_POST['login'];
    }
    
    if(isset($_POST['id'])){
        $id = $_POST['id'];
    }
    if(isset($_POST['value'])){
        $value = $_POST['value'];
    }
    include_once "conn_bd.php";    
    $result = mysqli_query($con, "SELECT * FROM rate WHERE login='$login' AND id_product='$id'");

    $row = mysqli_fetch_assoc($result);

    if($row == null){
        $rec = $con->query("INSERT INTO rate (login, id_product, note) VALUES ('$login', '$id', $value)");
    } else {
        $rec = $con->query("UPDATE rate SET note='$value' WHERE login='$login' AND id_product='$id'");
    }

    header("location:more_info.php?id=$id");
    
} else {
    header("location:login.php");
}
?>
