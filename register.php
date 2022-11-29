<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Orgin: *');
header('Access-Control-Allow-Methods: POST');
require 'function.php';

$register = new Register();
if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password']) && $_POST['confirmpassword'] ){
    $result = $register->registration($_POST['firstname'],$_POST['lastname'],$_POST['email'],$_POST['password'],$_POST['confirmpassword']);
    if($result==10){
        echo json_encode(array(
            "status" => false,
            "action" => "Register failed",
            "data" => [],
            "error"=> ["email alreday exist"]
        ));
    }
    if($result==1){
        echo json_encode(array(
            "status" => true,
            "action" => "Successfully Signup!",
            "data" => [],
            "error"=> []
            
        ));
    }
    if($result==100){
        echo json_encode(array(
            "status" => false,
            "action" => "register failed",
            "data" => [],
            "error"=> ["Password not match"]
        ));
    }
}else{
    echo json_encode(array(
        "status" => false,
        "action" => "register failed",
        "data" => [],
        "error"=> ["please fill all the filed"]
    ));
}



?>