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
<head>  charset= "utf-8" />

    <title>Lab: 2 Column Layout Using Floats</title>
    <link rel="stylesheet" type="text/css"  href="../css/Base.css"/>
</head>

<body>

<main>
    <h3>end of semester</h3>
    <P>years:<? $years?>| Days:<? $Days?>| hours:<? $hours?>| seconds<? $seconds?>|</P>

</main>
<div id="page">
    <header>
        <?php include '../includes/header.php'?>

    </header>

    <nav>
        <ul>

            <li><a href="http://www.learningave.info">Nav Five</a></li>
        </ul>
    </nav>


    <section>

        <p>hi</p>

        <section>

            <footer>
                <h5>Copyright Info: </h5>
            </footer>
</div>

</body>
</html>