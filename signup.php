<?php 

session_start();

require '_backend/functions.php';

if (isset($_SESSION['login']) && isset($_SESSION['ids']) && isset($_SESSION['rls'])) {
  header("Location: dashboard.php");
  exit();
}

$error = true;

if (isset($_POST['signup'])) {
  $error = signup($_POST, NULL);
  
  if (!$error['error']) {
    echo "<script>
    setTimeout(function() {
      document.location.href='index.php'
    }, 3000);
    </script>";
  }
}
  
require('views/signup.view.php');

?>