<?php

class Validate {
    //wlasciwosc $error bedzie sluzyc do przechowywania komunikatu bledow
    private $error;
    public $liczError=0;
            
    function __construct() {
        $this->error='';
        $this->liczError=0;
    }
    function AddError($text){
        $this->error.=$text.'<br>';
    }
    function __destruct() {
        if(!empty($this->error)){
            echo '<div class="error" id="error">'.$this->error.'</div>';
        }
    }
    
    function checkEmpty($ciag,$pole){
        //trim wycina puste znaki z poczatku i konca ciagu, a empty sprawdza czy nie jest puste
        if(!(trim($ciag))){
            $this->AddError("Field $pole can't be empty.");
            $this->liczError++;
        }
    }
    function minCharQuantity($ciag,$pole,$min){
        if(mb_strlen($ciag)>$min){
            $this->AddError("Field $pole can't have more than $min characters.");
            $this->liczError++;
        }
    }
       
    function validatePhone($ciag, $pole){
        if(!preg_match('/^[0-9].{0,11}$/', trim($ciag))) {
            $this->AddError("You can type max 12 digits.");
            $this->liczError++;
        }
    }
    function checkSelect($ciag, $pole){
        if($ciag == '') {
           $this->AddError("You have to check field $pole");
           $this->liczError++;
        } 
    }

    
    function validateEmail($ciag, $pole){
        if(!filter_var($ciag, FILTER_VALIDATE_EMAIL)){
            $this->AddError("Field $pole doesn't have correct e-mail address");
            $this->liczError++;

        }
    }
    
    
    function isChecked($pole){
        $this->AddError("Pole $pole musi byc zaznaczone.");
        $this->liczError++;
    }
    function validatePostCode($ciag, $pole){
        if(!preg_match('/^[0-9]{2}-?[0-9]{3}$/Du', trim($ciag))) {
            $this->AddError("Postcode has to have specific format: XX-XXX.");
            $this->liczError++;
        }
    }
    
   
    
}

