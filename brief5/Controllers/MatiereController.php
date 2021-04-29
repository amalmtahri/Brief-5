<?php
require_once  __DIR__."/../models/Matiere.php";

class MatiereController{
    function index(){
        if(isset( $_SESSION['admin']) &&  !empty($_SESSION['admin'])){
        header("location:http://localhost/brief5/matiere/afficher");
        }
        else{
            header('location:http://localhost/brief5');
         }
    }

    
function afficher()
{
    if(isset( $_SESSION['admin']) &&  !empty($_SESSION['admin'])){
    $matiere= new Matiere();
     $matieres = $matiere->affichage();
    require_once __DIR__.'/../views/matiere.php';
    }
    else{
        header('location:http://localhost/brief5');
     }
}
public function insertM()

{
    if(isset( $_SESSION['admin']) &&  !empty($_SESSION['admin'])){
    if(isset($_POST['submit'])){
      $libelle=$_POST['libelle'];
        $matiere= new Matiere();
        $matiere->insert($libelle);
        $i=0;
        while(isset($_POST['libelle'.$i])){
       
            $matiere->insert($_POST['libelle'.$i]);
            $i++;} 

        header("location:http://localhost/brief5/matiere/afficher");
}
    }
    else{
        header('location:http://localhost/brief5');
     }
}

public function deleteM()
{
    if(isset( $_SESSION['admin']) &&  !empty($_SESSION['admin'])){
    if (isset($_POST['submit'])){
    $id=$_POST["idm"];
    $matiere=new Matiere();
    $matiere->delete($id);
    header("location:http://localhost/brief5/matiere/afficher");

}
    }
    else{
        header('location:http://localhost/brief5');
     }
}
public function updatematiere(){
    if(isset( $_SESSION['admin']) &&  !empty($_SESSION['admin'])){
    if (isset($_POST['submit'])){
        $id=$_POST['idm'];
        $matiere=new Matiere();
       $table = $matiere->selecttable($id);
        require_once __DIR__.'/../views/updatematiere.php';
    }
}
else{
    header('location:http://localhost/brief5');
 }
}
public function save(){
    if(isset( $_SESSION['admin']) &&  !empty($_SESSION['admin'])){
    if(isset($_POST['submit'])){
        $id=$_POST['idM'];
        $libelle = $_POST['libelle'];
        $matiere = new Matiere();
        $matiere->saveupdate($id,$libelle);
        header("location:http://localhost/brief5/matiere/afficher");
    
    }
}
else{
    header('location:http://localhost/brief5');
 }
}
}



?>