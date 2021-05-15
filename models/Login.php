<?php
require_once 'connection.php';

class Login{
    private $email;
    private $password;

    public function setemail($email){
        $this->email = $email;
    }
    public function setpassword($password){
        $this->password = $password;
    }


    public function log(){
        $con=new DB();
        $cnx=$con->connect();
        $requette="SELECT * FROM tuser WHERE email ='$this->email' AND passwrd = '$this->password'";
        $query=$cnx->prepare($requette);
        $query->execute();
        return  $query;
       
    }
   

}


?>