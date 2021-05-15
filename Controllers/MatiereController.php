<?php
require_once  __DIR__."/../models/Matiere.php";

class MatiereController{
    function index(){
        if(isset( $_SESSION['role_user']) &&  !empty($_SESSION['role_user'])){
        header("location:http://localhost/brief5/matiere/afficher");
        }
        else{
            header('location:http://localhost/brief5');
         }
    }

    
function afficher()
{
    if(isset( $_SESSION['role_user']) &&  !empty($_SESSION['role_user'])){
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
    if(isset( $_SESSION['role_user']) &&  !empty($_SESSION['role_user'])){
    if(isset($_POST['submit'])){
        $matiere= new Matiere();
        $matiere->setLibelle($_POST['libelle']);
        $matiere->insert();
        $i=0;
        while(isset($_POST['libelle'.$i])){
            $matiere->setLibelle($_POST['libelle'.$i]);
            $matiere->insert();
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
    if(isset( $_SESSION['role_user']) &&  !empty($_SESSION['role_user'])){
    if (isset($_POST['submit'])){
    $i=$_POST['cp'];
    $matiere=new Matiere();
    $matiere->setidM($_POST["idm".$i]);
    $matiere->delete();
    header("location:http://localhost/brief5/matiere/afficher");

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
        $matiere = new Matiere();
        $matiere->setidM($_POST["idm".$i]);
        $matiere->setLibelle($_POST['libelle'.$i]);
        $matiere->saveupdate();
        header("location:http://localhost/brief5/matiere/afficher");
    
    }
}
else{
    header('location:http://localhost/brief5');
 }
}
}



?>