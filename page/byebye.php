
    <?php


    session_start();
    if(!isset($_SESSION['code'])){
        header('Location: index.php');
        exit();
    }
     require_once 'config/Config.php';
     $query = "SELECT * FROM user WHERE id_user = (SELECT MAX(id_user) FROM user)";
     $baza=new DbConnect();
     $rezultat = $baza->db->query($query);
     $row=$rezultat->fetch_object();
     
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 head">
                <h1>Warsaw Contest <img height="70px" width="70px" src="img/syrenka.jpg"></h1>
            </div>
        </div>
    </div>
    <div id="txt1" class="container-fluid front txt">
        <div class="row">
            <div class="col-xs-12 col-sm-4">
            </div>
            <div class="col-xs-12 col-sm-4">
                
        <form style="padding: 5px;" class="form-horizontal" method="post">



                    <!-- Form Name -->


                    <!-- Text input-->
                    
                    <div style="margin-top:50px;" class="form-group">
                       
                           <div class="col-md-6 col-md-offset-3 text">
                            <h3>Thanks for registration</h3></div>
                            <div class="col-xs-4 col-md-6" style="text-align: left; margin-left: 5px;">
                            <p>Name: <span id="namee"><?php echo $row->name?></span></p>
                            <p>Surname: <span id="surnamee"><?php echo $row->surname?></span></p>
                            <p>Adres: <span id="adress"><?php echo "$row->street $row->buildingNr $row->flatNr $row->postCode $row->city $row->country"?></span></p>
                            <p>Birth: <span id="birthh"><?php echo $row->birthDate?></span></p>
                            <p>E-mail: <span id="emaill"><?php echo $row->email?></span></p>
                        </div>
                    </div>  
                      <div class="form-group">
                          <h4>Information about register<br> we send on your e-mail</h4>
                      
                    </div>
                      <div class="form-group">
                      
                
                <div class="col-xs-12">
                    
                    <div class="row">
                        
                        <div class="col-xs-4 col-md-4">
                            
                            <span class="thumbnail">
                                
                                <img src="img/pexels1.jpg">
                                
                            </span>
                            
                        </div>
                        
                        <div class="col-xs-4 col-md-4">
                            
                            <span class="thumbnail">
                                
                                <img src="img/pexels2.jpg">
                                
                            </span>
                            
                        </div>
                        
                        <div class="col-xs-4 col-md-4">
                            
                            <span class="thumbnail">
                                
                                <img src="img/pexels4.jpg">
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
        
                </form>
       
            
            <div class="col-xs-12 col-sm-4">
            </div>

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
                            
                            <h4 style="color: black;" class="modal-title" id="myModalLabel" >Rules</h4>
                          
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
 <script src="js/jquery-3.2.0.js"></script>
<script src="js/bootstrap.js"></script>
    <script>            
            
            //$('span.thumbnail > img') - do wszystkich span o klasie thumbnail będącego bezpośrednio powiązanym z img
            $('span.thumbnail > img').click( function () {
                
                var url = $(this).attr("src"); //chcę pobrać src z klikniętego obrazka, oplatam this $() dzięki temu this posiada funkcje jQuery
                
                $('#modal img').attr( "src", url );
                
               $('#modal').modal('toggle');
            });
        
    </script> 
