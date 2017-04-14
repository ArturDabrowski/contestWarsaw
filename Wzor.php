<?php

class Wzor {
    function Oblicz($kwotaKredytu, $iloscRat, $oprocentowanie, $opm, $a) {
        $rata=($kwotaKredytu * $opm) / (1 - (1 /  pow($a, $iloscRat) ));
        $kwotaDoSplaty=$kwotaKredytu.($rata*$iloscRat);
        $odsetkiDoZaplaty=$kwotaDoSplaty-$kwotaKredytu;
        echo  'Rata: '.$rata.' Kwota do splaty: '.$kwotaDoSplaty.' Odsetki do splaty: '.$odsetkiDoZaplaty;
    }
}

