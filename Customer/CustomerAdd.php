<?php
$errmsg ="";
$key = sprintf('%04X%04X%04X%04X%04X%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535),
    mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535),
    mt_rand(0, 65535), mt_rand(0, 65535));


    if(!empty($_POST["txtfirstName"])) {
        if (!empty($_POST["txtLastName"])) {
            if (!empty($_POST["txtAddress"])) {
                if (!empty($_POST["txtCity"])) {
                    if (!empty($_POST["txtState"])) {
                        if (!empty($_POST["txtZip"])) {
                            if (!empty($_POST["txtPhone"])) {
                                if (!empty($_POST["txtEmail"])) {
                                    if (!empty($_POST["txtPassword"])) {


                                        $FirstName = ($_POST["txtFirstName"]);
                                        $LastName = ($_POST["txtLastName"]);
                                        $Address = ($_POST["txtAddress"]);
                                        $City = ($_POST["txtCity"]);
                                        $State = ($_POST["txtState"]);
                                        $Zip = ($_POST["txtZip"]);
                                        $Phone = ($_POST["txtPhone"]);
                                        $Email = ($_POST["txtEmail"]);
                                        $Password = ($_POST["txtPassword"]);

                                        include '../includes/dbConnect.php';


                                        try {
                                            $db = new PDO($dsn, $username, $password, $options);
                                            $sql = $db->prepare("insert into Customer(FirstName, LastName, Address, City, State, Zip, phone, Email, Password) Value(:FirstName, :LastName, :Address, :City, :State, :Zip, :phone, :Email, :Password)");
                                            $sql->bindValue(":FirstName", $FirstName);
                                            $sql->bindValue(":LastName", $LastName);
                                            $sql->bindValue(":Address", $Address);
                                            $sql->bindValue(":City", $City);
                                            $sql->bindValue(":State", $State);
                                            $sql->bindValue(":Zip", $Zip);
                                            $sql->bindValue(":Phone", $Phone);
                                            $sql->bindValue(":Email", $Email);
                                            $sql->bindValue(":Password", $key);
                                            $sql->execute();

                                            echo $row  ["FirstName"];
                                            $db = null;


                                        } catch (PDOException $e) {
                                            $error = $e->getMessage();
                                            echo "Error: $error";
                                        }


                                        header("Location:Customer.php");


                                        exit();
                                    }
                                }
                            }
                        }
                    }
                }
            }
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
                <td colspan="2"><h3>Add new Customer</h3></td>
            </tr>

            <tr height = "40">
                <th>First Name</th>
                <td><input id= "txtFirstName" name="txtFirstName" type="text" size = "50"></td>
            </tr>
            <tr height = "40">
                <th>Last Name</th>
                <td><input id= "txtLastName" name="txtLastName" type="text" size = "50"></td>
            </tr>
            <tr height = "40">
                <th>Address</th>
                <td><input id= "txtAddress" name="txtAddress" type="text" size = "50"></td>
            </tr>
            <tr height = "40">
                <th>City</th>
                <td><input id= "txtCity" name="txtCity" type="text" size = "50"></td>
            </tr>
            <tr height = "40">
                <th>State</th>
                <td><input id= "txtState" name="txtState" type="text" size = "50"></td>
            </tr>
            <tr height = "40">
                <th>ZIP</th>
                <td><input id= "txtZip" name="txtZip" type="text" size = "50"></td>
            </tr>
            <tr height = "40">
                <th>Phone #</th>
                <td><input id= "txtPhone" name="txtPhone" type="text" size = "50"></td>
            </tr>
            <tr height = "40">
                <th>Email</th>
                <td><input id= "txtEmail" name="txtEmail" type="text" size = "50"></td>
            </tr>
            <tr height = "40">
                <th>Password</th>
                <td><input id= "txtPassword" name="txtPassword" type="text" size = "50"></td>
            </tr>
            <tr height="60">
                <td colspan="2">
                    <input type= "submit" value="Add new Customer">
                </td>
            </tr>
        </table>
    </form>
</main>


<footer><?php include '../includes/footer.php'?> </footer>
</body>
</html>