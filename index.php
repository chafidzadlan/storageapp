<?php 

session_start();

require '_backend/functions.php';

$login = false;

if (isset($_COOKIE['idu'])) {
    $login = cookieOpt($_COOKIE);
    $userDp = cekUser($_SESSION['idu']);
} elseif (isset($_SESSION['login'])) {
    $login = $_SESSION['login'];
    $userDp = cekUser($_SESSION['idu']);
}

$myuser = query("SELECT * FROM users WHERE id_user = '$_SESSION[idu]'")[0];
$folders = query("SELECT folders.id_folder, folders.id_parent, folders.name, folders.created_at, users.username FROM folders, users WHERE folders.id_user = users.id_user");

$error = true;

if (isset($_POST['folder'])) {
    $error = createFolder($_POST, null);

    if (!$error['error']) {
        echo "<script>
        setTimeout(function() {
            document.location.href='index.php'
        }, 3000);
        </script>";
    }
}

require('views/index.view.php');

?>
