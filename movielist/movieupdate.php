<?php


if (!empty($_POST["txtTitle"])){
    if(!empty($_POST["txtRating"])){

        $title=$_POST["txtTitle"];
        $rating=$_POST["txtRating"];
        $id = $_POST["txtID"];

        include '../includes/dbConnect.php';
        try{
            $db = new PDO($dsn,$username, $password, $options);
            $sql = $db->prepare("update movielist set movieTitle = :title, movieRating = :rating where movieId = :ID");
            $sql->bindValue(":title",$title);
            $sql->bindValue(":rating",$rating);
            $sql->bindValue(":ID",$id);
            $sql->execute();
            $db = null;
        } catch (PDOException $e){
            $error = $e->getMessage();
            echo "Error: $error";
        }
        header("Location:movielist.php");
        //echo $id;
        exit();
    }
}

if (!empty($_GET["id"])){
    $id=$_GET["id"];

    include '../includes/dbConnect.php';
    try{
        $db = new PDO($dsn,$username, $password, $options);
        $sql = $db->prepare("select * from movielist where movieID = :key ");
        $sql->bindValue(":key",$id);
        $sql->execute();
        $row = $sql->fetch();

        $title = $row["movieTitle"];
        $rating = $row["movieRating"];

        $sql = null;
        $db = null;
    }
    catch (PDOException $e){
        $error = $e->getMessage();
        echo "Error: $error";
    }

}else{
    header("Location: movielist.php");
    exit();
}


?>

<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">>
<head>

<link rel = "stylesheet" type="text/css" href="../CSS/base.css">
<meta charset="UTF-8">
<title>Cale's cool Website</title>
<link rel = "stylesheet" type="text/css" href="../CSS/base.css">
    <script type="text/javascript">
        function DeleteMovie(title, id) {

            if(confirm("do you want to DELETE " + title )){
                document.location.href="deletemovie.php?id=" + id;
            }
        }

    </script>

</head>
<body>
<header><?php include  '../includes/header.php'?></header>
<nav><?php include '../includes/nav.php' ?></nav>
<main>
    <form method="post">
        <table border="1" width="80%">
            <tr height="60">
                <td colspan="2"><h3>update movie</h3></td>
            </tr>
            <tr height = "40">
                <th>Movie Name</th>
                <td><input id="txtTitle" name="txtTitle" type="text" value="<?=$title?>" size = "50"></td>
            </tr>
            <tr height = "40">
                <th>Movie Raiting</th>
                <td><input id=txtRating" name="txtRating" type="text" value="<?=$rating?>" size = "50"></td>
            </tr>
            <tr height="60">
                <td colspan="2">
                    <input type="submit" value="update movie"> |  <input type="button" value="Delete movie" onclick="DeleteMovie('<?=$title?>',<?=$id?>)">
                </td>
            </tr>
        </table>
        <input type="hidden" id="txtID" name="txtID" value="<?=$id?>">
    </form>
</main>


<footer><?php include '../includes/footer.php'?> </footer>
</body>
</html>