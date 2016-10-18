<?php
session_start();
if(!isset($_SESSION["UID"])){
    header("Location:index.php");
}
?>

<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">>

<link rel = "stylesheet" type="text/css" href="../CSS/base.css">
<meta charset="UTF-8">
<title>Cale's cool Website</title>
<link rel = "stylesheet" type="text/css" href="../CSS/base.css">

<body>
<header><?php include  '../includes/header.php'?></header>
<nav><?php include '../includes/nav.php' ?></nav>
<main>
    <H3>members page</H3>
</main>
<footer><?php include '../includes/footer.php'?> </footer>
</body>
</html>