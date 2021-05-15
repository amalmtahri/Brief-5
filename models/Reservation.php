<?php
require_once 'connection.php';
class Reservation{
    public function affichage(){
        $con=new DB();
        $cnx=$con->connect();
        $user=$_SESSION['role_user'][0]['id'];
        $qr="select * from enseignant where iduser=".$user;
        $res=$cnx->query($qr)->fetchAll();
        $idens=$res[0]['id'];
        $requette='select c.*,g.libelle as "libelleG",s.libelle as "libelleS" from cours c,groupes g ,salles s where c.id_grp=g.id and c.id_salle=s.id and c.id_ensg='.$idens.'  order by id DESC';
        $query=$cnx->prepare($requette);
         $query->execute();
         return $query->fetchAll(PDO::FETCH_ASSOC);


    }
    public function insert($datec,$heur_c,$id_salle,$id_grp){
        $con=new DB();
        $cnx=$con->connect();
        $user=$_SESSION['role_user'][0]['id'];
        $qr="select * from enseignant where iduser=".$user;
        $res=$cnx->query($qr)->fetchAll();
        $idens=$res[0]['id'];
        $rq="INSERT INTO cours(datec,heure_cour,id_ensg,id_salle,id_grp) VALUES ('".$datec."','".$heur_c."',".$idens.",".$id_salle.",".$id_grp.")";
        $res=$cnx->prepare($rq);
        $res->execute();
    }   
    public function filtreD($grpid,$date)
    {
        $con=new DB();
        $cnx=$con->connect();
        $user=$_SESSION['role_user'][0]['id'];
        $qr="select * from enseignant where iduser=".$user;
        $res=$cnx->query($qr)->fetchAll();
        $idens=$res[0]['id'];
        $qr="select heure_cour from cours where datec='$date' and id_grp=$grpid
        union
        select heure_cour from cours where datec='$date' and id_ensg=$idens";
        $res=$cnx->prepare($qr);
        $res->execute();
        if( $row=$res->fetchAll(PDO::FETCH_COLUMN,0)){
            return $row; 
        }
        else{
            return $row=[];
        }
    } 
    
    public function filtreS($idgrp,$date,$dure)
    {
        $con=new DB();
        $cnx=$con->connect();
        $requette="SELECT effectif FROM groupes where id = $idgrp";
        $query=$cnx->prepare($requette);
        $query->execute();
        $qr=$query->fetch(PDO::FETCH_NUM);
        $effectif=(int)$qr[0];
        $qr="select id as salleId from salles where capacite >=$effectif
        except
        select id_salle from cours where datec='$date' and heure_cour='$dure'";
        $res=$cnx->prepare($qr);
        $res->execute();
        if( $row=$res->fetchAll(PDO::FETCH_COLUMN,0)){

            return $row;
        }
        else{
            return $row=[];
        }

        
    }

    public function deleteReserv($id){
        $con=new DB();
        $cnx=$con->connect();
        $requette="DELETE FROM cours where id = $id";
        $query=$cnx->prepare($requette);
        $query->execute();

    }

    public function editcours($id){
    $con=new DB();
    $cnx=$con->connect();
    $requette="SELECT * FROM cours WHERE id = $id";
    $query=$cnx->prepare($requette);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);

    }
    public function modifierReserv( $idcr,$idsl,$idgrp,$date,$dure)
    {
        $qr="UPDATE cours SET datec='$date',heure_cour='$dure',id_grp=".$idgrp.",id_salle=".$idsl." WHERE id=".(int)$idcr;
        $con=new DB();
        $cnx=$con->connect();
        $res=$cnx->prepare($qr);
        $res->execute();
    }

}