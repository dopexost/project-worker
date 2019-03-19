<?php include $_SERVER['DOCUMENT_ROOT']. "/config.php" ?>

<?php
 
    session_start();
    $FIO = $_POST['value'];
    
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $conn->query( "SET CHARSET utf8" );
    $result = $conn->prepare("SELECT `id`, `title`, `start_work`, `end_work` FROM articles WHERE `title` = '$FIO'");
    $result->execute();
    while ($res = $result->fetch(PDO::FETCH_BOTH)) {
    
    echo 'Утвержденное начало рабочего дня <input name="u_start" value ="'.$res['start_work'].'" disabled> </br>';
    echo 'Утвержденный конец рабочего дня <input name="u_end" value ="'.$res['end_work'].'" disabled>';
    
    }
   
?>


