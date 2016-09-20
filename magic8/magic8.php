<?php

    $names  = array("Jim", "Steve", "Bob", "Ryan");


$names  = array("Name"=>"Steve", "Age"=>"21");
echo $names["Name"];

    $names[0] = "Bob";
    $names[1] = "Cale";
    $names[2] = "Monica";
    $names[3] = "Jim";

    echo  $names[1];

    exit();

?>
<!doctype html>
<html lang="en">

<link rel = "stylesheet" type="text/css" href="../CSS/base.css">
<head>
    <title>Cale's cool Website</title>
</head>
<body>
<header> <?php include  '../inclues/header.php'?></header>
<nav><?php include '../includes/nav.php' ?></nav>
<main>
    <h3>Magic 8 Ball</h3>

   </main>


<footer><?php include '../includes/footer.php'?> </footer>
</body>
</html>