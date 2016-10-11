<?php

if (!empty($_GET["id"])){
    $id =$_GET["id"];


        include '../includes/dbConnect.php';
        try{
            $db = new PDO($dsn,$username, $password, $options);
            $sql = $db->prepare("Delete from movielist WHERE movieID = :ID");
            $sql->bindValue(":ID",$id);

            $sql->execute();
            $db = null;
        }
        catch (PDOException $e){
            $error = $e->getMessage();
            echo "Error: $error";
        }
        header("Location:movielist.php");
        exit();

}


?>
