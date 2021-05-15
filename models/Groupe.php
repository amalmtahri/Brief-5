<?php
require_once 'connection.php';

class Groupe{
    private $idG;
    private $libelle;
    private $effectif;
    public function setLibelle($libelle){
        $this->libelle = $libelle;
     }
    public function setidG($idG){
        $this->idG = $idG;
     }
    public function seteffectif($effectif){
        $this->effectif = $effectif;
     }

    public function affichage(){
        $con=new DB();
        $cnx=$con->connect();
         $requette = "SELECT * FROM groupes";
         $query=$cnx->prepare($requette);
         $query->execute();
         return $query->fetchAll(PDO::FETCH_ASSOC);
    
    }
    public function insert(){
        $con=new DB();
        $cnx=$con->connect();
        $rq="INSERT INTO groupes(libelle,effectif) VALUES ('".$this->libelle."',".$this->effectif.")";

        $res=$cnx->prepare($rq);
        $res->execute();

    }
    public function delete(){
        $con=new DB();
        $cnx=$con->connect();
        $requette="DELETE FROM groupes WHERE id=$this->idG";
        $res=$cnx->prepare($requette);
        $res->execute();
    }
    public function saveupdate(){
        $con=new DB();
        $cnx=$con->connect();
        $requette="UPDATE `groupes` SET libelle='$this->libelle' , effectif='$this->effectif' WHERE id = $this->idG";
        $query=$cnx->prepare($requette);
        $query->execute();
    }
}



?>