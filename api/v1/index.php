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

$app->get('/getHello','MyHello');
$app->put('/testJson','testJson');
$app->Post('/addNumber/:myNum','addNumber');
$app->run();

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