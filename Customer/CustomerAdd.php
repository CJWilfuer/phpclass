<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../includes/dbConnect.php';

var_dump($_POST);


if(!empty($_POST["txtLastName"])){


    $FirstName=$_POST["txtFirstName"];
    $LastName=$_POST["txtLastName"];
    $Address=$_POST["txtAddress"];
    $City=$_POST["txtCity"];
    $State=$_POST["txtState"];
    $Phone=$_POST["txtPhone"];
    $Zip=$_POST["txtZip"];
    $Password=$_POST["txtPassword"];
    $Email=$_POST["txtEmail"];









    try{
        $db=new PDO($dsn,$username, $password);
        $sql=$db->prepare("insert into Customer (FirstName,LastName,Address,City,State,Zip,phone,Email,Password) 
            VALUE (:FirstName,:LastName,:Address,:City,:State,:Zip,:Phone,:Email,:Password)");

        $sql->bindValue(":FirstName",$FirstName);
        $sql->bindValue(":LastName",$LastName);
        $sql->bindValue(":Address",$Address);
        $sql->bindValue(":City",$City);
        $sql->bindValue(":State",$State);
        $sql->bindValue(":Phone",$Phone);
        $sql->bindValue(":Zip",$Zip);
        $sql->bindValue(":Email",$Email);
        $sql->bindValue(":Password",$Password);
        $sql->execute();
        header("Location: Customer.php");


        $db=null;


    }catch (PDOException $e){
        $error=$e->getMessage();
        echo "Error: $error";
    }

    #exit();
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



    <form method="post">
        <table border="1" width="100">

            <tr ="60">
            <td colspan="2"><h3>Add New Customer</h3></td>
            </tr>
            <tr>
                <th>First Name</th>
                <td><input id="txtFirstName" name="txtFirstName" type="text" size="50" required></td>
            </tr>
            <tr>
                <th>Last Name</th>
                <td><input id="txtLastName" name="txtLastName"  type="text" size="50"></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><input id="txtAddress" name="txtAddress"  type="text" size="50" required></td>
            </tr>
            <tr>
                <th>City</th>
                <td><input id="txtCity" name="txtCity"  type="text" size="50" required></td>
            </tr>
            <tr>
                <th>State</th>
                <td><input id="txtState" name="txtState"  type="text" size="3" maxlength="2" required></td>
            </tr>
            <th> Zip Code</th>
            <td><input id="txtZip" name="txtZip"  type="number" size="6" minlength="5" maxlength="5" required></td>
            </tr>
            <tr>
                <th>Phone Number</th>
                <td><input id="txtPhone" name="txtPhone"  type="number" size="25" minlength="15" maxlength="15"></td>
            </tr>
            <tr>
                <th>Email Address</th>
                <td><input id="txtEmail" name="txtEmail"  type="email" size="50" required></td>
            </tr>
            <tr>
                <th>Password</th>

                <td><input id="txtPassword" name="txtPassword"  type="password" size="50"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Add New Customer">
                </td>
            </tr>


        </table>
    </form>




</main>
<footer><?php include '../includes/footer.php'?></footer>


</body>

</html>