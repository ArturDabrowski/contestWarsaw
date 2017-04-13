<?php
require_once 'config/Config.php';
class MySession  {
    
    function __construct() {
        session_start();
    }
            
    function sessStart($code, $zapytanie){
        $polacz = new DbConnect();
                $wynik=$polacz->db->query($zapytanie);
                $wynik1=$wynik->fetch_object();
                if($code == $wynik->code){
                    setcookie(time()+(60*60*24*7));
                    $_SESSION['identyfikator_sesji']= session_id();
                    $_SESSION['klient']=$_SERVER['HTTP_USER_AGENT'];
                    $_SESSION['ip']=$_SERVER['REMOTE_ADDR'];
                    header('Location:index.php?page=registration');
                exit();
                } else {
                header("Location:index.php?logowanie=no");
                exit();
                }
    }
    function sessVerify(){
        if($_SESSION['identyfikator_sesji'] != session_id() || $_SESSION['ip'] != $_SERVER['REMOTE_ADDR'] || $_SESSION['klient']!=$_SERVER['HTTP_USER_AGENT']){
            header('Location:index.php');
            exit();
        }
    }
    
    function sessEnd(){
            $_SESSION[]=array(); //przypisuje pusta tablice. W efekcie wszystkie zmienne sesyjne giną.
            session_regenerate_id();
            session_destroy();
            header('Location:index.php');
            exit();
        
    }
}




