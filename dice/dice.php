<?php
session_start();



$Pscore = $Pnumber;
echo $Pscore;

$Cscore = $Cnumber;
echo $Cscore;

$PDice1 = array();
$PDice1[0] = "1";
$PDice1[1] = "2";
$PDice1[2] = "3";
$PDice1[3] = "4";
$PDice1[4] = "5";
$PDice1[5] = "6";

$PDice2 = array();
$PDice2[0] = "1";
$PDice2[1] = "2";
$PDice2[2] = "3";
$PDice2[3] = "4";
$PDice2[4] = "5";
$PDice2[5] = "6";

$inu1 = mt_rand(0,5);
$inum2 = mt_rand(0,5);
$Pnumber = $PDice1[$inum1] + $PDice2[$inum2];

$CDice1 = array();
$CDice1[0] = "1";
$CDice1[1] = "2";
$CDice1[2] = "3";
$CDice1[3] = "4";
$CDice1[4] = "5";
$CDice1[5] = "6";

$CDice2 = array();
$CDice2[0] = "1";
$CDice2[1] = "2";
$CDice2[2] = "3";
$CDice2[3] = "4";
$CDice2[4] = "5";
$CDice2[5] = "6";

$CDice2 = array();
$CDice2[0] = "1";
$CDice2[1] = "2";
$CDice2[2] = "3";
$CDice2[3] = "4";
$CDice2[4] = "5";
$CDice2[5] = "6";

$inum3 = mt_rand(0,5);
$inum4 = mt_rand(0,5);
$inum5 = mt_rand(0,5);
$Cnumber = $CDice1[$inum3] + $CDice2[$inum4] + $CDice[$inum5];


?>


<!doctype html>
<html lang="en">
<head>
    <?php include  'includes/head.php'?>
</head>
<body>
<header>
    <?php include  'includes/header.php'?>
</header>

<nav>
    <?php include 'includes/nav.php' ?>
</nav>
<main>
    <h3>dice roll</h3>
    <br />
    <Marquee>
        <?=$answer?>
    </Marquee>
    <br />
    <p>roll the dice</p>

    <form action="dice.php" method="get">
        <input type="text" id="txtQuestion" name="txtQuestion" />
        <input type="submit" value="Ask the 8Ball">

    </form>
</main>


<footer><?php include 'includes/footer.php'?> </footer>
</body>
</html>