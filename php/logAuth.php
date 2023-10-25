<?php
include('disconnect.php');
session_start();
session_destroy();
session_unset();
unset($_SESSION['access_key']);
header("Location:../index.php");
?>
