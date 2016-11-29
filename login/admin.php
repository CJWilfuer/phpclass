<?php
session_start();
$errmsg ="";
$key = sprintf('%04X%04X%04X%04X%04X%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535),
     mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535),
     mt_rand(0, 65535), mt_rand(0, 65535));


if($_SESSION["RoleID"]!=1){
header("Location:index.php");
}

if(isset($_POST["Submitted"])) {
    if (isset($_POST["txtFName"])) {
        $FNmae = $_POST["txtFName"];
    } else {
        $errmsg = "full name is required!";
    }

    if (isset($_POST["txtEmail"])) {
        $Email = $_POST["txtEmail"];
    } else {
        $errmsg = " Email is required!";
    }
    if (($_POST["txtPassword"])) {
        $Password = $_POST["txtPassword"];
    } else {
        $errmsg = "PassWord is required!";
    }
    if ($Password != $_POST["txtPassword2"]) {
        $Password = $_POST["txtPassword2"];
    } else {
        $errmsg = " retype PassWord is required!";
    }
    if (($_POST["txtRole"])) {
        $Role = $_POST["txtRole"];
    } else {
        $errmsg = "Role is required!";
    }
    if ($errmsg == "") {
        echo "write to database";
    }


    include '../includes/dbConnect.php';

    try {
        $db = new PDO($Sdn, $username, $password, $options);
        $sql = $db->prepare("insert into memberLogin (memberName, memberEmail memberPasswprd,
        RoleID, memberKey) VALUE (:NAME , :Email,:Passwprd,:ID,:Key)");

        $sql->blindvalue(":Name", $FName);
        $sql->blindvalue(":Email", $Email);
        $sql->blindvalue(":Password", md5($Password . $Key));
        $sql->blindvalue(":RID", $Role);
        $sql->blindvalue(":Key", $key);
        $sql->execute();
    }
catch (PDOException $e){
    $error = $e->getMessage();
    echo "Error: $error";
}

$FName = "";
    $Email = "";
    $Password = "";
    $Role = "";
    $errmsg = "Member added to the db";

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
<H3>admin page</H3>
    <form method="post">
        <H3 id ="error"><?=$errmsg?></H3>
        <table border="1" width="80%">
            <tr height="60">
                <td colspan="2"><h3>Add new Members</h3></td>
            </tr>
            <tr height = "40">
                <th>full Name</th>
                <td><input id="txtFName" name="txtFName" type="text" value="<?=$FName?>"  size = "50"></td>
            </tr>
            <tr height = "40">
                <th>Email</th>
                <td><input id=txtEmail" name="txt" type="email" value="<?=$Email?>" size = "50"></td>
            </tr>
            <tr height = "40">
                <th>password</th>
                <td><input id=txtPassword" name="txtPassword" type="password"  size = "50"></td>
            </tr>
            <tr height = "40">
                <th>retype password</th>
                <td><input id=txtPassword2" name="txtPassword" type="password"  size = "50"></td>
            </tr>
            <tr height = "40">
                <th>Role</th>
                <td>
                    <select id="txtRole">
                        <option value="1">Admin</option>
                        <option value="2">Member</option>
                        <option value="3">Oporator</option>
                    </select>
                </td>
            </tr>

            <tr height="60">
                <td colspan="2">
                    <input type="submit" value="Add New User" name="Submit">
                </td>
            </tr>
        </table>
        <input type="hidden" id="txtID" name="txtID" value="<?=$id?>">
    </form>
</main>


<footer><?php include '../includes/footer.php'?> </footer>
</body>
</html>