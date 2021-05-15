<?php 
require_once  __DIR__."/../models/Register.php";
require_once  __DIR__."/../models/Matiere.php";


class RegistreController{
public function affichage(){
$matiere=new Matiere();
$res=$matiere->affichage();
require_once __DIR__.'/../views/register.php';
}
public function insertenseignant(){
    if(isset($_POST['submit'])){
        $register = new Register();
        $register->setfirstname($_POST['firstname']);
        $register->setlastname($_POST['lastname']);
        $register->setemail($_POST['email']);
        $register->setpassword($_POST['password']);
        $register->setidmtr($_POST['matiere']);
        $register->insertutilisateur();
        header('location:http://localhost/brief5/Registre/affichage');

    }
}
}

?>