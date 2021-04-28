<?php require 'inc/head.php'; ?>
<?php
unset($_SESSION['PHPSESSID']);
$_SESSION[] = [];
session_destroy();
header('location: index.php');
?>