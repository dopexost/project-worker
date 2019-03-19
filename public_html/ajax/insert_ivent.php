<?php include $_SERVER['DOCUMENT_ROOT']. "/config.php" ?>
<?php

session_start();
$statMass = $_POST['NewType'];
$date_today = date("d.m.Y");
$time_enter = $_POST['time_enter'];
$time_exit = $_POST['time_exit'];
$FIO = $_POST['Fio'];



  
$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
$conn->query( "SET CHARSET utf8" );
$set5 = $conn->quote($statMass);
 $sql = "INSERT INTO update_text (fio_work, text_new, data_today, public, went_work ) VALUES ('$FIO', '$statMass', '$date_today', '$time_enter', '$time_exit')";
    $st = $conn->prepare( $sql );
  //  $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->execute();
    $row = $st->fetch();
    $conn = null;
    echo 'Событие добавлено';
?>