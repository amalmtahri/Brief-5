<?php
require_once 'connection.php';

class Matiere{
    private $idM;
    private $libelle;
    public function setLibelle($libelle){
        $this->libelle = $libelle;
     }
     public function setidM($idM){
        $this->idM = $idM;
     }
    public function affichage(){
        $con=new DB();
        $cnx=$con->connect();
        $requette = "SELECT * FROM matiers";
        $query=$cnx->prepare($requette);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function insert(){
        
        $con=new DB();
        $cnx=$con->connect();
        $rq="INSERT INTO matiers(libelle) VALUES ('".$this->libelle."')";
        $res=$cnx->prepare($rq);
        $res->execute();
    }
    public function delete(){
        $con=new DB();
        $cnx=$con->connect();
        $requette="DELETE FROM matiers WHERE id=$this->idM";
        $res=$cnx->prepare($requette);
        $res->execute();
    }
    public function saveupdate(){
        $con=new DB();
        $cnx=$con->connect();
        $requette="UPDATE `matiers` SET libelle='$this->libelle' WHERE id = $this->idM";
        $query=$cnx->prepare($requette);
        $query->execute();
    }
}


?>