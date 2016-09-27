<?php
session_start();

if(isset($_GET["texQuestion"])) {

    $question=$_GET["texQuestion"];
}else{
    $question= "";
}
if (isset($_SESSION["prevQuest"])){
    $PreveQuest = $_SESSION["PrevQuest"];
}else{
    $PreveQuest ="";
}

if($question ==""){
    $answer = "ask the 8 ball a  question";
}elseif (substr($question, -1)!="?"){
    $answer = "ask me With a ?";
}elseif( strtolower( $PreveQuest)== strtolower($PreveQuest)){
    $answer = "ask me a new quetion";
}else{
    $responses = array();
    $responses[0] = "Ask again latter";
    $responses[1] = "Yes";
    $responses[2] = "No";
    $responses[3] = "It appears to be so";

    $inum = mt_rand(0,3);
    $answer = $responses[$inum];
    $_SESSION["prevQuest"] =$question;
}

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


<footer><?php include 'includes/footer.php'?> </footer>
</body>
</html>