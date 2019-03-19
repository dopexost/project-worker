<?php

/**
 * Класс для обработки статей
 */

class Article
{
  // Свойства

  /**
  * @var int ID статей из базы данных
  */
  public $id = null;

  /**
  * @var int Дата друдоустройства. 
  */
  public $publicationDate = null;

  /**
  * @var string ФИО сотрудника
  */
  public $title = null;

  /**
  * @var string должность сотрудника
  */
  public $summary = null;

  /**
  * @var string HTML пометки сотрудников 
  */
  public $content = null;
  
  
  /**
  * @var string HTML email сотрудника
  */
  
  public $mails = null;
  
  
  /**
  * @var string HTML начало рабочего дня
  */
  
  public $start_work = null;
    
    
    
  /**
  * @var string HTML конец рабочего дня
  */
  
   public $end_work = null;


  /**
  * Устанавливаем свойства с помощью значений в заданном массиве
  *
  * @param assoc Значения свойств
  */

  public function __construct( $data=array() ) {
    if ( isset( $data['id'] ) ) $this->id = (int) $data['id'];
    if ( isset( $data['publicationDate'] ) ) $this->publicationDate = (int) $data['publicationDate'];
    if ( isset( $data['title'] ) ) $this->title = $data['title'];
    if ( isset( $data['summary'] ) ) $this->summary =  $data['summary'];
    if ( isset( $data['content'] ) ) $this->content = $data['content'];
    if ( isset( $data['mails'] ) ) $this->mails = $data['mails'];
    if ( isset( $data['start_work'] ) ) $this->start_work = $data['start_work'];
    if ( isset( $data['end_work'] ) ) $this->end_work = $data['end_work'];
  }


  /**
  * Устанавливаем свойств с помощью значений формы редактирования записи в заданном массиве
  *
  * @param assoc Значения записи формы
  */

  public function storeFormValues ( $params ) {

    // Сохраняем все параметры
    $this->__construct( $params );

    // Разбираем и сохраняем дату публикации
    if ( isset($params['publicationDate']) ) {
      $publicationDate = explode ( '-', $params['publicationDate'] );

      if ( count($publicationDate) == 3 ) {
        list ( $y, $m, $d ) = $publicationDate;
        $this->publicationDate = mktime ( 0, 0, 0, $m, $d, $y );
      }
    }
  }


  /**
  * Возвращаем объект статьи соответствующий заданному ID статьи
  *
  * @param int ID статьи
  * @return Article|false Объект статьи или false, если запись не найдена или возникли проблемы
  */

  public static function getById( $id ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $conn->query( "SET CHARSET utf8" );
    $sql = "SELECT *, UNIX_TIMESTAMP(publicationDate) AS publicationDate FROM articles WHERE id = :id";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->execute();
    $row = $st->fetch();
    $conn = null;
    if ( $row ) return new Article( $row );
  }


  /**
  * Возвращает все (или диапазон) объектов статей в базе данных
  *
  * @param int Optional Количество строк (по умолчанию все)
  * @param string Optional Столбец по которому производится сортировка  статей (по умолчанию "publicationDate DESC")
  * @return Array|false Двух элементный массив: results => массив, список объектов статей; totalRows => общее количество статей
  */

  public static function getList( $numRows=1000000, $order="publicationDate DESC" ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $conn->query( "SET CHARSET utf8" );
    $sql = "SELECT SQL_CALC_FOUND_ROWS *, UNIX_TIMESTAMP(publicationDate) AS publicationDate FROM articles
            ORDER BY " . $conn->quote($order) . " LIMIT :numRows";

    $st = $conn->prepare( $sql );
    $st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
    $st->execute();
    $list = array();

    while ( $row = $st->fetch() ) {
      $article = new Article( $row );
      $list[] = $article;
    }

    // Получаем общее количество статей, которые соответствуют критерию
    $sql = "SELECT FOUND_ROWS() AS totalRows";
    $totalRows = $conn->query( $sql )->fetch();
    $conn = null;
    return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
  }


  /**
  * Вставляем текущий объект статьи в базу данных, устанавливаем его свойства.
  */

  public function insert() {

    // Есть у объекта статьи ID?
    if ( !is_null( $this->id ) ) trigger_error ( "Article::insert(): Attempt to insert an Article object that already has its ID property set (to $this->id).", E_USER_ERROR );

    // Вставляем статью
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $conn->query( "SET CHARSET utf8" );
    $sql = "INSERT INTO articles (publicationDate, title, summary, content ,mails, start_work, end_work) VALUES ( FROM_UNIXTIME(:publicationDate), :title, :summary, :content, :mails, :start_work, :end_work)";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":publicationDate", $this->publicationDate, PDO::PARAM_INT );
    $st->bindValue( ":title", $this->title, PDO::PARAM_STR );
    $st->bindValue( ":summary", $this->summary, PDO::PARAM_STR );
    $st->bindValue( ":content", $this->content, PDO::PARAM_STR );
    $st->bindValue( ":mails", $this->mails, PDO::PARAM_STR );
    $st->bindValue( ":start_work", $this->start_work, PDO::PARAM_STR );
    $st->bindValue( ":end_work", $this->end_work, PDO::PARAM_STR );
    $st->execute();
    $this->id = $conn->lastInsertId();
    $conn = null;
  }


  /**
  * Обновляем текущий объект статьи в базе данных
  */

  public function update() {

    // Есть ли у объекта статьи ID?
    if ( is_null( $this->id ) ) trigger_error ( "Article::update(): Attempt to update an Article object that does not have its ID property set.", E_USER_ERROR );
   
    // Обновляем статью
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $conn->query( "SET CHARSET utf8" );
    $sql = "UPDATE articles SET publicationDate=FROM_UNIXTIME(:publicationDate), title=:title, summary=:summary, content=:content, mails=:mails, start_work=:start_work, end_work=:end_work WHERE id = :id";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":publicationDate", $this->publicationDate, PDO::PARAM_INT );
    $st->bindValue( ":title", $this->title, PDO::PARAM_STR );
    $st->bindValue( ":summary", $this->summary, PDO::PARAM_STR );
    $st->bindValue( ":content", $this->content, PDO::PARAM_STR );
    $st->bindValue( ":mails", $this->mails, PDO::PARAM_STR );
    $st->bindValue( ":start_work", $this->start_work, PDO::PARAM_STR );
    $st->bindValue( ":end_work", $this->end_work, PDO::PARAM_STR );
    $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
  }


  /**
  * Удаляем текущий объект статьи из базы данных
  */

  public function delete() {

    // Есть ли у объекта статьи ID?
    if ( is_null( $this->id ) ) trigger_error ( "Article::delete(): Attempt to delete an Article object that does not have its ID property set.", E_USER_ERROR );

    // Удаляем статью
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $conn->query( "SET CHARSET utf8" );
    $st = $conn->prepare ( "DELETE FROM articles WHERE id = :id LIMIT 1" );
    $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
  }

}

?>
