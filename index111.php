 <?php
require_once 'config/Config.php';
 ?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
//        if(isset($_POST['submit'])){
//            $ciag=$_POST['ciag'];
//            $licz = strlen($ciag);
//            for($i=$licz-1; $i>=0; $i--){
//                echo $ciag[$i];
//            }
//        }
        if(isset($_POST['submit'])){
            $ciag=$_POST['ciag'];
            
                echo strrev($ciag);
            }
            echo '<hr>';
            $kursanci = array(
                array('Marcin','Pankiewicz','22321','Baligród','29'),
                array('Adam','Małysz','21474','Wisła','39'),
                array('Jas','Fasola','25412','Londyn','21'),
                array('Weronika', 'Kubica', '25474', 'Piła', '21'),
                array('Ula','Ola', '26541','Ino','21')
            );
            echo $kursanci[2][0].'<br>';
            echo $kursanci[0][2].'<br>';
            $ziom2= implode(', ', $kursanci[1]);
            echo $ziom2;
//            for($i=0;$i<5;$i++){
//                echo $kursanci[1][$i].' ';
//            }
            
            echo '<hr>';
            if(isset($_POST['oblicz'])){
                $kwotaKredytu=$_POST['kwotaKredytu'];
                $iloscRat=$_POST['iloscRat'];
                $oprocentowanie=$_POST['oprocentowanie'];
                
                $opm=$oprocentowanie/12;
                $a=(1-$opm);
                $wynik=new Wzor();
                $wynik->Oblicz($kwotaKredytu, $iloscRat, $oprocentowanie, $opm, $a);
                
            }

        ?>
        <form method="post">
            <input name="ciag">
            <input type="submit" name="submit" value="odwroc">
        </form>
        <hr>
        <form method="post">
            <input name="kwotaKredytu" placeholder="Kwota kredytu">
            <input name="iloscRat" placeholder="Ilosc rat">
            <input name="oprocentowanie" placeholder="Oprocentowanie roczne">
            <input type="submit" name="oblicz" value="Oblicz">
        </form>
    </body>
</html>
