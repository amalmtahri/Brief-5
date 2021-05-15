<?php
require_once  __DIR__."/../models/Reservation.php";
require_once  __DIR__."/../models/Groupe.php";
require_once  __DIR__."/../models/Matiere.php";
require_once  __DIR__."/../models/Salle.php";

class ReservationController{
    function index(){
        if(isset( $_SESSION['role_user']) &&  !empty($_SESSION['role_user'])){
       
        header("location:http://localhost/brief5/Reservation/affichercours");
        }
        else{
            header('location:http://localhost/brief5');
        }
}



function affichergroupes(){
    if(isset( $_SESSION['role_user']) &&  !empty($_SESSION['role_user'])){
    $groupe=new Groupe();
    $groupes=$groupe->affichage();
    require_once __DIR__.'/../views/reservation.php';
    }
    else{
        header('location:http://localhost/brief5');
    }
}
function affichercours(){
    if(isset( $_SESSION['role_user']) &&  !empty($_SESSION['role_user'])){
    $reserv=new Reservation();
    $res=$reserv->affichage();
    require_once __DIR__.'/../views/mesreservation.php';
    }
    else{
        header('location:http://localhost/brief5');
    }

}
function insertC(){
    if(isset( $_SESSION['role_user']) &&  !empty($_SESSION['role_user'])){
    if(isset($_POST['submit'])){
        $id_salle=$_POST['salle'];
        $id_grp=$_POST['groupe'];
        $date=$_POST['date'];
        $heur_cours=$_POST['heur_cours'];
        $reserv=new Reservation();
        if(isset( $_SESSION['id_cour']) && !empty( $_SESSION['id_cour'])){
            $reserv->modifierReserv( $_SESSION['id_cour'],$id_salle,$id_grp,$date,$heur_cours);
            unset($_SESSION['id_cour']);
            unset($_SESSION['dure']);
            unset($_SESSION['id_salle_reserv']);
            unset($_SESSION['libelleS_reserv']);
           }
           else{
        $reserv->insert($date,$heur_cours,$id_salle,$id_grp);}
        header("location:http://localhost/brief5/Reservation/affichercours");
        
    }
}else{
    header('location:http://localhost/brief5');
 }
    }


    public function filtreDure(){
        if(isset( $_SESSION['role_user']) &&  !empty($_SESSION['role_user'])){
        if(isset($_POST['submit'])){
            $groupe=$_POST['groupe'];
            $date=$_POST['date'];
            $dure=new Reservation();
            $dures=$dure->filtreD($groupe,$date);
            require_once __DIR__.'/../views/durecours.php';

        }
        }
        else{
            header('location:http://localhost/brief5');
        }
    }

    public function filtreSalle(){
        if(isset( $_SESSION['role_user']) &&  !empty($_SESSION['role_user'])){
        if(isset($_POST['submit'])){
            $idgrp=$_POST['groupe'];
            $date=$_POST['date'];
            $heure=$_POST['heur_cours'];
            $salle=new Reservation();
            $salles=$salle->filtreS($idgrp,$date,$heure);
            $salle=new Salle();
            $table=$salle->affichagesalle($salles);
            require_once __DIR__.'/../views/sallecours.php';
        }
    }
    else{
        header('location:http://localhost/brief5');
    }
    }
    public function delete(){
        if(isset( $_SESSION['role_user']) &&  !empty($_SESSION['role_user'])){
        if(isset($_POST['submit'])){
            $id=$_POST['id'];
            $delete=new Reservation();
            $delete->deleteReserv($id);
            header("location:http://localhost/brief5/Reservation/affichercours");
        }
    }
    else{
        header('location:http://localhost/brief5');
    }
    }
    public function editcours(){
        if(isset( $_SESSION['role_user']) &&  !empty($_SESSION['role_user'])){
        if(isset($_POST['submit'])){
            $id=$_POST['id'];
            $groupe=new Groupe();
            $groupes=$groupe->affichage();
            $edit=new Reservation();
            $tabedit=$edit->editcours($id);
            $_SESSION['id_cour']=$tabedit[0]['id'];
            $_SESSION['dure']=$tabedit[0]['heure_cour'];
            $_SESSION['id_salle_reserv']=$tabedit[0]['id_salle'];
            $salle=new Salle();
            $salle->setidS($_SESSION['id_salle_reserv']);
            $salles=$salle->recuoerUn();
            $_SESSION['libelleS_reserv']=$salles[0]['libelle'];
            require_once __DIR__.'/../views/reservation.php';
        }
    }
    else{
        header('location:http://localhost/brief5');
    }
}
}

?>
