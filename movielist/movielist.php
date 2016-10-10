<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>my movie list</title>
    <link rel = "stylesheet" type="text/css" href="../CSS/base.css">

</head>

<body>
<header><?php include  '../includes/header.php'?></header>
<nav><?php include '../includes/nav.php' ?></nav>
<main>
    <H3> my movie list</H3>

    <table border="1px" width="80%">
        <tr>
            <th>key</th>
            <th>Title</th>
            <th>rating</th>
        </tr>



    <?php
    include '../includes/dbConnect.php';



    try{
        $db = new PDO($dsn,$username, $password, $options);
        $sql = $db->prepare("select * From movielist");
        $sql->execute();
        $row = $sql->fetch();
       //echo $row["movieTitle"];

        while ($row!=null){
            echo "<tr>";
            echo "<td>".$row["movieId"]."</td>";
            echo "<td>".$row["movieTitle"]."</td>";
            echo "<td>".$row["movieRating"]."</td>";
            echo "</tr>";
            $row = $sql->fetch();
        }

        $sql = null;
        $db = null;

    }
    catch (PDOException $e){
        $error = $e->getMessage();
        echo "Error: $error";
    }
    ?>

    </table>
    <br/><br />
    <a href="movieadd.php">add new movie</a>

</main>




<footer><?php include 'includes/footer.php'?> </footer>
</body>
</html>