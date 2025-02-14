<?php 

session_start();

require '_backend/functions.php';

if (isset($_COOKIE['id']) && isset($_COOKIE['uid'])) {
    cookie($_COOKIE);
}

if (isset($_SESSION['login']) && isset($_SESSION['ids']) && isset($_SESSION['rls'])) {
    header("Location: dashboard.php");
    exit();
}

if (isset($_POST['login'])) {
    $login = login($_POST);
}

require ('views/login.view.php');

?>