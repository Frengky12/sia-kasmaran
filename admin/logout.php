<?php

session_start();

if (!isset($_SESSION["login"])) {
    echo "<script>
            document.location.href = 'login.php';
          </script>";
    exit;
}

// menghapus session
$_SESSION = [];

session_unset();
session_destroy();
header('Location:login.php');
