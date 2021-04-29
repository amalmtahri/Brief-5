<?php
require_once 'connection.php';

class Groupe{
    public function affichage(){
        $con=new DB();
        $cnx=$con->connect();
         $requette = "SELECT * FROM groupes";
         $query=$cnx->prepare($requette);
         $query->execute();
         return $query->fetchAll(PDO::FETCH_ASSOC);
    
    }
    public function insert($libelle,$effectif){
        $con=new DB();
        $cnx=$con->connect();
        $rq="INSERT INTO groupes(libelle,effectif) VALUES ('".$libelle."',".$effectif.")";
        $res=$cnx->prepare($rq);
        $res->execute();

    }
    public function delete($idG){
        $con=new DB();
        $cnx=$con->connect();
        $requette="DELETE FROM groupes WHERE id=$idG";
        $res=$cnx->prepare($requette);
        $res->execute();
    }
    public function selecttable($idG){
        $con=new DB();
        $cnx=$con->connect();
        $requette="SELECT * FROM groupes WHERE id = $idG";
        $res=$cnx->prepare($requette);
        $res->execute();
        return $res->fetchAll(PDO::FETCH_ASSOC);
        
    }
    public function saveupdate($idg,$libelle,$effectif){
        $con=new DB();
        $cnx=$con->connect();
        $requette="UPDATE `groupes` SET libelle='$libelle' , effectif='$effectif' WHERE id = $idg";
        $query=$cnx->prepare($requette);
        $query->execute();
    }
}



?>