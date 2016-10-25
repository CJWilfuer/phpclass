<?php
session_start();

if (!empty($_POST["txtEmail"])){
    if (!empty($_POST["txtPassword"])) {
        $Email = $_POST["txtEmail"];
        $Password = $_POST["txtPassword"];
        $errmsg = "";

        include '../includes/dbConnect.php';
        try {
            $db = new PDO($dsn, $username, $password, $options);
            $sql = $db->prepare("select * from memberLogin where memberEmail = :Email ");
            $sql->bindValue(":Email", $Email);
            $sql->execute();
            $row = $sql->fetch();

            if ($row != null) {
                $hashedPassword = md5($password . $row["memberKey"]);

                if ($hashedPassword == $row["memberPassword"]) {
                    $_SESSION["UID"] = 1;
                    $_SESSION["RoleId"] = $row["RoleID"];
                    if ($row["RoleID"] == 1) {
                        header("Location:admin.php");
                    } else {
                        header("Location:member.php");
                    }
                } else {
                    $errmsg = "wrong username or password";
                }
            } else {
                $errmsg = "wrong username or Password";
            }

            $sql = null;
            $db = null;
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo "Error: $error";
        }
    }
}

/*
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

*/
?>

<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">>
<head>

<link rel = "stylesheet" type="text/css" href="../CSS/base.css">
<meta charset="UTF-8">
<title>Cale's cool Website</title>
<link rel = "stylesheet" type="text/css" href="../CSS/base.css">

</head>
<body>
<header><?php include  '../includes/header.php'?></header>
<nav><?php include '../includes/nav.php' ?></nav>
<main>
    <form method="post">
        <H3 id ="error"><?=$errmsg?></H3>
        <table border="1" width="80%">
            <tr height="60">
                <td colspan="2"><h3>user Login</h3></td>
            </tr>
            <tr height = "40">
                <th>Email</th>
                <td><input id="txtEmail" name="txtEmail" type="text" size = "50"></td>
            </tr>
            <tr height = "40">
                <th>password</th>
                <td><input id=txtPassword" name="txtPassword" type="password" value="<?=$rating?>" size = "50"></td>
            </tr>
            <tr height="60">
                <td colspan="2">
                    <input type="submit" value="Log in">
                </td>
            </tr>
        </table>
        <input type="hidden" id="txtID" name="txtID" value="<?=$id?>">
    </form>
</main>


<footer><?php include '../includes/footer.php'?> </footer>
</body>
</html>