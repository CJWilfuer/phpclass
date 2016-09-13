<!doctype html>
<html lang="en">

<link rel = "stylesheet" type="text/css" href="../css/base.css">
<head>
    <title>Cale's cool Website</title>
</head>
<body>
<header> <?php include  '../inclues/header.php'</header>
<nav><?php include '../includes/nav.php' ?></nav>
    <main>
        <h3>
            <?php
            $Number1 = "100";
            $Number2 = "70";

            $total .= "the total is: $";
            $total .= $Number1 + $Number2;

            echo $total;
            ?>
        </h3>

    </main>

    <footer><?php include '../includes/footer.php'?> </footer>
</body>
</html>