<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<?php header("Content-Type: text/html; charset=UTF-8"); ?>
    
<?php include $_SERVER['DOCUMENT_ROOT']. "/templates/include/header.php" ?>

  
     <div class="container">  <?php echo $results['article']->content?> </div>
     

<?php include $_SERVER['DOCUMENT_ROOT']. "/templates/include/footer.php" ?>
