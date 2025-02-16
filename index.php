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
$folders = query("SELECT folders.id_folder, folders.id_parent, folders.folder, folders.created_at, users.username FROM folders, users WHERE folders.id_user = users.id_user")[0];
$files = query("SELECT files.id_file, files.file, files.size, files.created_at, files.id_user, files.id_folder, users.username FROM files, users, folders WHERE files.id_user = users.id_user AND files.id_folder = folders.id_folder");

if (isset($_POST['folder'])) {
    $folder = createFolder($_POST, null);

    if (!$folder['error']) {
        echo "<script>
        setTimeout(function() {
            document.location.href='index.php'
        }, 3000);
        </script>";
    }
}


require('views/index.view.php');

?>
