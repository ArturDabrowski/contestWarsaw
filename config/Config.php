<?php
    define('SERVER', 'localhost');
    define('USER', 'root');
    define('PASSWORD','');
    define('DB', 'warsawcontest');
    define('EMAIL_ADMIN','admin@example.com');
    define('WITRYNA', 'http://localhost/contestWarsaw/');
   
    function __autoload($className){
        require 'class/'.$className.'.php';
    }
