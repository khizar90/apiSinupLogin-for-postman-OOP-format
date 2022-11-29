<?php

class Connection{
    public $servername = 'localhost';
    public $user = 'root';
    public $password = '';
    public $db_name = 'testing';
    public $conn;


    public function __construct(){
        $this->conn = mysqli_connect($this->servername,$this->user,$this->password,$this->db_name);
    }

}


class Register extends Connection{
    public function registration($fname,$lname,$email,$password,$confirm){
        $dublicate = mysqli_query($this->conn, "SELECT * FROM fiamaa WHERE email='$email'");
        
        if(mysqli_num_rows($dublicate)>0){
            return 10;
        }
        else{
            if($password == $confirm){
                $query = mysqli_query($this->conn,"INSERT INTO fiamaa VALUES ('','$fname','$lname','$email','$password')");
                mysqli_query($this->conn,$query);
                
                return 1;
    
            }else{
                return 100;
            }
        }
    }
}
class Loginn extends Connection{
    public function login($useremail,$password){
        $result = mysqli_query($this->conn, "SELECT * FROM fiamaa WHERE email='$useremail'");
        $row = mysqli_fetch_assoc($result);


        if(mysqli_num_rows($result) > 0){
            if($password == $row["password"]){
                $this->id = $row["id"];
                
                return $this->id;;
            }else{
                return 10;
            }
        }
        else{
            return 100;
        }
    }
    public function idUser(){
        return $this->id;
    }
}

?>