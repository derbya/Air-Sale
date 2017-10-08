<?php
session_start();
$_SESSION['login'] = "";
$_SESSION['admin'] = false;
header("Location: index.html");
echo ("why did you leave? :( " . "<html><body><a href='index.html'>HOME</a></body></html>")
?>
