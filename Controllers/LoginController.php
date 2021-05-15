<?php
require_once  __DIR__."/../models/Login.php";
class LoginController{

    function index(){
        if(isset($_SESSION['erreurLogin'])){
            $erreur = $_SESSION['erreurLogin'];
            session_unset();
            session_destroy();
        }else{
            $erreur = "";
        }
        require_once __DIR__."/../views/login.php";

    }
   
    public function user(){
        if(isset($_POST['submit'])){
            $login = new Login();
            $login->setemail($_POST['email']);
            $login->setpassword($_POST['password']);
            $result = $login->log();
           if($row=$result->fetchAll(PDO::FETCH_ASSOC)){
                   $_SESSION['role_user'] = $row;
                   if(($_SESSION['role_user'][0]['role']=='admin')){
                
               header('location:http://localhost/brief5/salle/afficher');
            }

               else{
                header('location:http://localhost/brief5/Reservation/index');
             }
            
             }
             
               else{
                $_SESSION['erreurLogin']="<strong>Erreur!</strong> Email ou Password est Incorrecte !";
                header('location:http://localhost/brief5/Login/index');
               }
           }
            
        }
        public function deconnect(){

            session_start();
            session_unset();
            session_destroy();
            header('location:http://localhost/brief5');
        }

      
    }



?>