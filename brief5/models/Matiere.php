<?php
require_once 'connection.php';

class Matiere{
    public function affichage(){
        $con=new DB();
        $cnx=$con->connect();
         $requette = "SELECT * FROM matiers";
         $query=$cnx->prepare($requette);
         $query->execute();
         return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function insert($libelle){
        $con=new DB();
        $cnx=$con->connect();
        $rq="INSERT INTO matiers(libelle) VALUES ('".$libelle."')";
        $res=$cnx->prepare($rq);
        $res->execute();
    }
    public function delete($idM){
        $con=new DB();
        $cnx=$con->connect();
        $requette="DELETE FROM matiers WHERE id=$idM";
        $res=$cnx->prepare($requette);
        $res->execute();
    }
    public function selecttable($idM){
        $con=new DB();
        $cnx=$con->connect();
        $requette = "SELECT * FROM matiers WHERE id = $idM";
        $res = $cnx->prepare($requette);
        $res->execute();
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    public function saveupdate($id,$libelle){
        $con=new DB();
        $cnx=$con->connect();
        $requette="UPDATE `matiers` SET libelle='$libelle' WHERE id = $id";
        $query=$cnx->prepare($requette);
        $query->execute();
    }
}


?>