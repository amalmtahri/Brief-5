<?php
require_once 'connection.php';

class Login{


    public function log($email,$password){
        $con=new DB();
        $cnx=$con->connect();


        $requette="SELECT * FROM tuser WHERE email ='$email' AND passwrd = '$password'";

        $query=$cnx->prepare($requette);
        $query->execute();
        return  $query;
       
    }
}


?>