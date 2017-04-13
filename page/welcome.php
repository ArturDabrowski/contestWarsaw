<?php
    session_start();
    if(isset($_POST['sendButton'])){
        $code = htmlentities($_POST['code']);
        $baza = new DbConnect();
        $query = "SELECT * FROM codes WHERE code = '$code'";
        $rezultat = $baza->db->query($query);
        if($rezultat->num_rows == 1){
            $row = $rezultat->fetch_assoc();
            $_SESSION['code'] = $row['code'];
            $query1 = "SELECT code FROM codes WHERE code = '$code' AND active = 0";
            $res = $baza->db->query($query1);
            if($res->num_rows == 1){
                header('Location: index.php?page=registration');
                exit();
            }
            $query11 = "SELECT code FROM codes WHERE code = '$code' AND active = 1";
            $res1 = $baza->db->query($query1);
            if($res1->num_rows == 1){
                //kod wykorzystany
                header('Location: index.php');
                exit();
            }
        }else{
            //brakkodu w bazie
            header('Location: index.php');
            exit();
        }    
    }
        
?>



 <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 head">
                <h1>Warsaw Contest <img height="70px" width="70px" src="img/syrenka.png"></h1>
            </div>
        </div>
        <div class="row stomach">
            <div class="col-xs-0 col-sm-1 col-md-2 col-lg-2"></div>
            <div class="col-xs-12 col-sm-10 col-md-8 col-lg-8">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat commodi distinctio repudiandae, quaerat expedita ullam natus ipsa debitis magni esse amet laborum voluptatibus vero a accusantium, perferendis facilis ipsam sunt minus et. Quisquam officiis, consectetur libero! Molestias sequi maiores ab autem soluta nulla eum iusto corporis nobis, totam harum odit numquam aspernatur, dolorem ducimus, repudiandae labore cupiditate dolore voluptatum! Atque culpa sint, tempore porro obcaecati quas veritatis accusantium quibusdam sed quae fugit dolorum, numquam dolores commodi rerum officiis suscipit. Recusandae in sint tempore consequuntur nulla vero dolore temporibus sit facere, ex suscipit, fuga explicabo officiis dicta </p>
                <div class="form-group col-xs-12 col-sm-offset-2">
                    <form method="POST" action="index.php">
                        <div  style="float: left;" class="col-md-8">
                        <input id="textinput" name="code" type="text" placeholder="Input your code" class="form-control input-md">
                           </div><div class="col-xs-offset-4 col-sm-offset-0" style="float: left">
                            <input style="height: 35px;" type="submit" name="sendButton" value="Submit">
                            
                        </div>
                    </form>
                    </div>
                <div style="clear: both">
                    
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis, corporis. Eligendi, animi dolorem. Esse beatae, rem excepturi tempore ducimus? Dicta pariatur omnis iure tempore nisi provident magnam velit id repellendus a illum in facere fuga unde temporibus, ad totam expedita asperiores soluta praesentium accusamus hic, consectetur veniam! Maxime, laboriosam deserunt!</p>
                </div>

                <div class="col-xs-12">
                    <!--    Carousel        -->
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="img/pexels1.jpg" alt="...">
                                <div class="carousel-caption">

                                </div>
                            </div>
                            <div class="item">
                                <img src="img/pexels2.jpg" alt="...">
                                <div class="carousel-caption">

                                </div>
                            </div>
                            <div class="item">
                                <img src="img/pexels3.jpg" alt="...">
                                <div class="carousel-caption">

                                </div>
                            </div>

                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div>
                    <p>consectetur adipisicing elit. Magni nesciunt commodi animi quo est accusantium, sed in cumque quidem dolor ratione tenetur libero hic repudiandae eos. Esse, tenetur eveniet! Vero temporibus sequi nostrum dolor reprehenderit saepe iusto nemo maiores nesciunt nisi tempora ad provident ratione tempore, accusantium cupiditate sed perspiciatis consequuntur perferendis natus accusamus porro, ullam inventore. Inventore iure at suscipit, quibusdam, quod qui dolor architecto quas vel fugit exercitationem possimus ipsum deserunt. Delectus nulla, omnis voluptatibus quibusdam odio, dolores asperiores minima vero porro culpa consequuntur, exercitationem possimus error itaque, blanditiis. Modi accusamus odio, a quae libero maxime excepturi.</p>
                </div>
            </div>
            <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2"></div>
        </div>

    </div>

    <div style="clear: both;" class="container-fluid foot">
        <div class="row">
            <div class="col-xs-12">
                <a style="text-decoration: none; color: white" href="">
                    <h3>Contact</h3>
                </a>
                <p>Copyright &copy; Urząd Miasta Warszawa</p>
            </div>
        </div>
    </div>
<?php
    session_destroy();
?>
