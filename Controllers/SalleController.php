<?php
require_once  __DIR__."/../models/Salle.php";

class SalleController{
 
      public function index()
      {
        if(isset( $_SESSION['role_user']) &&  !empty($_SESSION['role_user'])){
        header("location:http://localhost/brief5/salle/afficher");
        }
        else{
          header('location:http://localhost/brief5');
       }
      }

function afficher()

{
  if(isset( $_SESSION['role_user']) &&  !empty($_SESSION['role_user'])){
    $salle= new Salle();
     $salles = $salle->affichage();
    require_once __DIR__.'/../views/salle.php';
  }
  else{
    header('location:http://localhost/brief5');
 }
}


public function insertS()
{
  if(isset( $_SESSION['role_user']) &&  !empty($_SESSION['role_user'])){
    $salle= new Salle();
    if(isset($_POST['submit'])){
      $salle->setLibelle($_POST['libelle']);
      $salle->setcapacite($_POST['capacite']);
      $salle->insert();
      $i=0;
      while(isset($_POST['libelle'.$i])){
        $salle->setLibelle($_POST['libelle'.$i]);
        $salle->setcapacite($_POST['capacite'.$i]);
        $salle->insert();
        $i++;} 
        header("location:http://localhost/brief5/salle/afficher");
      }
     
  }
  else{
    header('location:http://localhost/brief5');
 }
}
public function deleteS()
{
  if(isset( $_SESSION['role_user']) &&  !empty($_SESSION['role_user'])){
    if (isset($_POST['submit'])){
      $i=$_POST['cp'];
    $salle=new Salle();
    $salle->setidS($_POST["ids".$i]);
    $salle->delete();
    header("location:http://localhost/brief5/salle/afficher");

}
  }
  else{
    header('location:http://localhost/brief5');
 }
}

public function save()
{
  if(isset( $_SESSION['role_user']) &&  !empty($_SESSION['role_user'])){
  if(isset($_POST['enregistrer'])){
    $i=$_POST['cp'];
    $salle=new Salle();
    $salle->setidS($_POST['ids'.$i]);
    $salle->setLibelle($_POST['libelle'.$i]);
    $salle->setcapacite($_POST['capacite'.$i]);
    $salle->saveupdate();
    header("location:http://localhost/brief5/salle/afficher");
    
  }
}
else{
  header('location:http://localhost/brief5');
}
}
}
?>