<?php
require_once  __DIR__."/../models/Groupe.php";
class GroupeController{
    function index(){
        if(isset( $_SESSION['role_user']) &&  !empty($_SESSION['role_user'])){
        header("location:http://localhost/brief5/groupe/afficher");
    }
    else{
        header('location:http://localhost/brief5');
     }
}
    function afficher()
{
    if(isset( $_SESSION['role_user']) &&  !empty($_SESSION['role_user'])){
    $groupe= new Groupe();
     $groupes = $groupe->affichage();
    require_once __DIR__.'/../views/groupe.php';
    }
    else{
        header('location:http://localhost/brief5');
     }
}
public function insertG()
{$i=0;
    if(isset( $_SESSION['role_user']) &&  !empty($_SESSION['role_user'])){
    if(isset($_POST['submit'])  ){
        $groupe= new Groupe();
        $groupe->setLibelle($_POST['libelle']);
        $groupe->seteffectif($_POST['effectif']);
        $groupe->insert();
        while(isset($_POST['libelle'.$i])){
        $groupe->setLibelle($_POST['libelle'.$i]);
        $groupe->seteffectif($_POST['effectif'.$i]);
        $groupe->insert();
        $i++;

        }
        header("location:http://localhost/brief5/groupe/afficher");
}
    }
    else{
        header('location:http://localhost/brief5');
     }

}
public function deleteG()
{
    if(isset( $_SESSION['role_user']) &&  !empty($_SESSION['role_user'])){
    if (isset($_POST['submit'])){
    $i=$_POST['cp'];
    $groupe=new Groupe();
    $groupe->setidG($_POST["idg".$i]);
    $groupe->delete();
    header("location:http://localhost/brief5/groupe/afficher");

}
    }
    else{
        header('location:http://localhost/brief5');
     }
}

public function save(){
    if(isset( $_SESSION['role_user']) &&  !empty($_SESSION['role_user'])){
    if(isset($_POST['enregistrer'])){
        $i=$_POST['cp'];
        $groupe = new Groupe();
        $groupe->setidG($_POST["idg".$i]);
        $groupe->setLibelle($_POST['libelle'.$i]);
        $groupe->seteffectif($_POST['effectif'.$i]);
        $groupe->saveupdate();
        header("location:http://localhost/brief5/groupe/afficher");
    
    }
}
else{
    header('location:http://localhost/brief5');
 }
}
}



?>