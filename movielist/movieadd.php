<?php

if (!empty($_POST["txtTitle"])){
    if(!empty($_POST["txtRating"])){

        $title=($_POST["txtTitle"]);
        $rating=($_POST["txtRating"]);

        include '../includes/dbConnect.php';



        try{
            $db = new PDO($dsn,$username, $password, $options);
            $sql = $db->prepare("insert into movielist(movieTitle, MovieRating) Value(:title,:rating)");
           $sql->bindValue(":title",$title);
            $sql->bindValue(":rating",$rating);
            $sql->execute();

            echo $row  ["movieTitle"];
            $db = null;


        }
        catch (PDOException $e){
            $error = $e->getMessage();
            echo "Error: $error";
        }


        header("Location:movielist.php");




        exit();
    }
}


?>

<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">>

<link rel = "stylesheet" type="text/css" href="../CSS/base.css">
<meta charset="UTF-8">
<title>Cale's cool Website</title>
<link rel = "stylesheet" type="text/css" href="../CSS/base.css">

<body>
<header><?php include  '../includes/header.php'?></header>
<nav><?php include '../includes/nav.php' ?></nav>
<main>
    <form method="post">
    <table border="1" width="80%">
        <tr height="60">
            <td colspan="2"><h3>Add new movie</h3></td>
        </tr>
        <tr height = "40">
            <th>Movie Name</th>
            <td><input type= "txtTitle" name="txtTitle" type="text" size = "50"></td>
        </tr>
        <tr height = "40">
            <th>Movie Raiting</th>
           <td><input type= "txtRating" name="txtRating" type="text" size = "50"></td>
        </tr>
           <tr height="60">
            <td colspan="2">
                <input type= "submit" value="Add new movie">
            </td>
        </tr>
    </table>
    </form>
</main>


<footer><?php include '../includes/footer.php'?> </footer>
</body>
</html>