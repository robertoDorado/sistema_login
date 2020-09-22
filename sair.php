<?php
session_start();

unset($_SESSION['covid']);

header("Location: index.php");
?>