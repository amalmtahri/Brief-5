<?php
require_once  __DIR__."/../models/Groupe.php";
class GroupeController{
    function index(){
        if(isset( $_SESSION['admin']) &&  !empty($_SESSION['admin'])){
        header("location:http://localhost/brief5/groupe/afficher");
    }
    else{
        header('location:http://localhost/brief5');
     }
}
    function afficher()
{
    if(isset( $_SESSION['admin']) &&  !empty($_SESSION['admin'])){
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
    if(isset( $_SESSION['admin']) &&  !empty($_SESSION['admin'])){
    if(isset($_POST['submit'])  ){
      $libelle=$_POST['libelle'];
      $effectif=$_POST['effectif'];
        $groupe= new Groupe();
        $groupe->insert($libelle,$effectif);

        while(isset($_POST['libelle'.$i])){
        $groupe->insert($_POST['libelle'.$i],$_POST['effectif'.$i]);
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
    if(isset( $_SESSION['admin']) &&  !empty($_SESSION['admin'])){
    if (isset($_POST['submit'])){
    $id=$_POST["idg"];
    $groupe=new Groupe();
    $groupe->delete($id);
    header("location:http://localhost/brief5/groupe/afficher");

}
    }
    else{
        header('location:http://localhost/brief5');
     }
}
public function updategroupe(){
    if(isset( $_SESSION['admin']) &&  !empty($_SESSION['admin'])){
    if (isset($_POST['submit'])){
        $id=$_POST['idg'];
        $groupe=new Groupe();
       $table = $groupe->selecttable($id);
        require_once __DIR__.'/../views/updategroupe.php';
    }
}
else{
    header('location:http://localhost/brief5');
 }
}
public function save(){
    if(isset( $_SESSION['admin']) &&  !empty($_SESSION['admin'])){
    if(isset($_POST['submit'])){
        $id=$_POST['idg'];
        $libelle = $_POST['libelle'];
        $effectif = $_POST['effectif'];
        $groupe = new Groupe();
        $groupe->saveupdate($id,$libelle,$effectif);
        header("location:http://localhost/brief5/groupe/afficher");
    
    }
}
else{
    header('location:http://localhost/brief5');
 }
}
}



?>