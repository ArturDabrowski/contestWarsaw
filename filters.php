<?php
require_once 'config/Config.php';
?>    

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/filters.css">
        <script src="js/jquery-3.1.1.js"></script>
        <script src="js/bootstrap.js"></script>
        <title>Filters</title>
    </head>
    <body>
        <div id="container">
        <div id="nav">
        <form method="get">
            
           <a href="filters.php" class="btn btn-sm btn-primary mod" id="start" style="margin-right: 20px">Start</a>
           
            
           <div class="btn-group" id="sex">
               <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   Sex <span class="caret"></span>
               </button>
               <ul class="dropdown-menu">
                   <li><a href="?action=male"   style="margin-right: 20px">Male</a></li>
                   <li><a href="?action=female"   style="margin-right: 20px">Female</a></li>
               </ul>
           </div>

           <div class="btn-group" id="sex">
               <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   Answers <span class="caret"></span>
               </button>
               <ul class="dropdown-menu">
                   <li><a href="?action=goodFirstAnswer" id="male" style="margin-right: 20px">Good first answer</a></li>
                   <li><a href="?action=goodSecondAnswer"  id="male" style="margin-right: 20px">Good second answer</a></li>
                   <li><a href="?action=goodAllAnswers"  id="male" style="margin-right: 20px">Good all answers</a></li>
               </ul>
           </div>
                </div>
       </form>
       
        
        <table class="table table-striped">
        <thead>
            <tr>
                <th>Name <a href="?action=nameAsc" class="glyphicon glyphicon-chevron-up" id="male" style="margin-right: 20px"></a><a href="?action=nameDesc" class="glyphicon glyphicon-chevron-down" id="male" style="margin-right: 20px"></a></th>
                <th>Surname <a href="?action=surnameAsc" class="glyphicon glyphicon-chevron-up" id="male" style="margin-right: 20px"></a><a href="?action=surnameDesc" class="glyphicon glyphicon-chevron-down" id="male" style="margin-right: 20px"></a></th>
                <th>Date of birth</th>
                <th>Sex <a href="?action=sexAsc" class="glyphicon glyphicon-chevron-up" id="male" style="margin-right: 20px"></a><a href="?action=sexDesc" class="glyphicon glyphicon-chevron-down" id="male" style="margin-right: 20px"></a></th>
                <th>E-mail <a href="?action=mailAsc" class="glyphicon glyphicon-chevron-up" id="male" style="margin-right: 20px"></a><a href="?action=mailDesc" class="glyphicon glyphicon-chevron-down" id="male" style="margin-right: 20px"></a></th>
                <th>Phone number</th>
                <th>Address</th>
                <th>First question answer</th>
                <th>Second question answer</th>
                <th>Date of participation</th>
            </tr>
        </thead>
        <tbody>
            <?php
        
        if(isset($_GET['action']) && $_GET['action']=='male'){
                $zapytanie = "select * from `user` where `sex` = 'Male'"; 
            
            
            } elseif(isset($_GET['action']) && $_GET['action']=='female'){
                $zapytanie = "select * from `user` where `sex` = 'Female'";
                
                
            }  elseif(isset($_GET['action']) && $_GET['action']=='goodFirstAnswer'){
                $zapytanie = "select * from `user` where `answerFirst` = '1,748,916'";
 
            } elseif(isset($_GET['action']) && $_GET['action']=='goodSecondAnswer'){
                $zapytanie = "select * from `user` where `answerSecond` = '7'";
 
            } elseif(isset($_GET['action']) && $_GET['action']=='goodAllAnswers'){
                $zapytanie = "select * from `user` where `answerFirst` = '1,748,916' and `answerSecond` = '7'";
 
            } else {
                $zapytanie = "select * from `user`";
            }
            if(isset($_GET['action']) && $_GET['action'] =='nameAsc'){
        $zapytanie .= " ORDER BY `name` ASC";
    }
    
    
    if(isset($_GET['action']) && $_GET['action'] =='nameDesc'){
        $zapytanie .= " ORDER BY `name` DESC";
    }
    //surname
    if(isset($_GET['action']) && $_GET['action'] =='surnameAsc'){
        $zapytanie .= " ORDER BY `surname` ASC";
    }
    if(isset($_GET['action']) && $_GET['action'] =='surnameDesc'){
        $zapytanie .= " ORDER BY `surname` DESC";
    }
    //sex
    if(isset($_GET['action']) && $_GET['action'] =='sexAsc'){
        $zapytanie .= " ORDER BY `sex` ASC";
    }
    if(isset($_GET['action']) && $_GET['action'] =='sexDesc'){
        $zapytanie .= " ORDER BY `sex` DESC";
    }
    //email
    if(isset($_GET['action']) && $_GET['action'] =='mailAsc'){
        $zapytanie .= " ORDER BY `email` ASC";
    }
    if(isset($_GET['action']) && $_GET['action'] =='mailDesc'){
        $zapytanie .= " ORDER BY `email` DESC";
    }
            $conn = new DbConnect();
            $do_bazy_insert = $conn->db->query($zapytanie);

            $lp = 0;
            while ($wiersz=$do_bazy_insert->fetch_object()){

                $lp++;
            
            echo "
                
            <tr class>
                <td>$wiersz->name</td>
                <td>$wiersz->surname</td>
                <td>$wiersz->birthDate</td>
                <td>$wiersz->sex</td>
                <td>$wiersz->email</td>
                <td>$wiersz->phone</td>
                <td>$wiersz->address</td>
                <td>$wiersz->answerFirst</td>
                <td>$wiersz->answerSecond</td>
                <td>$wiersz->date</td>
                
            </tr>
            
            ";
            }
            if($lp==0) {
          echo 'Brak rekordów.';
        }

            ?>
        </tbody>
        </table>
            <div id="hehe"></div>
       </div>
    </body>
    
</html>
