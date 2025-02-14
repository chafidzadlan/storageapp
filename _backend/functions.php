<?php 

function dbConn() {
    $hostDB = "localhost";
    $userDB = "root";
    $passDB = "root";
    $nameDB = "storageapp";
    return mysqli_connect($hostDB, $userDB, $passDB, $nameDB);
}

?>