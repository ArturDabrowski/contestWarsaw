<?php
    $title = 'Warsaw Contest';
    $page = 'welcome';
    if(isset($_GET['page'])){
        $page = htmlentities($_GET['page']);
    }
    switch ($page){
        case 'registration':
            $title = 'Registration';
            $page = 'registration';
        break;
        case 'thanks':
            $title = 'Thanks';
            $page = 'thanks';
        break;
        case 'byebye':
            $title = 'Bye bye';
            $page = 'byebye';
        break;
    default :
        
    }

