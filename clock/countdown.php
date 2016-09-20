<?php
$secPerMin = 60;
$secPerHour = 60 * $secPerMin;
$secperDay = 24 *$secPerHour;
$secperyear = 365.25 *$secperDay;

$now = time();
$eos = mktime(15,20,0,12,20,2016);



$years = Floor($seconds / $secperyear);
$seconds = $eos - $now;

$Days = Floor($seconds / $secperDay);
$seconds = $seconds - ($years * $secperyear);


$hours = floor($seconds/$secPerMin);
$seconds -= $days *$secperDay;

$minutes = floor($seconds/ $secPerMin);
$seconds = $seconds - ($minutes * $secPerMin);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Cale's cool Website</title>
   <link> rel = "stylesheet" type="text/css" href="/CSS/base.css"></link>
</head>
<body>
<main>
    <P>Years:<?$years?>|Days:<?$Days?>|Hours:<?$hours?>|Seconds<?$seconds?></P>
</main>

    <header>
        <?php include 'includes/header.php'?>
    </header>

    <nav>
<?php include  'includes/nav.php'?>
    </nav>

            <footer>
                <?php include  'includes/footer.php'?>
            </footer>
</body>
</html>