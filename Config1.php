<?php
    define('SERVER', 'projekt2.piotrdmochowski.pl');
    define('USER', 'dmochu91_12');
    define('PASSWORD','1qazxsw2');
    define('DB','dmochu91_11');
    define('EMAIL_ADMIN','admin@example.com');
    define('WITRYNA', 'http://projekt2.piotrdmochowski.pl');
   
    function __autoload($className){
        require 'class/'.$className.'.php';
    }