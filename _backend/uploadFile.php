<?php 

session_start();

require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $error = createFile($id);

    if ($error['error']) {
        echo "Error: " . $error['message'];
    } else {
        echo "
        <script>
        setTimeout(function() {
            document.location.href='../index.php'
        }, 3000);
        </script>";
    }
}


?>