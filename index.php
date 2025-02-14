<?php 

session_start();

require '_backend/functions.php';

$login = false;

if (isset($_COOKIE['uid'])) {
    $login = cookieOpt($_COOKIE);
    $userDp = cekUser($_SESSION['ids']);
} elseif (isset($_SESSION['login'])) {
    $login = $_SESSION['login'];
    $userDp = cekUser($_SESSION['ids']);
}

require('views/index.view.php');

?>
