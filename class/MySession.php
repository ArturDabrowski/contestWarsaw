<?php
    class MySession{
        function __construct() {
            session_start();
        }
        function sessStart($login, $email){
            $zapytanie = "SELECT `id_user` FROM `user` WHERE `name`='$login' AND `email`='$email'";
            $polacz = new DbConn();
            $wynik = $polacz->db->query($zapytanie);
            $wynik2 = $wynik->fetch_object();
            if($wynik->num_rows == 1){
                if(isset($_POST['zapamietaj']) && $_POST['zapamietaj'] == 'tak'){
                    //tworzzenie ciastka,
                    //setcookie(nazwa, wartosc, data ważności)
                    setcookie('login',$login,time()+(60*60*24*7));
                }
                else{
                    setcookie('login', $login,time()-1);
                }
                $_SESSION['identyfikator_sesji'] = session_id();
                $_SESSION['id_user'] = $wynik2->id_user;
                $_SESSION['login'] = $wynik2->login;
                $_SESSION['klient'] = $_SERVER['HTTP_USER_AGENT'];
                $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
                header('Location: indexlog.php');
                exit();
            }
            else{
                header('Location: index.php?logowanie=no');
                //echo 'Podałeś złe dane logowania';
                exit();
            }
        }
        function sessVerify(){
            if(!isset($_SESSION['id_user']) || $_SESSION['identyfikator_sesji'] != session_id() 
                || $_SESSION['ip'] != $_SERVER['REMOTE_ADDR'] 
                || $_SESSION['klient'] != $_SERVER['HTTP_USER_AGENT']){
                header('Location: index.php');
                exit();
            }
        }
        function sessEnd(){
            $_SESSION[] = array();
            session_regenerate_id();
            session_destroy();
            header('Location: index.php');
            exit();
        }
    }
