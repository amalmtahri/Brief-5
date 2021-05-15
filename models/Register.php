<?php
require_once 'connection.php';

class Register{
private $firstname;
private $lastname;
private $email;
private $password;
private $idmtr;

public function setfirstname($firstname){
    $this->firstname = $firstname;
}
public function setlastname($lastname){
    $this->lastname = $lastname;
}
public function setemail($email){
    $this->email = $email;
}
public function setpassword($password){
    $this->password = $password;
}
public function setidmtr($idmtr){
    $this->idmtr = $idmtr;
}
public function insertutilisateur(
    
){
    $con=new DB();
    $cnx = $con->connect();
    $requette="INSERT INTO tuser(First_name, Last_name, email, passwrd ,role) VALUES ('$this->firstname','$this->lastname','$this->email','$this->password','user')";
    $query=$cnx->prepare($requette);
    $query->execute();
    $qr="SELECT * FROM tuser ORDER BY id DESC limit 1";
    $query1=$cnx->prepare($qr);
    $query1->execute();
    $rowid=$query1->fetch();
    $lastId = $rowid[0];
    $requette2="INSERT INTO enseignant(idmtr,iduser) VALUES ($this->idmtr,$lastId)";
    $query2=$cnx->prepare($requette2);
    $query2->execute();





    
}
}

?>