<?php
require_once 'config/Config.php';
//$sess = new MySession();
//$sess->sessVerify();
?>
<html>
    <head>
       <meta charset="UTF-8">
       <title>Logowanie administatora</title>
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
       <link rel="stylesheet" href="css/stylelog.css">
    </head>
    <?php

    if(isset($_POST['zaloguj'])) {
        $login = htmlentities($_POST['login']);
        $haslo = htmlentities($_POST['haslo']);
//        $haslosha1 = sha1(htmlentities($_POST['haslo']));
        $walidacja = new Validate();
        $walidacja->checkEmpty($login,'login');
        $walidacja->checkEmpty($haslo,'haslo');
        $walidacja->checkUsername($login,'login');
        $walidacja->minCharQuantity($login,'login',8);
        
        if($walidacja->liczError == 0) {
            
        $sess = new MySession();
        $sess->sessStart($login,$haslo);
        
            
        $polacz = new DbConnect();
        $zapytanie = "SELECT `username`,`password` FROM `admin` WHERE `username`='$login' AND `password`='$haslo'";
        $wynik = $polacz->db->query($zapytanie);
        $id_user = $wynik->fetch_object();
        if($wynik->num_rows ==1) {
        unset($walidacja);
        header('Location:dashboard.php');
        exit();
            } else {
            header('Location:logowanie.php?logowanie=no');
            exit();
            }
        }
    }
    
    unset($walidacja);
  
    if(isset($_POST['zmiana'])) {
    header('Location:zmiana.php');
    }

?>
<body>
    <!--'<div class="error" id="error">'.$this->error.'</div>'-->
<div id="txt" class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4"></div>
            <div class="col-xs-12 col-sm-4 col-md-4 front txt">
                <form style="padding-top: 50px;" class="form-horizontal" method="post">
                        <div class="form-group">
                            <h3>Login</h3>
                            <label class="col-md-4 control-label" for="textinput"></label>
                            <div class="col-md-8 col-md-offset-2">
                                <input id="login" name="login" type="login" placeholder="Enter your login" class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput"></label>
                            <div class="col-md-8 col-md-offset-2">
                                <input id="haslo" name="haslo" type="password" placeholder="Enter your password" class="form-control input-md">
                            </div>
                        </div>
                            <div class="form-group">
                            <label class="col-md-4 control-label" for="singlebutton"></label>
                            <div class="col-md-4">
                               <input type="submit" name="zaloguj" value="Sign in">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                                <input type="submit" name="zmiana"  value="I forgot my password">
                            </div>
                        </div>
                </form>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
            </div>
        </div>
</div>
</body>
</html>
