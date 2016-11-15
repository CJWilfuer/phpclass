<?php
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

/*
 * put == update
 * post = insert
 * get = select
 * delete = delete
 */

$app = new \Slim\Slim();



$app->get('/get_races','get_races');
$app->put('/get_runners/:raceID','get_runners');
$app->Post('/add_runner','add_runner');
$app->Post('/delete_runner','delete_runner');
$app->run();

function get_races(){
    include '../../includes/dbConnect.php';
    try {
        $db = new PDO($dsn, $username, $password, $options);
        $sql = $db->prepare("select * from Race");
        $sql->execute();
        $results = $sql->fetchAll();
        echo '{"Races":' . json_encode($results) . '}';


        $sql = null;
        $db = null;
    } catch (PDOException $e) {
        $error = $e->getMessage();
        echo json_encode($error);
    }
}

function get_runners($raceID){
    include '../../includes/dbConnect.php';
    try {
        $db = new PDO($dsn, $username, $password, $options);
        $sql = $db->prepare("Select MemberLogin.MemberName 
                               From Member_Race INNER JOIN  memberLogin 
                               ON  member_race.memberID = memberLogin.memberID
                               WHERE  member_Race.role = 3 AND 
                               member_Race.raceID = 1");
        $sql->bindValue(":raceID", $raceID);
        $sql->execute();
        $results = $sql->fetchAll();
        echo '{"Races":' . json_encode($results) . '}';


        $sql = null;
        $db = null;
    } catch (PDOException $e) {
        $error = $e->getMessage();
        echo json_encode($error);
    }
}
function addNumber($myNum){
    echo "your number is $myNum" ;
}

function MyHello(){
    echo "Hello World";
}

function testJson(){
    $request = \Slim\Slim::getInstance()->request();
    $json = json_decode($request->getBody(),TRUE);

    echo $json["address"];

    echo "Test Json";
}


?>