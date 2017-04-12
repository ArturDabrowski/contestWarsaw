<?php
require_once 'config/Config.php';
if(!isset($_GET['action'])){
                header('location:index.php');
            }        
?>
<div id="txt1" class="container-fluid front txt">
        <div class="row">
            <div class="col-xs-12 col-sm-4">
            </div>
            <div class="col-xs-12 col-sm-4">
                
        <form style="padding: 5px;" class="form-horizontal" method="post">



                    <!-- Form Name -->


                    <!-- Text input-->
                    
                    <div class="form-group">
                       <h3>WARSAW CONTEST     <img height="40px" width="40px" src="img/ZNAK_PROMOCYJNY_FC_PL-01.png"></h3>
                           <div class="col-md-6 text">
                            <h4>Thanks for registration</h4>
                            <p>Name: <span id="namee"></span></p>
                            <p>Surname: <span id="surnamee"></span></p>
                            <p>Adres: <span id="adress"></span></p>
                            <p>Birth: <span id="birthh"></span></p>
                            <p>E-mail: <span id="emaill"></span></p>
                        </div>
                    </div>  
                      <div class="form-group">
                       <h4>Information about register we send on your e-mail</h4>
                      
                    </div>
                      <div class="form-group">
                      
                
                <div class="col-xs-12">
                    
                    <div class="row">
                        
                        <div class="col-xs-6 col-md-3">
                            
                            <span class="thumbnail">
                                
                                <img src="img/pexels1.jpg">
                                
                            </span>
                            
                        </div>
                        
                        <div class="col-xs-6 col-md-3">
                            
                            <span class="thumbnail">
                                
                                <img src="img/pexels2.jpg">
                                
                            </span>
                            
                        </div>
                        
                        <div class="col-xs-6 col-md-3">
                            
                            <span class="thumbnail">
                                
                                <img src="img/pexels3.jpg">
                            </span>
                        </div>      
                    </div>   
                </div>  
             
        <!-- Large modal -->
<div class="modal fade bs-example-modal-lg" id="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <img class="img-responsive" src="img/image.jpg">
    </div>
  </div>
</div>
                      
                    </div>


                    <!-- Button -->
                    <div class="form-group">
                      
                         <div class="col-md-6 col-md-offset-3">
                <h4>Contact</h4>
                
               <a href="mailto:um@warszawa.pl">Send an Email</a>
              <p>Copyright &copy; Urząd Miasta Warszawa</p>
                
            </div>
                   
                  </div>  
                </form>
       
            
            <div class="col-xs-12 col-sm-4">
            </div>

        </div>
    </div>
    </div>
     

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>            
            
            //$('span.thumbnail > img') - do wszystkich span o klasie thumbnail będącego bezpośrednio powiązanym z img
            $('span.thumbnail > img').click( function () {
                
                var url = $(this).attr("src"); //chcę pobrać src z klikniętego obrazka, oplatam this $() dzięki temu this posiada funkcje jQuery
                
                $('#modal img').attr( "src", url );
                
               $('#modal').modal('toggle');
            });
        
    </script>