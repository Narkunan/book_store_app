<?php
namespace App\Model\ajax;
require_once "../../../vendor/autoload.php";
use App\Model\Connection;

/**
 * ajaxModel will fetchBook title Based 
 * 
 * on title Provided by user
 * 
 */
class ajaxModel
{
  use Connection;

  private array $book;
  
  /**
   * fetchBook will retrieve Book
   * 
   * title from Book table.
   *
   * @return void
   */
  public function fetchBook():void
  {
     $conn=$this->getConnection();
     $result=$conn->query("SELECT title FROM book");
     $book=$result->fetchAll(\PDO::FETCH_ASSOC);
     $this->setBook($book);
     
  }

  /**
   * Set the value of book
   *
   * @return  self
   */ 
  public function setBook($book)
  {
    $this->book = $book;

    return $this;
  }

  /**
   * Set the value of book
   *
   * @return  array
   */ 
  public function getBook():array
  {
    return $this->book;

  }
}