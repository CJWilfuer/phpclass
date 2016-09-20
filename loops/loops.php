<!doctype html>
<html lang="en">
<link rel = "stylesheet" type="text/css" href="../CSS/base.css">
<head>
    <?php include  'includes/head.php'?>
</head>
<body>
<header>
    <?php include  'includes/header.php'?>
</header>
<nav><?php include 'includes/nav.php' ?></nav>
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
    <h3>While loop</h3>
    <?php
    $sum = 1;

    while ($sum < 7)
    {

        echo "<h$sum>HelloWorld </h$sum>";
        $sum++;
    }

    echo  "<h3>do loop</h3>";

    $sum = 6;

    do
    {

        echo "<h$sum>HelloWorld </h$sum>";
        $sum--;
    }while ($sum > 0);

    echo  "<br/><br/><h3>do loop</h3>";

    for ($i =1; $i < 7; $i++)
    {
        echo "<h$i>HelloWorld </h$i>";

    }
    echo  "<br/><br/><h3>string stuff</h3>";
    $FullName = "Bob smith";
    echo $FullName;
    echo "<br /><br />";

    $FullName = strtoupper($FullName);
    echo $FullName;
    echo "<br /><br />";

    $FullName = strtolower($FullName);
    echo $FullName;
    echo "<br /><br />";

    $nameParts = explode(' ',$FullName);
    echo "First Name" . $nameParts[0];
    echo "<br /><br />";

    echo "Last Name" . $nameParts[1];



    ?>

</main>
<footer><?php include 'includes/footer.php'?> </footer>
</body>
</html>