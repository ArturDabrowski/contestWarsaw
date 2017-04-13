<?php
require_once 'config/Config.php';
session_start();
    if(!isset($_SESSION['login'])){
        header('Location: logowanie.php');
        exit();
    }
?>
<html>
<head>
    <title>Change password</title>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stylelog.css">
</head>
<body>
<?php
    if(isset($_POST['zapisz'])) {
        $newPassword = htmlentities($_POST['newPassword']);
        $username = htmlentities($_POST['username']);
        $secretKey = htmlentities($_POST['secretKey']);
        $zapytanie_update = "UPDATE `admin` SET `password`='$newPassword' WHERE `username`='$username' AND `secretKey`='$secretKey'";
        $baza = new DbConnect();
        $baza->db->query($zapytanie_update);
        echo '<div id="panel">Hasło zostało zmienione.</div>';
        header('Refresh: 3;url=logowanie.php');
    }

?>
 <div id="txt" class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-4"></div>
            <div class="col-xs-12 col-md-4 front txt">
            <form style="padding-top: 50px;" class="form-horizontal" method="post">
                <div class="form-group">
                    <h3>Change password</h3>
                    <label class="col-md-4 control-label" for="textinput"></label>
                    <div class="col-md-8 col-md-offset-2">
                        <input id="newPassword" name="newPassword" type="password" placeholder="Enter your new password" class="form-control input-md">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput"></label>
                    <div class="col-md-8 col-md-offset-2">
                        <input id="username" name="username" type="text" placeholder="Enter your login" class="form-control input-md">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput"></label>
                    <div class="col-md-8 col-md-offset-2">
                        <input id="secretKey" name="secretKey" type="password" placeholder="Enter your secret key" class="form-control input-md">
                    </div>
                </div>
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton"></label>
                    <div class="col-md-4">
                        <input type="submit" name="zapisz" value="Change password">
                    </div>
                </div>
            </form>
            </div>
            <div class="col-xs-12 col-md-4">
            </div>
        </div>
    </div>
</body>
</html>
