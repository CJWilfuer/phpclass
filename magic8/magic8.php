<?php

session_start();



if (isset($_GET ["txtQuestion"])){
    $question=$_GET["txtQuestion"];

}else{
    $question="";
}

if (isset($_SESSION["PrevQuest"])){
    $PrevQuest=$_SESSION["PrevQuest"];
}else{
    $PrevQuest="";
}

$responses = array();
$responses[0] = "It is certain";
$responses[1] = "It is decidedly so";
$responses[2] = "Without a doubt";
$responses[3] = "Yes, definitely";
$responses[4] = "You may rely on it";
$responses[5] = "As I see it, yes";
$responses[6] = "Most likely";
$responses[7] = "Outlook good";
$responses[8] = "Yes";
$responses[9] = "Signs point to yes";
$responses[10] = "Reply hazy try again";
$responses[11] = "Ask again later";
$responses[12] = "Better not tell you now";
$responses[13] = "Cannot predict now";
$responses[14] = "Concentrate and ask again";
$responses[15] = "Don't count on it";
$responses[16] = "My reply is no";
$responses[17] = "My sources say no";
$responses[18] = "Outlook not so good";
$responses[19] = "Very doubtful";

if ($question==""){
    $answer="Ask the 8 ball a question";

}elseif (substr($question,-1) !="?" ) {
    $answer = "Ask me with a '?' Question mark";

}elseif(strtolower($PrevQuest)==$question){
    $answer="Ask me a New Question";

}else
{
    $inum = mt_rand(0,19);

    $answer=$responses[$inum];
    $_SESSION["PrevQuest"]=$question;
}





?>

<!doctype html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Cale's Cool Website</title>

    <link rel ="stylesheet" type = "text/css"  href="../CSS/base.css">
</head>

<body>

<header><? include '../includes/header.php'?></header>
<nav><?php include '../includes/nav.php'?></nav>



<main>
    <h3>Magic 8 Ball</h3>
    <br>
    <marquee> <?=$answer?></marquee>
    <br>
    <p>Ask a Question</p>

    <form action="magic8.php" method="get">
        <input type="text" id="txtQuestion" name="txtQuestion" value = <?=$question?> >
        <br>
        <input type ="submit" value="Ask the 8 Ball"/>

    </form>

</main>
<footer><?php include '../includes/footer.php'?></footer>


</body>

</html>