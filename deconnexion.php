<?php
session_start();
session_destroy();
$_SESSION['loggedin'] = 0;
header("Location: index.php");
