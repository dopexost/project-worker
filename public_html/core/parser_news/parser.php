<?php
require "/home/d/davypou/snake/public_html/config.php";
//include dirname(__FILE__).'/public_html/config.php'; // во всех версиях PHP   

?>




<?php

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

include('class/simple_html_dom.php');


$ch = curl_init('https://www.us-cert.gov/ncas/current-activity');
// Задаем параметры для курла
$headers = array('Content-type: text/html; charset=utf-8');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
// Получаем html
$result = curl_exec($ch);
// закрываем курл
curl_close($ch);

$html = str_get_html($result);// где результат - это полученный с помощью курла контент

// $data = $html->find('.entry-date', 0);
$stat = $html->find('.entry-description', 0);
$title = $html->find('.entry-title', 0);

// $data1 = $html->find('.entry-date', 1);
$stat1 = $html->find('.entry-description', 1);

// $data2 = $html->find('.entry-date', 2);
$stat2 = $html->find('.entry-description', 2);

// $data3 = $html->find('.entry-date', 3);
$stat3 = $html->find('.entry-description', 3);

// $data4 = $html->find('.entry-date', 4);
$stat4 = $html->find('.entry-description', 4);

// $data5 = $html->find('.entry-date', 5);
$stat5 = $html->find('.entry-description', 5);

//up_1
$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
$conn->query( "SET CHARSET utf8" );
 $sql1 = 'SELECT text FROM parser WHERE id = "1"';
   $st = $conn->prepare( $sql1 );
 //  $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->execute();
    $row1 = $st->fetch();
    $conn = null;
   
 echo ($row1[0]);
 echo $stat;
 
//print_r($row1[0]);

//echo $stat ;
//echo $stat1 ;
//echo $stat2 ;
//echo $stat3 ;
//echo $stat4 ;
//echo $stat5 ;



/**Перевод строки в дату 

$format_date = strip_tags($data);
$format_date_p = str_replace('Published','', $format_date);
$format_date_d = date("Y-m-d", strtotime($format_date_p));

$format_date1 = strip_tags($data1);
$format_date_p1 = str_replace('Published','', $format_date1);
$format_date_d1 = date("Y-m-d", strtotime($format_date_p1));

$format_date2 = strip_tags($data2);
$format_date_p2 = str_replace('Published','', $format_date2);
$format_date_d2 = date("Y-m-d", strtotime($format_date_p2));

$format_date3 = strip_tags($data3);
$format_date_p3 = str_replace('Published','', $format_date3);
$format_date_p3_1 = stristr($format_date_p3,'|',true);
$format_date_d3 = date("Y-m-d", strtotime($format_date_p3_1 ));

$format_date4 = strip_tags($data4);
$format_date_p4 = str_replace('Published','', $format_date4);
$format_date_d4 = date("Y-m-d", strtotime($format_date_p4));

$format_date5 = strip_tags($data5);
$format_date_p5 = str_replace('Published','', $format_date5);
$format_date_d5 = date("Y-m-d", strtotime($format_date_p5));

**/


if ($stat == $row1[0]) 

{
    
echo error;

}



else
  {
//Перевод  
$format_text = strip_tags($stat);

$params = array( 'key' => 'trnsl.1.1.20171004T063152Z.4351fcfbfbc47da6.e9776762a1d269f9cf3fb24760b62db10d2f45a0', 'text' => $format_text, 'lang' => 'en-ru',); 
$query = http_build_query($params); 
$response = file_get_contents('https://translate.yandex.net/api/v1.5/tr.json/translate?'.$query); 

//echo $query;
$data = json_decode($response, true); 
$text = $data['text'][0];
//echo $text;

//Отправка 
$to  = "<bigcaches@ya.ru> " ;

$subject = "Пора обновить статью";
$link = " </br> https://аспид.рус/admin.php";

$message = "$title $stat $text $link";
$message1 = $text;


$headers  = "Content-type: text/html; charset=windows-utf8 \r\n";
$headers .= "From: Увидомитель обновления <update@newstat.ru>\r\n";
$headers .= "update@newstat.ru\r\n";

mail($to, $subject, $message, $headers); 

   
   $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
$conn->query( "SET CHARSET utf8" );
$set = $conn->quote($stat);
 $sql = "UPDATE parser SET text = $set  WHERE id = '1'";
  $st = $conn->prepare( $sql );
 //  $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->execute();
    $row = $st->fetch();
    $conn = null;
    

    
}

//up_2
$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
$conn->query( "SET CHARSET utf8" );
 $sql2 = 'SELECT text FROM parser WHERE id = "2"';
   $st = $conn->prepare( $sql2 );
 //  $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->execute();
    $row2 = $st->fetch();
    $conn = null;
   
 echo ($row2[0]);

if ($stat1 == $row2[0]) 

{
    echo "error";
}
 else {

$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
$conn->query( "SET CHARSET utf8" );
$set1 = $conn->quote($stat1);
 $sql = "UPDATE parser SET text = $set1 WHERE id = '2'";
    $st = $conn->prepare( $sql );
//    $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->execute();
    $row = $st->fetch();
    $conn = null;
    
 }    
 
 //up_3
 $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
$conn->query( "SET CHARSET utf8" );
 $sql3 = 'SELECT text FROM parser WHERE id = "3"';
   $st = $conn->prepare( $sql3 );
 //  $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->execute();
    $row3 = $st->fetch();
    $conn = null;
    
 echo ($row3[0]);

if ($stat2 == $row3[0])   

{
   echo "error";    
}
    else {
    
    
$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
$conn->query( "SET CHARSET utf8" );
$set2 = $conn->quote($stat2);
 $sql = "UPDATE parser SET text = $set2 WHERE id = '3'";
    $st = $conn->prepare( $sql );
   // $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->execute();
    $row = $st->fetch();
    $conn = null;    
    
    }


 //up_4
$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
$conn->query( "SET CHARSET utf8" );
 $sql4 = 'SELECT text FROM parser WHERE id = "4"';
   $st = $conn->prepare( $sql4 );
 //  $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->execute();
    $row4 = $st->fetch();
    $conn = null;
    
 echo ($row4[0]);
 
if ($stat3 == $row4[0])   

{
   echo "error";    
}
    else {

$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
$conn->query("SET CHARSET utf8");
$set3 = $conn->quote($stat3);
 $sql = "UPDATE parser SET text = $set3 WHERE `id` = '4'";
    $st = $conn->prepare( $sql );
  //  $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->execute();
    $row = $st->fetch();
    $conn = null;
    

    
      }    


//up_5
$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
$conn->query( "SET CHARSET utf8" );
 $sql5 = 'SELECT text FROM parser WHERE id = "5"';
   $st = $conn->prepare( $sql5 );
 //  $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->execute();
    $row5 = $st->fetch();
    $conn = null;
   
 echo ($row5[0]);
 

if ($stat4 == $row5[0])   

{
   echo "error";    
}
    else {

$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
$conn->query( "SET CHARSET utf8" );
$set4 = $conn->quote($stat4);
 $sql = "UPDATE parser SET text = $set4 WHERE id = '5'";
    $st = $conn->prepare( $sql );
  //  $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->execute();
    $row = $st->fetch();
    $conn = null;
    }
    
    
//up_6
$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
$conn->query( "SET CHARSET utf8" );
 $sql6 = 'SELECT text FROM parser WHERE id = "6"';
   $st = $conn->prepare( $sql6 );
 //  $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->execute();
    $row6 = $st->fetch();
    $conn = null;
   
 echo ($row6[0]);
 

if ($stat5 == $row6[0])   

{
   echo "error";    
}
    else {
    
    
    
$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
$conn->query( "SET CHARSET utf8" );
$set5 = $conn->quote($stat5);
 $sql = "UPDATE parser SET text = $set5 WHERE id = '6'";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->execute();
    $row = $st->fetch();
    $conn = null;    
}

//foreach($html->find('a') as $element)
  //     echo $element->href . '<br>'; 

?>

