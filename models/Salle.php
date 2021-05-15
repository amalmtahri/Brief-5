<?php
require_once 'connection.php';


class Salle{
    private $idS;
    private $libelle;
    private $capacite;


    public function setLibelle($libelle){
        $this->libelle = $libelle;
    }
    public function setidS($idS){
        $this->idS = $idS;
    }
    public function setcapacite($capacite){
        $this->capacite = $capacite;
    }
   
    public function affichage(){
       $con=new DB();
       $cnx=$con->connect();
        $requette = "SELECT * FROM salles";
        $query=$cnx->prepare($requette);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
      
    }
    public function affichagesalle($data){
        $con=new DB();
        $cnx=$con->connect();
        $requette="select * from salles where id in (".implode(',',$data).")";
        $query=$cnx->prepare($requette);
        $query->execute();
        return $query->fetchAll();

    }

    public function insert()
    {
        $con=new DB();
        $cnx=$con->connect();
        $rq="INSERT INTO salles(libelle,capacite) VALUES ('".$this->libelle."',".$this->capacite.")";
        $res=$cnx->prepare($rq);
        $res->execute();
    }
    
    public function delete(){
        $con=new DB();
        $cnx=$con->connect();
        $requette="DELETE FROM salles WHERE id=$this->idS";
        $res=$cnx->prepare($requette);
        $res->execute();
    }
    public function saveupdate(){
        $con=new DB();
        $cnx=$con->connect();
        $requette="UPDATE `salles` SET libelle='$this->libelle' , capacite='$this->capacite' WHERE id = $this->idS";
        $query=$cnx->prepare($requette);
        $query->execute();
    }
}

?>