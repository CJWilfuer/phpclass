<?php
$SecPerMin = 60;
$SecPerHour = 60 * $SecPerMin;
$SecPerDay = 24 *$SecPerHour;
$SecPerYear = 365.25 *$SecPerDay;

$now = time();
$eos = mktime(15,20,0,12,20,2016);

$Seconds = $eos - $now;

$Years = floor($Seconds / $SecPerYear);
$Seconds = $Seconds - ($years * $SecPerYear);

$Days = floor($Seconds / $SecPerDay);
$Seconds = $Seconds - ($Days * $SecPerDay);


$Hours = floor($Seconds/$SecPerHour);
$Seconds = $Seconds - ($hours * $SecPerHour);

$Minutes = floor($Seconds / $SecPerMin);
$Seconds = $Seconds - ($Minutes * $SecPerMin);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Cale's cool semester timer</title>
    <link rel = "stylesheet" type="text/css" href="../CSS/base.css">
</head>
<body>
<main>
    <P>Years:<?=$Years?>|Days:<?=$Days?>|Hours:<?=$Hours?>|Minutes:<?=$Minutes?>|Seconds<?=$Seconds?></P>
</main>

    <header>
        <?php include '../includes/header.php'?>
    </header>

    <nav>
<?php include  '../includes/nav.php'?>
    </nav>

            <footer>
                <?php include  '../includes/footer.php'?>
            </footer>
</body>
</html>