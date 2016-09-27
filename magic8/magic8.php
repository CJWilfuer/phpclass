<?php
session_start();

if(isset($_GET["texQuestion"])) {
    $question=$_GET["texQuestion"];
}else{
    $question= "";
}
if(isset($_SESSION["prevQuest"])){
    $PreveQuest = $_SESSION["PrevQuest"];
}else{
    $PreveQuest ="";
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

    if ($question == "") {
        $answer = "ask the 8 ball a  question";
    } elseif (substr($question, -1) != "?") {
        $answer = "ask me With a ?";
    } elseif (strtolower($PreveQuest) == strtolower($PreveQuest)) {
        $answer = "ask me a new quetion";
    } else {
        $inum = mt_rand(0, 19);
        $answer = $responses[$inum];
        $_SESSION["prevQuest"] = $question;
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
    <h3>Magic 8 Ball</h3>
<br />
    <Marquee>
        <?=$answer?>
    </Marquee>
    <br />
    <p>ask a question</p>

    <form action="magic8.php" method="get">
        <input type="text" id="txtQuestion" name="txtQuestion" />
        <input type="submit" value="Ask the 8Ball">

    </form>
   </main>


<footer><?php include '../includes/footer.php'?> </footer>
</body>
</html>
