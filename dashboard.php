<?php 

session_start();

require '_backend/functions.php';

if (!isset($_SESSION['login']) && !isset($_SESSION['ids']) && !isset($_SESSION['rls'])) {
    header("Location: login.php");
    exit();
}

if ($_SESSION['rls'] !== "a") {
    header("Location: profile.php");
    exit();
}

$login = false;

if (isset($_COOKIE['uid'])) {
    $login = cookieOpt($_COOKIE);
    $userDp = cekUser($_SESSION['ids']);
} elseif (isset($_SESSION['login'])) {
    $login = $_SESSION['login'];
    $userDp = cekUser($_SESSION['ids']);
}

$myuser = query("SELECT * FROM users WHERE id_users = '$_SESSION[ids]'")[0];

require('views/dashboard.view.php');

?>