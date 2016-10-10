<?php

if (!empty($_POST["txtCustomerID"])){
    if(!empty($_POST["txtfirstName"])){
        if(!empty($_POST["txtLastName"])){
            if(!empty($_POST["txtAddress"])){
                if(!empty($_POST["txtCity"])){
                    if(!empty($_POST["txtState"])){
                        if(!empty($_POST["txtZip"])){
                            if(!empty($_POST["txtPhone"])){
                                if(!empty($_POST["txtEmail"])){
                                    if(!empty($_POST["txtPassword"])) {


                                        $CustomerID = ($_POST["txtCustomerID"]);
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
                                            $sql = $db->prepare("insert into Customer(CustomerID, FirstName, LastName, Address, City, State, Zip, Phone, Email, Password) Value(:CustomerID, :FirstName, :LastName, :Address, :City, :State, :Zip, :Phone, :Email, :Password");
                                            $sql->bindValue(":CustomerID", $CustomerID);
                                            $sql->bindValue(":FirstName", $FirstName);
                                            $sql->bindValue(":LastName", $LastName);
                                            $sql->bindValue(":Address", $Address);
                                            $sql->bindValue(":City", $City);
                                            $sql->bindValue(":State", $State);
                                            $sql->bindValue(":Zip", $Zip);
                                            $sql->bindValue(":Phone", $Phone);
                                            $sql->bindValue(":Email", $Email);
                                            $sql->bindValue(":Password", $Password);
                                            $sql->execute();

                                            echo $row  ["Customer"];
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
                <td><input type= "txtCustomerID" name="txtCustomerID" type="text" size = "50"></td>
            </tr>
            <tr height = "40">
                <th>Movie Raiting</th>
                <td><input type= "txtFirstName" name="txtFirstName" type="text" size = "50"></td>
            </tr>
            <tr height = "40">
                <th>Movie Name</th>
                <td><input type= "txtLastName" name="txtLastName" type="text" size = "50"></td>
            </tr>
            <tr height = "40">
                <th>Movie Raiting</th>
                <td><input type= "txtAddress" name="txtAddress" type="text" size = "50"></td>
            </tr>
            <tr height = "40">
                <th>Movie Name</th>
                <td><input type= "txtCity" name="txtCity" type="text" size = "50"></td>
            </tr>
            <tr height = "40">
                <th>Movie Raiting</th>
                <td><input type= "txtState" name="txtState" type="text" size = "50"></td>
            </tr>
            <tr height = "40">
                <th>Movie Name</th>
                <td><input type= "txtZip" name="txtZip" type="text" size = "50"></td>
            </tr>
            <tr height = "40">
                <th>Movie Raiting</th>
                <td><input type= "txtPhone" name="txtPhone" type="text" size = "50"></td>
            </tr>
            <tr height = "40">
                <th>Movie Name</th>
                <td><input type= "txtEmail" name="txtEmail" type="text" size = "50"></td>
            </tr>
            <tr height = "40">
                <th>Movie Raiting</th>
                <td><input type= "txtPassword" name="txtPassword" type="text" size = "50"></td>
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