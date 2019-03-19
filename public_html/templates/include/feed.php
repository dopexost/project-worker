 <section class="p-t-40 feature_3" id="feature">
   
     
        <div class="container">
            <div class="row">
                
                   <div class="heading" style="padding-left: 5px;"> 
                            <div class="heading_border bg_red" ></div>
                            <h2>Лог событий</h2>
                        </div>

                <div class="col-md-4 col-sm-4 col-xs-12 text-center" style = "padding-left: 5px; text-align: inherit; font-size: 12.8px;">
                    <div class="feature_box">
                    
                    							<?php
							

 /**   $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
$conn->query( "SET CHARSET utf8" );
$result = $conn->prepare("SELECT `id`, `text_new` FROM update_text order BY id DESC limit 3");
$result->execute();
while ($res = $result->fetch(PDO::FETCH_BOTH))
							
	**/						
//Вывод последней новости 
 $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
$conn->query( "SET CHARSET utf8" );
$result = $conn->prepare("SELECT `id`, `text_new` FROM update_text order BY id DESC limit 1");
$result->execute();

while ($res = $result->fetch(PDO::FETCH_ASSOC))


echo $res['text_new'];



?>

</br>
</br>
 <span style= "color: #9c9c9c;"> Пришел <?php  
                          
                           $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
                             $conn->query( "SET CHARSET utf8" );
                             $result = $conn->prepare("SELECT `id`, `text_new`, `public` FROM update_text order BY id DESC limit 1");
                             $result->execute();

                             while ($res = $result->fetch(PDO::FETCH_ASSOC))
                             
                             echo $res['public'];
                          
                          ?> </span>
                          
                          </br>
</br>
                           <span style= "color: #9c9c9c;"> Ушел <?php  
                          
                           $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
                             $conn->query( "SET CHARSET utf8" );
                             $result = $conn->prepare("SELECT `id`, `text_new`, `public`, `went_work` FROM update_text order BY id DESC limit 1");
                             $result->execute();

                             while ($res = $result->fetch(PDO::FETCH_ASSOC))
                             
                             echo $res['went_work'];
                          
                          ?> </span>
                          
                          
                          </br>
                          </br>
                          
                            <span style= "color: #9c9c9c;"> Дата <?php  
                          
                           $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
                             $conn->query( "SET CHARSET utf8" );
                             $result = $conn->prepare("SELECT `id`, `text_new`, `public`, `went_work`, `data_today` FROM update_text order BY id DESC limit 1");
                             $result->execute();

                             while ($res = $result->fetch(PDO::FETCH_ASSOC))
                             
                             echo $res['went_work'];
                          
                          ?> </span>

                          
                          

                    </div>
                </div>
                

                   
                
                

                <div class="col-md-4 col-sm-4 col-xs-12 text-center" style = " padding-left: 5px; text-align: inherit; font-size: 12.8px; " >
                    <div class="feature_box">
                      
                    				<?php
							 //Вывод предпоследней новости 
							 $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
                             $conn->query( "SET CHARSET utf8" );
                             $result = $conn->prepare("SELECT `id`, `text_new` FROM update_text order BY id DESC limit 1 , 1");
                             $result->execute();

                             while ($res = $result->fetch(PDO::FETCH_ASSOC))

                             echo $res['text_new'];
							?>
							
							</br>
                             </br>
                           <span style= "color: #9c9c9c;"> Пришел <?php  
                          
                           $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
                             $conn->query( "SET CHARSET utf8" );
                             $result = $conn->prepare("SELECT `id`, `text_new`, `public` FROM update_text order BY id DESC limit 1 , 1");
                             $result->execute();

                             while ($res = $result->fetch(PDO::FETCH_ASSOC))
                             
                             echo $res['public'];
                             
                
                          ?> </span>
                          
                                                   </br>
</br>
                           <span style= "color: #9c9c9c;"> Ушел <?php  
                          
                           $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
                             $conn->query( "SET CHARSET utf8" );
                             $result = $conn->prepare("SELECT `id`, `text_new`, `public`, `went_work` FROM update_text order BY id DESC limit 1");
                             $result->execute();

                             while ($res = $result->fetch(PDO::FETCH_ASSOC))
                             
                             echo $res['went_work'];
                          
                          ?> </span>
                          
                          
                                  </br>
                          </br>
                          
                            <span style= "color: #9c9c9c;"> Дата <?php  
                          
                           $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
                             $conn->query( "SET CHARSET utf8" );
                             $result = $conn->prepare("SELECT `id`, `text_new`, `public`, `went_work`, `data_today` FROM update_text order BY id DESC limit 1");
                             $result->execute();

                             while ($res = $result->fetch(PDO::FETCH_ASSOC))
                             
                             echo $res['went_work'];
                          
                          ?> </span>

							
                    </div>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-12 text-center" style = " padding-left: 5px; text-align: inherit; font-size: 12.8px;" >
                    <div class="feature_box">
                   			<?php
							//Вывод 3 предпоследней новости 
							 $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
                             $conn->query( "SET CHARSET utf8" );
                             $result = $conn->prepare("SELECT `id`, `text_new`, `public` FROM update_text order BY id DESC limit 2 , 1");
                             $result->execute();

                             while ($res = $result->fetch(PDO::FETCH_ASSOC))
                             
                             echo $res['text_new'];
                             
							?>
							</br>
                            </br>
                          <span style= "color: #9c9c9c;"> Пришел <?php  
                          
                           $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
                             $conn->query( "SET CHARSET utf8" );
                             $result = $conn->prepare("SELECT `id`, `text_new`, `public` FROM update_text order BY id DESC limit 2 , 1");
                             $result->execute();

                             while ($res = $result->fetch(PDO::FETCH_ASSOC))
                             
                             echo $res['public'];
                          
                          ?> </span>
                          
                                                   </br>
</br>
                           <span style= "color: #9c9c9c;"> Ушел <?php  
                          
                           $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
                             $conn->query( "SET CHARSET utf8" );
                             $result = $conn->prepare("SELECT `id`, `text_new`, `public`, `went_work` FROM update_text order BY id DESC limit 1");
                             $result->execute();

                             while ($res = $result->fetch(PDO::FETCH_ASSOC))
                             
                             echo $res['went_work'];
                          
                          ?> </span>
                          
                          
                                  </br>
                          </br>
                          
                            <span style= "color: #9c9c9c;"> Дата <?php  
                          
                           $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
                             $conn->query( "SET CHARSET utf8" );
                             $result = $conn->prepare("SELECT `id`, `text_new`, `public`, `went_work`, `data_today` FROM update_text order BY id DESC limit 1");
                             $result->execute();

                             while ($res = $result->fetch(PDO::FETCH_ASSOC))
                             
                             echo $res['went_work'];
                          
                          ?> </span>

                          
                          
                          
                          </br>
                          </br>
                        
                    </div>
                     <a href="/feed/" style = ""  class="btn-light button-black">Открыть лог событий&hellip;</a> 
                </div>
    
            </div>

        </div>

    </section>