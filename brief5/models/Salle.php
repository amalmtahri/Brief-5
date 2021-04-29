<?php
require_once 'connection.php';


class Salle{
   
    public function affichage(){
       $con=new DB();
       $cnx=$con->connect();
        $requette = "SELECT * FROM salles";
        $query=$cnx->prepare($requette);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
      
    }

    

    public function insert($libelle,$capacite)
    {
        $con=new DB();
        $cnx=$con->connect();
        $rq="INSERT INTO salles(libelle,capacite) VALUES ('".$libelle."',".$capacite.")";
        $res=$cnx->prepare($rq);
        $res->execute();
    }
    public function delete($idS){
        $con=new DB();
        $cnx=$con->connect();
        $requette="DELETE FROM salles WHERE id=$idS";
        $res=$cnx->prepare($requette);
        $res->execute();
    }


    public function recuoerUn($id)
    {
        $con=new DB();
        $cnx=$con->connect();
         $requette = "SELECT * FROM salles where id=$id";
         $query=$cnx->prepare($requette);
         $query->execute();
         return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function saveupdate($libelle,$capacite,$ids){
        $con=new DB();
        $cnx=$con->connect();
        $requette="UPDATE `salles` SET libelle='$libelle' , capacite='$capacite' WHERE id = $ids";
        $query=$cnx->prepare($requette);
        $query->execute();
    }
}

?>