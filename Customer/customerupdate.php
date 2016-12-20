<?php


// if the title is set which means it has been submitted. Submit it back to the page.
//Show All Errors:
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//END Show All Errors



$Fname=
$LastName=
$Address=
$City=
$State=
$Phone=
$Zip=
$Email=$Password =null;


var_dump($_POST);
if($_POST) {

    try {

        include '../includes/dbConnect.php';
        $db = new PDO($dsn, $username, $password);

        $id = $_POST["txtID"];

        $Fname = $_POST["txtFirstName"];
        $LastName = $_POST["txtLastName"];
        $Address = $_POST["txtAddress"];
        $City = $_POST["txtCity"];
        $State = $_POST["txtState"];
        $Phone = $_POST["txtPhone"];
        $Zip = $_POST["txtZip"];
        $Email = $_POST["txtEmail"];
        $Password = $_POST["txtPassword"];


        //$db=new PDO($dsn, $FirstName, $LastName,$Address,$options);
        //here we are inserting something therefore we do not need to fetch anything.
        //Note: Do not put variables inside your SQL Statements. Use PDO which is ':' instead of the '$' variable.
        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );

        $sql = $db->prepare("update Customer set FirstName=:Fname, LastName=:Lname,Address=:address, City =:city, State=:state, phone=:phone,
                            Email=:email, Password=:password, Zip=:zip where CustomerID=:ID");


        $sql->bindValue(":ID", $id);
        $sql->bindValue(":Fname", $Fname);
        $sql->bindValue(":Lname", $LastName);
        $sql->bindValue(":address", $Address);
        $sql->bindValue(":city", $City);
        $sql->bindValue(":state", $State);
        $sql->bindValue(":phone", $Phone);
        $sql->bindValue(":zip", $Zip);
        $sql->bindValue(":email", $Email);
        $sql->bindValue(":password", $Password);
        $sql->execute();
        $row=$sql->fetch();

        var_dump($row);

        $sql = null;
        $db = null;

        header("location: Customer.php");
    } catch (PDOException $e) {
        $error = $e->getMessage();
        echo "Error: $error";
    }

}

if (isset($_GET["id"])){
    $id=$_GET["id"];

    try{

        include '../includes/dbConnect.php';
        $db = new PDO($dsn, $username, $password);


        $sql=$db->prepare('Select * from Customer WHERE CustomerID=:ID ');
        $sql->bindValue(":ID",$id);
        $sql->execute();
        $row=$sql->fetch();

        $Fname=$row["FirstName"];
        $Lname=$row["LastName"];
        $Address=$row["Address"];
        $City=$row["City"];
        $State=$row["State"];
        $Phone=$row["phone"];
        $Zip=$row["Zip"];
        $Email=$row["Email"];
        $Password=$row["Password"];

        $sql = null;
        $db = null;
        //var_dump($row);

    }catch (PDOException $e) {
        $error = $e->getMessage();
        echo "Error: $error";

    }





}else{
    header("Location:Customer.php");
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
            <td colspan="2"><h3>Update Customer</h3></td>
            </tr>
            <tr>
                <th>First Name</th>
                <td><input id="txtFirstName" name="txtFirstName" value="<?=$Fname?>" type="text" size="50" required></td>
            </tr>
            <tr>
                <th>Last Name</th>
                <td><input id="txtLastName" name="txtLastName" value="<?=$Lname?>" type="text" size="50"></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><input id="txtAddress" name="txtAddress" value="<?=$Address?>" type="text" size="50" required></td>
            </tr>
            <tr>
                <th>City</th>
                <td><input id="txtCity" name="txtCity" value="<?=$City?>" type="text" size="50" required></td>
            </tr>
            <tr>
                <th>State</th>
                <td><input id="txtState" name="txtState" value="<?=$State?>" type="text" size="3" maxlength="2" required></td>
            </tr>
            <th> Zip Code</th>
            <td><input id="txtZip" name="txtZip" value="<?=$Zip?>" type="number" size="6" minlength="5" maxlength="5" required></td>
            </tr>
            <tr>
                <th>Phone Number</th>
                <td><input id="txtPhone" name="txtPhone" value="<?=$Phone?>" type="number" size="25" minlength="15" maxlength="15"></td>
            </tr>
            <tr>
                <th>Email Address</th>
                <td><input id="txtEmail" name="txtEmail" value="<?=$Email?>" type="email" size="50" required></td>
            </tr>
            <tr>
                <th>Password</th>

                <td><input id="txtPassword" name="txtPassword" value="<?=$password?>" type="password" size="50"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Update Customer"> |
                    <input type="button" value="Delete Customer" onclick="DeleteCustomer('<?=$Fname?>',<?=$id?>)">

                </td>


            </tr>


        </table>

        <input type="hidden" id="txtID" name="txtID" value="<?=$id?>">
    </form>




</main>
<footer><?php include '../includes/footer.php'?></footer>


</body>

</html>