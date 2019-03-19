  
  <div class="box-reason" id="about">
			<div class="box-title">
			<!--	<h1>Чем мы можем Вам помочь</h1> -->
			</div>
			<div class="box-list-products" id="capabilities">
				<div class="list-product">
					<ul>
						<li class="list-product-item list-product-item_color">
							<div class="list-product-icon"><i class="fa fa-flask"></i></div>
							<h3>ПОДРОБНЫЙ АНАЛИЗ</h3>
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

							<div class="box-btn"><a href="/about/#advantages" class="btn btn-primary">подробнее</a></div>
						</li>
						<li class="list-product-item">
							<div class="list-product-icon"><i class="fa fa-tasks"></i></div>
							<h3>КОМПЛЕКСНЫЙ ПОДХОД</h3>
							
							<?php
							 //Вывод предпоследней новости 
							 $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
                             $conn->query( "SET CHARSET utf8" );
                             $result = $conn->prepare("SELECT `id`, `text_new` FROM update_text order BY id DESC limit 1 , 1");
                             $result->execute();

                             while ($res = $result->fetch(PDO::FETCH_ASSOC))

                             echo $res['text_new'];
							?>
							
	
							<div class="box-btn"><a href="/about/#advantages" class="btn btn-primary">подробнее</a></div>
						</li>
						<li class="list-product-item list-product-item_color">
							<div class="list-product-icon"><i class="fa fa-thumbs-o-up"></i></div>
							<h3>ВЫСОКОЕ КАЧЕСТВО</h3>
							<?php
							//Вывод 3 предпоследней новости 
							 $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
                             $conn->query( "SET CHARSET utf8" );
                             $result = $conn->prepare("SELECT `id`, `text_new` FROM update_text order BY id DESC limit 2 , 1");
                             $result->execute();

                             while ($res = $result->fetch(PDO::FETCH_ASSOC))

                             echo $res['text_new'];
							?>
							
						</li>
					</ul>
				</div>
			</div>
		</div>
    