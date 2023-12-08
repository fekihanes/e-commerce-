<?php
include_once "conn_bd.php";
session_start();

if (isset($_POST['login']) ) {
    $login = $_POST['login'];
}
if (isset($_POST['password']) ) {
    $password = $_POST['password'];
}
if (isset($_POST['email'])) {
    $email = $_POST['email'];
}
if (isset($_POST['phone'])) {
    $phone = $_POST['phone'];
}
if (isset($_POST['adresse'])) {
    $adresse = $_POST['adresse'];
}
$rec = $con->query("SELECT * FROM user WHERE login = '$login'");
if ($rec->num_rows > 0) {
    header("Location: erreur.php?ch=user name exist");
} else {
        $rec = $con->query("SELECT * FROM user WHERE  email = '$email'");
        if ($rec->num_rows > 0) {
            header("Location: erreur.php?ch=email exist");
        }else{
            $rec = $con->query("INSERT INTO user (login, email, phone, adresse, password, niv) VALUES ('$login', '$email', '$phone', '$adresse', '$password', 1)");
            if ($rec) {
                $_SESSION['lastname'] = $login;
                $_SESSION['niv'] = 1;
                header("Location: home.php");
            } else {
                // Handle other errors
                echo "Error adding user: " . $con->error;
            }
        }
}
?>
