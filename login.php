<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Orgin: *');
header('Access-Control-Allow-Methods: GET');
require 'function.php';
$login = new Loginn();
if (isset($_GET['email']) && isset($_GET['password'])){
    $result = $login->login($_GET['email'],$_GET['password']);
    if($result == 10){
        echo json_encode(array(
            "status" => false,
            "action" => "Login failed",
            "data" => [],
            "error" => ["invalid email and passowrd"]
        ));
    }elseif($result==100){
        echo json_encode(array(
            "status" => false,
            "action" => "Login failed",
            "data" => [],
            "error" => ["Username not Register"]
        ));
    }elseif($result){
        echo json_encode(array(
            "status" => true,
            "action" => "Successfully Login!",
            "data" => ['id'=> $result],
            "error" => []
        ));
        
    }
}else{
    echo json_encode(array(
        "status" => false,
        "action" => "Login failed",
        "data" => [],
        "error" => ["please provide username and password"]
    ));
}

?>