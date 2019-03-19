<?php

class News
{
  // Свойства

  /**
  * @var int ID статей из базы данных
  */
  public $id = null;


  /**
  * @var int Дата первой публикации статьи
  */
  public $publicationDate1 = null;

  /**
  * @var string Полное название статьи
  */
  public $text = null;

  /**
  * @var string Краткое описание статьи
  */
  public $text_t = null;

  /**
  * @var string HTML содержание статьи
  */
  public $text_p = null;


  /**
  * Устанавливаем свойства с помощью значений в заданном массиве
  *
  * @param assoc Значения свойств
  */

  public function __construct( $data=array() ) {
    if ( isset( $data['id'] ) ) $this->id = (int) $data['id'];
    if ( isset( $data['publicationDate'] ) ) $this->publicationDate1 = (int) $data['publicationDate'];
    if ( isset( $data['text'] ) ) $this->text = $data['text'];
    if ( isset( $data['text_t'] ) ) $this->text_t =  $data['text_t'];
    if ( isset( $data['text_p'] ) ) $this->text_p = $data['text_p'];
  }
  
  
    public function storeFormValues ( $params ) {

    // Сохраняем все параметры
    $this->__construct( $params );

    // Разбираем и сохраняем дату публикации
    if ( isset($params['publicationDate']) ) {
      $publicationDate = explode ( '-', $params['publicationDate'] );

      if ( count($publicationDate) == 3 ) {
        list ( $y, $m, $d ) = $publicationDate;
        $this->publicationDate1 = mktime ( 0, 0, 0, $m, $d, $y );
      }
    }
  }

  
  
  
  public static function getById1( $id ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $conn->query( "SET CHARSET utf8" );
    $sql = "SELECT *, UNIX_TIMESTAMP(publicationDate) AS publicationDate FROM articles WHERE id = :id";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->execute();
    $row = $st->fetch();
    $conn = null;
    if ( $row ) return new News( $row );
  }

  
  
  
  
//  Возвращает все (или диапазон) объектов новостей в базе данных 


  public static function getList_news( $numRows=1000000, $order="publicationDate DESC" ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $conn->query( "SET CHARSET utf8" );
    $sql = "SELECT SQL_CALC_FOUND_ROWS *, UNIX_TIMESTAMP(publicationDate) AS publicationDate FROM articles
            ORDER BY " . mysqli_real_escape_string($order) . " LIMIT :numRows";


    $st = $conn->prepare( $sql );
    $st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
    $st->execute();
    $list = array();

    while ( $row = $st->fetch() ) {
      $article_news = new News( $row );
      $list[] = $article_news;
    }

    // Получаем общее количество статей, которые соответствуют критерию
   $sql = "SELECT FOUND_ROWS() AS totalRows";
    $totalRows = $conn->query( $sql )->fetch();
    $conn = null;
    return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
  }
  
  
  
}
  
  ?>
