<?php
require_once  __DIR__."/../models/Salle.php";

class SalleController{
 
      public function index()
      {
        if(isset( $_SESSION['admin']) &&  !empty($_SESSION['admin'])){
        header("location:http://localhost/brief5/salle/afficher");
        }
        else{
          header('location:http://localhost/brief5');
       }
      }

function afficher()

{
  if(isset( $_SESSION['admin']) &&  !empty($_SESSION['admin'])){
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
  if(isset( $_SESSION['admin']) &&  !empty($_SESSION['admin'])){
    $salle= new Salle();
    if(isset($_POST['submit'])){
      
      $libelle=$_POST['libelle'];
      $capacite=$_POST['capacite'];
      $salle->insert($libelle,$capacite);
      $i=0;
      while(isset($_POST['libelle'.$i])){
       
        $salle->insert($_POST['libelle'.$i],$_POST['capacite'.$i]);
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
  if(isset( $_SESSION['admin']) &&  !empty($_SESSION['admin'])){
    if (isset($_POST['submit'])){
    $id=$_POST["ids"];
    $salle=new Salle();
    $salle->delete($id);
    header("location:http://localhost/brief5/salle/afficher");

}
  }
  else{
    header('location:http://localhost/brief5');
 }
}

public function updatesalle()
{
  if(isset( $_SESSION['admin']) &&  !empty($_SESSION['admin'])){
  if (isset($_POST['submit'])){
    $id=$_POST["ids"];
    $salle=new Salle();
    $sl=$salle->recuoerUn($id);
    require_once __DIR__.'/../views/updatesalle.php';
   
}
  }
  else{
    header('location:http://localhost/brief5');
 }
}
public function save()
{
  if(isset( $_SESSION['admin']) &&  !empty($_SESSION['admin'])){
  if(isset($_POST['submit'])){
    $id=$_POST['ids'];
    $libelle=$_POST['libelle'];
    $capacite=$_POST['capacite'];
    $salle=new Salle();
    $salle->saveupdate($libelle,$capacite,$id);
    header("location:http://localhost/brief5/salle/afficher");
    
  }
}
else{
  header('location:http://localhost/brief5');
}
}
}
?>