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
$app->get('/get_runners/:raceID','get_runners');
$app->post('/add_runner','add_runner');
$app->post('/delete_runner','delete_runner');
$app->post('/update_runner','update_runner');
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
        echo '{"Runners":' . json_encode($results) . '}';
        $results = null;
        $db = null;
    } catch (PDOException $e) {
        $error = $e->getMessage();
        echo json_encode($error);
    }
}


function add_runners(){
    $request = \Slim\Slim::getInstance()->request();
    $json = json_decode($request->getBody(),TRUE);
    $memberID = $json["memberID"];
    $raceID = $json["raceID"];
    $memberKey = $json["memberKey"];

    include '../../includes/dbConnect.php';
    try {
        $db = new PDO($dsn, $username, $password, $options);
        $sql = $db->prepare("SELECT 
member_race.raceID
      FROM
      member_race 
      INNER JOIN memberLogin ON member_race.memberID = MemberLogin.memberID
      WHERE
     member_race.raceID = 2 AND 
    memberLogin.MemberKey = :APIKey");
        $sql->bindValue(":APIKey", $memberKey);
        $sql->execute();
        $results = $sql->fetch();

        if($results == null){
            echo "bad API KEY";

        }else{
            $sql = $db->prepare("insert into member_race (memberID, raceID, RoleID)VALUES(:memberID, :raceID,3)");
            $sql->bindValue(":MemberID", $memberID);
            $sql->bindValue(":RaceID", $raceID);
            $sql->execute();
        }

        $results = null;
        $db = null;
    } catch (PDOException $e) {
        $error = $e->getMessage();
        echo json_encode($error);
    }

}

function delete_runners(){
    $request = \Slim\Slim::getInstance()->request();
    $json = json_decode($request->getBody(),TRUE);

    echo $json["delete_runner"];

}
function update_runners(){
    $request = \Slim\Slim::getInstance()->request();
    $json = json_decode($request->getBody(),TRUE);
    echo $json["update_runner"];

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