<?php 

session_start();

require '_backend/functions.php';

if (!isset($_SESSION['login']) && !isset($_SESSION['idu']) && !isset($_SESSION['rls'])) {
    header("Location: login.php");
    exit();
}
 
if ($_SESSION['rls'] !== "u") {
    header("Location: dashboard.php");
    exit();
}

$login = false;

if (isset($_COOKIE['idu'])) {
    $login = cookieOpt($_COOKIE);
    $userDp = cekUser($_SESSION['idu']);
} elseif (isset($_SESSION['login'])) {
    $login = $_SESSION['login'];
    $userDp = cekUser($_SESSION['idu']);
}

$myuser = query("SELECT * FROM users WHERE id_users = '$_SESSION[idu]'")[0];

?>