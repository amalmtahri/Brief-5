<?php
require_once  __DIR__."/../models/Login.php";
class LoginController{
    function index(){
        require_once __DIR__."/../views/login.php";
    }
   
    public function user(){
        if(isset($_POST['submit'])){

           $email = $_POST['email'];
           $password =  $_POST['password'];
            
            $login = new Login();
            $result = $login->log($email,$password);
           if($row=$result->fetchAll(PDO::FETCH_ASSOC)){
               session_start();
           
                   $_SESSION['admin'] = $row;
                
               header('location:http://localhost/brief5/salle/afficher');
            
             }
               else{
                require_once __DIR__."/../views/login.php";
                echo "<script> alert('les informations incorrect')</script>";
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