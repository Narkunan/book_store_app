<?php
namespace App\Model\ajax;
require_once "../../../vendor/autoload.php";
use App\Model\Connection;
class ajaxModel
{
  use Connection;

  private array $book;
  
  public function fetchBook()
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