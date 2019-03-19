<?php include $_SERVER['DOCUMENT_ROOT']. "/templates/include/header.php"?>
<title>Сотрудники</title>
<div class = "container">
     <h2>Информация по сотрудникам</span></h2>
<?php foreach ( $results['articles'] as $article ) { ?>
      
          <div class="stat-links">
           <a class="class2" href="statya<?php echo $article->id?>"><?php echo htmlspecialchars( $article->title )?></a>
          </div> 
          
           <div class="stat"><?php echo htmlspecialchars( $article->summary )?></div>
       
<?php } ?>
</div> 
<?php include $_SERVER['DOCUMENT_ROOT']. "/templates/include/footer.php"?>