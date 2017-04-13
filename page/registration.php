<?php
    session_start();
    if(!isset($_SESSION['code'])){
        header('Location: index.php');
        exit();
    }
?>

<div id="txt" class="container-fluid front txt">
        <div class="row">
            <div class="col-xs-12 col-md-4">
            </div>
            <div class="col-xs-12 col-md-4">
            <?php
            require_once 'config/Config.php';
            
            if(isset($_POST['sendButton'])){
                $name = htmlentities($_POST['name']);
                $surname = htmlentities($_POST['surname']);
                $date=date('Y-m-d');
                $email = htmlentities($_POST['email']);
                $phone = htmlentities($_POST['phone']);
                $prefix = ($_POST['prefix']);
                
                $sex=$_POST['sex'];
                $answerFirst = $_POST['answerFirst'];
                //$questionSecond = $_POST['secondQuestion'];
                $answerSecond = $_POST['answerSecond'];
                $answerThird = $_POST['answerThird'];
                $answerFourth = $_POST['answerFourth'];
                $day=$_POST['day'];
                $month=$_POST['month'];
                $year=$_POST['year'];
                $birthDate=$year."-".$month."-".$day;
                $phoneNumber=$prefix." ".$phone;
                $street=$_POST['street'];
                $building=$_POST['building'];
                $flat=$_POST['flat'];
                $postCode=$_POST['postCode'];
                $city=$_POST['city'];
                $country=$_POST['country'];
                $code=$_SESSION['code'];
                
                
                
            
                $val=new Validate();
                $val->checkEmpty($name, 'name');
                $val->checkEmpty($surname, 'surname');
                $val->checkEmpty($street, 'street');
                $val->checkEmpty($building, 'building');
                $val->checkEmpty($flat, 'flat');
                $val->checkEmpty($postCode, 'postCode');
                $val->checkEmpty($city, 'city');
                $val->checkEmpty($country, 'country');
                
                $val->minCharQuantity($name, 'name',25);
                $val->minCharQuantity($surname, 'surname',40);
                $val->minCharQuantity($street, 'street',40);
                $val->minCharQuantity($city, 'city',40);
                $val->minCharQuantity($country, 'country',35);
                
                $val->validateEmail($email, 'email');
                $val->validatePhone($phone, 'phone');
                $val->validatePostCode($postCode, 'postCode');
                
                $val->checkSelect($sex, 'sex');
                $val->checkSelect($answerFirst, 'answerFirst');
                $val->checkSelect($answerSecond, 'answerSecond');
                $val->checkSelect($answerThird, 'answerThird');
                $val->checkSelect($answerFourth, 'answerFourth');
                $val->checkSelect($day, 'day');
                $val->checkSelect($month, 'month');
                $val->checkSelect($year, 'year');
                $val->checkSelect($prefix, 'prefix');
                if(!isset($_POST['tick'])){
                    $val->isChecked('tick');
                }
                
                if($val->liczError==0) {
                 $conn = new DbConnect();
                $query = "INSERT INTO user(name, surname, birthDate, sex, email, phone, street, buildingNr, flatNr, postCode, city, country, answerFirst, answerSecond, answerThird, answerFourth, code, date) VALUES('$name', '$surname', '$birthDate','$sex', '$email', '$phoneNumber', '$street', '$building', '$flat', '$postCode', '$city', '$country', '$answerFirst','$answerSecond','$answerThird','$answerFourth','$code', '$date')";
                if ($conn->db->query($query) === TRUE) {
                    echo header('Location: index.php?page=byebye');
                } else {
                    echo "Error: " . $query . "<br>" . $conn->db->error;
                }                 
                $code = $_SESSION['code'];
                $sql = "UPDATE codes SET active = 1 WHERE code = '$code'";
                $rezultat1 = $conn->db->query($sql);
                
         
            $date= date('Y-m-d');
            $question1="Which answer is correct. How many people lives in Warsaw?";
            $question2="Which answer is correct. How many districts Warsaw has?";
            $question3="Which answer is correct. First president of Warsaw?";
            $question4="Which answer is correct. Actual president of Warsaw?";
            $correctAnswer1="1,748,916";
            $correctAnswer2="7";
            $correctAnswer3="Ignacy Wyssogota Zakrzewski";
            $correctAnswer4="Hanna Gronkiewicz Waltz";
            $tick='Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.';
            
            $mail=new SendMail('Warsaw Contest');
            $message="Name: $name<br><br> Surname: $surname<br><br> Birth date: $birthDate<br><br> Sex: $sex<br><br> "
                    . "Phone number: $phoneNumber<br><br> Street: $street<br><br> Building: $building<br><br> Flat: $flat<br><br> "
                    . "Postcode: $postCode<br><br> City: $city<br><br> Country: $country<br><br> First question: $question1<br><br> "
                    . "Correct answer: $correctAnswer1<br><br><b> Your answer: $answerFirst</b><br><br>"
                    . " Second question: $question2<br><br> Correct answer: $correctAnswer2<br><br><b>"
                    . " Your answer: $answerSecond</b><br><br> Third question: $question3<br><br>"
                    . " Correct answer: $correctAnswer3<br><br><b> Your answer: $answerThird</b><br><br>"
                    . " Fourth question: $question4<br><br> Correct answer: $correctAnswer4<br><br><b>"
                    . " Your answer: $answerFourth</b><br><br> Tick agreement: $tick<br><br> Date: $date";
            
            $mail->send($email, 'Thank You for registration in contest About Warsaw!',$message );
            }
        }
            
          
        ?>
                <form style="padding: 5px;" class="form-horizontal" method="post">



                    <!-- Form Name -->


                    <!-- Text input-->
                    
                    <div class="form-group">
                       <h3>TITLE CONTEST     <img height="60px" width="60px" src="img/ZNAK_PROMOCYJNY_FC_PL-01.png"></h3>
                        <label class="col-md-4 control-label" for="textinput">Name</label>
                        <div class="col-md-6">
                            <input id="textinput" name="name" type="text" value="<?php if(isset($_POST['name'])){echo $_POST['name'];}?>" placeholder="Enter your name" class="form-control input-md">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Surname</label>
                        <div class="col-md-6">
                            <input id="textinput" name="surname" type="text" value="<?php if(isset($_POST['surname'])){echo $_POST['surname'];}?>" placeholder="Enter your surname" class="form-control input-md">
                        </div>
                    </div>



                    <!-- Select Basic -->
                    <div class="form-group row">
  <label for="example-tel-input" class="col-md-4 col-form-label">Day of your birth</label>
  <div class="col-md-6">
    <select class="form-control"  id="country" name="day" class="input-xlarge" value="<?php if(isset($_POST['day'])){echo $_POST['day'];}?>">
                            <option value="" selected="selected">Day</option>
                            <option value="01">1</option>
                            <option value="02">2</option>
                            <option value="03">3</option>
                            <option value="04">4</option>
                            <option value="05">5</option>
                            <option value="06">6</option>
                            <option value="07">7</option>
                            <option value="08">8</option>
                            <option value="09">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
    </select>
  </div>
</div>


<div class="form-group row">
  <label for="example-tel-input" class="col-md-4 col-form-label">Month of your birth</label>
  <div class="col-md-6">
    <select class="form-control"  id="country" name="month" value="<?php if(isset($_POST['month'])){echo $_POST['month'];}?>" class="input-xlarge">
                            <option value="" selected="selected">Month</option>
                            <option value="01">January</option>
                            <option value="02">February</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        
    </select>
  </div>
</div>



<div class="form-group row">
  <label for="example-tel-input" class="col-md-4 col-form-label">Year of your birth</label>
  <div class="col-md-6">
    <select class="form-control"  id="country" name="year" value="<?php if(isset($_POST['year'])){echo $_POST['year'];}?>"class="input-xlarge">
                            <option value="" selected="selected">Year</option>
                            <option value="1980">1980</option>
                            <option value="1981">1981</option>
                            <option value="1981">1982</option>
                            <option value="1983">1983</option>
                            <option value="1984">1984</option>
                            <option value="1985">1985</option>
                            <option value="1986">1986</option>
                            <option value="1987">1987</option>
                            <option value="1988">1988</option>
                            <option value="1989">1989</option>
                            <option value="1990">1990</option>
                            <option value="1991">1991</option>
                            <option value="1992">1992</option>
                            <option value="1993">1993</option>
                            <option value="1994">1994</option>
                            <option value="1995">1995</option>
                            <option value="1996">1996</option>
                            <option value="1997">1997</option>
                            <option value="1998">1998</option>
                            <option value="1999">1999</option>

    </select>
  </div>
</div>

                    <!-- Select Basic -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="selectbasic">Sex</label>
                        <div class="col-md-6">
                            <select id="selectbasic" name="sex" value="<?php if(isset($_POST['sex'])){echo $_POST['sex'];}?>" class="form-control">
                                  <option value=""></option>
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                  
                            </select>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Email</label>
                        <div class="col-md-6">
                            <input id="textinput" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>" type="text" placeholder="Enter your email" class="form-control input-md">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Phone number</label>
                        <div  style="float: left; width: 100px;" class="col-md-6">
                           <select style="width: 65px; height: 35px;" class="form-control input-sm"  id="country" name="prefix" value="<?php if(isset($_POST['prefix'])){echo $_POST['prefix'];}?>" class="input-sm">
                            <option value="" selected="selected"></option>
                            <option value="+48">+48</option>
                            <option value="+47">+47</option>
                            <option value="+34">+34</option>
                            <option value="+49">+49</option>
                            <option value="+44">+44</option>
                            </select>
                           </div><div style="float: left">
                            <input style="width: 105px" id="textinput" name="phone" value="<?php if(isset($_POST['phone'])){echo $_POST['phone'];}?>" type="text" placeholder="Phone" class="form-control input-md">
                        </div>
                    </div>

                    <!-- Text input-->
                                        <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Street</label>
                        <div class="col-md-6">
                            <input id="textinput" name="street" value="<?php if(isset($_POST['street'])){echo $_POST['street'];}?>" type="text" placeholder="Enter your street" class="form-control input-md">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Building</label>
                        <div class="col-md-6">
                            <input id="textinput" name="building" value="<?php if(isset($_POST['building'])){echo $_POST['building'];}?>" type="text" placeholder="Enter your building nr" class="form-control input-md">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Flat</label>
                        <div class="col-md-6">
                            <input id="textinput" name="flat" value="<?php if(isset($_POST['flat'])){echo $_POST['flat'];}?>" type="text" placeholder="Enter your flat nr" class="form-control input-md">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Post code</label>
                        <div class="col-md-6">
                            <input id="textinput" name="postCode" value="<?php if(isset($_POST['postCode'])){echo $_POST['postCode'];}?>" type="text" placeholder="Enter your post code" class="form-control input-md">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">City</label>
                        <div class="col-md-6">
                            <input id="textinput" name="city" value="<?php if(isset($_POST['city'])){echo $_POST['city'];}?>" type="text" placeholder="Enter your city" class="form-control input-md">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Country</label>
                        <div class="col-md-6">
                            <input id="textinput" name="country" value="<?php if(isset($_POST['country'])){echo $_POST['country'];}?>" type="text" placeholder="Enter your country" class="form-control input-md">
                        </div>
                    </div>
                    

                    <!-- Select Basic -->
                    <div class="form-group" id="Question">
                        <label class="col-md-4 control-label" for="selectbasic">How many people lives in Warsaw?</label>
                        <div class="col-md-6">
                            <select id="selectbasic" name="answerFirst" value="<?php if(isset($_POST['answerFirst'])){echo $_POST['answerFirst'];}?>" class="form-control" value="<?php if(isset($_POST['answerFirst'])){echo $_POST['answerFirst'];}?>">
                                  <option value="0"></option>
                                  <option value="931,321">931,321</option>
                                  <option value="1,748,916">1,748,916</option>
                                  <option value="2,432,098"> 2,432,098</option>
                            </select>
                        </div>
                    </div>


                    <!-- Select Basic -->
                    <div class="form-group" id="Question2">
                        <label class="col-md-4 control-label" for="selectbasic">How many districts Warsaw has?</label>
                        <div class="col-md-6">
                            <select id="selectbasic" name="answerSecond" value="<?php if(isset($_POST['answerSecond'])){echo $_POST['answerSecond'];}?>" class="form-control">
                                  <option value="0"></option>
                                  <option value="3">3</option>
                                  <option value="5">5</option>
                                  <option value="7">7</option>
                                  <option value="11">11</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" id="Question3">
                        <label class="col-md-4 control-label" for="selectbasic">How many districts Warsaw has?</label>
                        <div class="col-md-6">
                            <select id="selectbasic" name="answerThird" value="<?php if(isset($_POST['answerThird'])){echo $_POST['answerThird'];}?>" class="form-control">
                                  <option value="0"></option>
                                  <option value="Stefan Starzyński">Stefan Starzyński</option>
                                  <option value="Ignacy Wyssogota Zakrzewski">Ignacy Wyssogota Zakrzewski</option>
                                  <option value="Jakub Ignacy Łaszczyński">Jakub Ignacy Łaszczyński</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" id="Question4">
                        <label class="col-md-4 control-label" for="selectbasic">How many districts Warsaw has?</label>
                        <div class="col-md-6">
                            <select id="selectbasic" name="answerFourth" value="<?php if(isset($_POST['answerFourth'])){echo $_POST['answerFourth'];}?>"class="form-control">
                                  <option value="0"></option>
                                  <option value="Jarosław Kaczyński">Jarosław Kaczyński</option>
                                  <option value="Ryszard Petru">Ryszard Petru</option>
                                  <option value="Hanna Gronkiewicz Waltz">Hanna Gronkiewicz Waltz</option>
                            </select>
                        </div>
                    </div>
                    <input type="checkbox" name="tick"> Tick Agreement

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="singlebutton"></label>
                        <div class="col-md-4">
                            <input type="submit" name="sendButton"  value="Send email" id="agriment">
                        </div>
                         <div class="col-md-6 col-md-offset-3">
                <a style="text-decoration: none; color: black" href=""><h2>Regulations</h2></a><h2>Contact</h2>
                <a href="tel:+191 15">Call</a><br>
               <a href="mailto:um@warszawa.pl">Send an Email</a>
              <p>Copyright &copy; Urząd Miasta Warszawa</p>
                
            </div>
                   <div class="container-fluid col-md-6 col-md-offset-3 "><?php unset($val);  ?></php></div>
                    </div>
                    
                </form>
       
            </div>
            <div class="col-xs-12 col-md-4">
            </div>

        </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
    
$(function() {
    $('#Question2').hide();
    $('#Question').change(function() {
        if ($(this).is(":selected")) {
            $('#Question2').hide();
        } else {
            $('#Question2').show();
        }
    })

    
});
    $(function() {
    $('#Question3').hide();
    $('#Question2').change(function() {
        if ($(this).is(":selected")) {
            $('#Question3').hide();
        } else {
            $('#Question3').show();
        }
    })
    
});
    $(function() {
    $('#Question4').hide();
    $('#Question3').change(function() {
        if ($(this).is(":selected")) {
            $('#Question4').hide();
        } else {
            $('#Question4').show();
        }
    })
    
});
   </script>
   
