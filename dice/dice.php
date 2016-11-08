<?php
session_start();

//echo pnumber;

$PDice1 = array();
$PDice1[1] = 1;
$PDice1[2] = 2;
$PDice1[3] = 3;
$PDice1[4] = 4;
$PDice1[5] = 5;
$PDice1[6] = 6;

$PDice2 = array();
$PDice2[1] = 1;
$PDice2[2] = 2;
$PDice2[3] = 3;
$PDice2[4] = 4;
$PDice2[5] = 5;
$PDice2[6] = 6;

$inum1 = mt_rand(0,5);
$inum2 = mt_rand(0,5);
$Pnumber = $PDice1[$inum1] + $PDice2[$inum2];

//echo pnumber;

$CDice1 = array();
$CDice1[1] = 1;
$CDice1[2] = 2;
$CDice1[3] = 3;
$CDice1[4] = 4;
$CDice1[5] = 5;
$CDice1[6] = 6;

$CDice2 = array();
$CDice2[1] = 1;
$CDice2[2] = 2;
$CDice2[3] = 3;
$CDice2[4] = 4;
$CDice2[5] = 5;
$CDice2[6] = 6;

$CDice3 = array();
$CDice3[1] = 1;
$CDice3[2] = 2;
$CDice3[3] = 3;
$CDice3[4] = 4;
$CDice3[5] = 5;
$CDice3[6] = 6;

$inum3 = mt_rand(0,5);
$inum4 = mt_rand(0,5);
$inum5 = mt_rand(0,5);
$Cnumber = $CDice1[$inum3] + $CDice2[$inum4] + $CDice3[$inum5];


//echo $Cnumber $PNumber;

if ($Cnumber == $Pnumber) {
    $message = " draw";


}



if($Cnumber > $Pnumber){
    $message = " the computer wins";

}

if($Pnumber > $Cnumber){
    $message = " the player wins";


}

?>


<!doctype html>
<html lang="en">
<head>
    <?php include  '../includes/head.php'?>
</head>
<body>
<header>
    <?php include  '../includes/header.php'?>
</header>

<nav>
    <?php include '../includes/nav.php' ?>
</nav>
<main>
    <h3>refresh and dice roll</h3>
    <br/>

    <h3><?=$message?></h3>


    <br/>

    <p> The computer Scored a <?=$Cnumber?></p>

    <img src="../img/dice_<?=$inum3?>.png">
    <img src="../img/dice_<?=$inum4?>.png">
    <img src="../img/dice_<?=$inum5?>.png">
    <br/>
    <p> you Scored a <?=$Pnumber?></p>
<br/>
    <img src="../img/dice_<?=$inum1?>.png">
    <img src="../img/dice_<?=$inum2?>.png">



</main>


<footer><?php include '../includes/footer.php'?> </footer>
</body>
</html>