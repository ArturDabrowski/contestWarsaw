<!DOCTYPE html>
<html>

<head>
    <title>Warszawa-konkurs</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
        <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 head">
                <h1>Warsaw Contest <img height="70px" width="70px" src="img/syrenka.jpg"></h1>
            </div>
        </div>
    </div>

    <div id="txt" class="container-fluid front txt">
        <div class="row">
            <div class="col-xs-12 col-sm-4">
            </div>
            <div class="col-xs-12 col-sm-4">
                <?php
            require_once 'config/Config.php';

            if(isset($_POST['sendButton'])){
                $name = htmlentities($_POST['name']);
                $surname = htmlentities($_POST['surname']);
                $date=date('Y-m-d');
                $email = htmlentities($_POST['email']);
                $phone = htmlentities($_POST['phone']);
                $address = htmlentities($_POST['address']);
                $sex=$_POST['sex'];
                $answerFirst = $_POST['answerFirst'];
                //$questionSecond = $_POST['secondQuestion'];
                $answerSecond = $_POST['answerSecond'];
                $day=$_POST['day'];
                $month=$_POST['month'];
                $year=$_POST['year'];
                $birthDate=$year."-".$month."-".$day;
                
                
            
                $val=new Validate();
                $val->checkEmpty($name, 'name');
                $val->checkEmpty($surname, 'surname');
                $val->checkEmpty($address, 'adres');
                $val->minCharQuantity($name, 'name',25);
                $val->minCharQuantity($surname, 'surname',40);
                $val->validateEmail($email, 'email');
                $val->validatePhone($phone, 'phone');
                
                $val->checkSelect($sex, 'sex');
                $val->checkSelect($answerFirst, 'answerFirst');
                $val->checkSelect($answerSecond, 'answerSecond');

                $val->checkSelect($day, 'day');
                $val->checkSelect($month, 'month');
                $val->checkSelect($year, 'year');

                if(!isset($_POST['tick'])){
                    $val->isChecked('tick');
                }
                
//                if(!isset($_POST['year']) || !isset($_POST['month']) || !isset($_POST['day'])){
//                    $val->isChecked('date');
//                }
                
                            $conn = new DbConnect();
                
                        // Check connection
//                if ($conn->connect_error) {
//                    die("Connection failed: " . $conn->connect_error);
//                } else { echo 'OK'; }

                $query = "INSERT INTO user(name, surname, birthDate, sex, email, phone, address, answerFirst, answerSecond, date) VALUES('$name', '$surname', '$birthDate','$sex', '$email', '$phone', '$address', '$answerFirst','$answerSecond', '$date')";
                //echo $query;
                //exit();
                
                //$conn->db->query($query);
                
//                if ($conn->db->query($query) === TRUE) {
//                    echo "New record created successfully";
//                } else {
//                    echo "Error: " . $query . "<br>" . $conn->db->error;
//                }

                
         if($val->liczError==0) {
            $date= date('Y-m-d');
            $question1="Which answer is correct. How many people lives in Warsaw?";
            $question2="Which answer is correct. How many districts Warsaw has?";
            $correctAnswer1="1,748,916";
            $correctAnswer2="7";
            $tick='Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.';
            

            $mail=new SendMail('Warsaw Contest');
            $message="Name: $name<br><br> Surname: $surname<br><br> Birth date: $birthDate<br><br> Sex: $sex<br><br> "
                    . "Phone number: $phone<br><br> Address: $address<br><br> First question: $question1<br><br> "
                    . "Correct answer 1: $correctAnswer1<br><br><b> Your answer: $answerFirst</b><br><br> Second question: $question2<br><br> "
                    . "Correct answer 2: $correctAnswer2<br><br><b> Your answer: $answerSecond</b><br><br> Tick agreement: $tick<br><br> Date: $date";
            
            $mail->send($email, 'Thank You for registration in contest About Warsaw!',$message );
            }
        }
            
          
        ?>
        <form style="padding: 5px;" class="form-horizontal" method="post">



                    <!-- Form Name -->


                    <!-- Text input-->
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Name</label>
                        <div class="col-md-6">
                            <input id="textinput" name="name" type="text" placeholder="Enter your name" class="form-control input-md">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Surname</label>
                        <div class="col-md-6">
                            <input id="textinput" name="surname" type="text" placeholder="Enter your surname" class="form-control input-md">
                        </div>
                    </div>



                    <!-- Select Basic -->
                    <div class="form-group row">
  <label for="example-tel-input" class="col-md-4 col-form-label">Day of your birth</label>
  <div class="col-md-6">
    <select class="form-control"  id="country" name="day" class="input-xlarge">
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
    <select class="form-control"  id="country" name="month" class="input-xlarge">
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
    <select class="form-control"  id="country" name="year" class="input-xlarge">
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
                            <select id="selectbasic" name="sex" class="form-control">
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
                            <input id="textinput" name="email" type="text" placeholder="Enter your email" class="form-control input-md">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Phone number</label>
                        <div  style="float: left; width: 100px;" class="col-md-6">
                           <select style="width: 65px; height: 35px;" class="form-control input-sm"  id="country" name="prefix" class="input-sm">
                            <option value="" selected="selected"></option>
                            <option value="1">+48</option>
                            <option value="2">+30</option>
                            <option value="3">+22</option>
                            <option value="4">+23</option>
                            <option value="5">+24</option>
                            </select>
                           </div>
                           <div style="float: left">
                            <input style="width: 105px" id="textinput" name="phone" type="text" placeholder="Phone" class="form-control input-md">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Adress to send prize</label>
                        <div class="col-md-6">
                            <input id="textinput" name="address" type="text" placeholder="Enter your adress" class="form-control input-md">
                        </div>
                    </div>
                    

                    <!-- Select Basic -->
                    <div class="form-group" id="Question">
                        <label class="col-md-4 control-label" for="selectbasic">How many people lives in Warsaw?</label>
                        <div class="col-md-6">
                            <select id="selectbasic" name="answerFirst" class="form-control">
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
                            <select id="selectbasic" name="answerSecond" class="form-control">
                                  <option value="0"></option>
                                  <option value="3">3</option>
                                  <option value="5">5</option>
                                  <option value="7">7</option>
                                  <option value="11">11</option>
                            </select>
                        </div>
                    </div>
                      <div class="form-group" id="Question3">
                        <label class="col-md-4 control-label" for="selectbasic">First president of Warsaw?</label>
                        <div class="col-md-6">
                            <select id="selectbasic" name="answerThird" class="form-control">
                                  <option value="0"></option>
                                  <option value="Stefan Starzyński">Stefan Starzyński</option>
                                  <option value="Ignacy Wyssogota Zakrzewski">Ignacy Wyssogota Zakrzewski</option>
                                  <option value="Jakub Ignacy Łaszczyński">Jakub Ignacy Łaszczyński</option>
                            </select>
                        </div>
                    </div>
                      <div class="form-group" id="Question4">
                        <label class="col-md-4 control-label" for="selectbasic"> Actual president of Warsaw?</label>
                        <div class="col-md-6">
                            <select id="selectbasic" name="answerFourth" class="form-control">
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
                            <input type="submit" name="sendButton"  value="Send email">
                        </div>
                         <div class="col-md-6 col-md-offset-3">
                <a style="text-decoration: none; color: black" href=""><h2>Regulations</h2></a>               
            </div>
                   <div class="container-fluid col-xs-12"><?php unset($val);  ?></php></div>
                    </div>
                    
                </form>
       
            </div>
            <div class="col-xs-12 col-sm-4">
            </div>

        </div>
    </div>
       <div class="container-fluid head">
        <div class="row">
            <div class="col-xs-12">
              <div class="span4 proj-div" data-toggle="modal" data-target="#GSCCModal" style="cursor:pointer">Contact</div>

            <div id="GSCCModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;  </button>
                            <h4 class="modal-title" id="myModalLabel">Kontakt Urząd m.st. Warszawy</h4>
                        </div>
                        <div style="color: black;"  class="modal-body">
                            Adres: plac Bankowy 3/5<br> 00-950 Warszawa<br> Godziny otwarcia: 08:00 - 16:00<br> mail: kontakt@umwarszawa.pl

                        </div>
                    </div>
                </div>
            </div>
         </div>
         
         
            <div class="span4 proj-div" data-toggle="modal" data-target="#GSCCModal1" style="cursor:pointer">Rules</div>

            <div id="GSCCModal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;  </button>
                            
                            <h4 style="color: black;" #000000 class="modal-title" id="myModalLabel" >Rules</h4>
                          
                        </div>
                        <div style="color: black;"  class="modal-body">
                           Lorem ipsum dolor sit amet, consectetur adipisicing elit. In harum molestiae ratione vel laboriosam quo.<br>
                           &sect;<br>
                 

                        </div>
                    </div>
                </div>
            </div>
                <p>Copyright &copy; Urząd Miasta Warszawa</p>
            </div>
        </div>
    </div>
     
</body>
<script src="js/jquery-3.2.0.js"></script>
<script src="js/bootstrap.js"></script>



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

</html>