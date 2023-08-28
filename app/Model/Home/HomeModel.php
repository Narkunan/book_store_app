<?php
namespace App\Model\Home;
require_once "../../../vendor/autoload.php";
use App\Model\Home\HomeAbstractModel;
class HomeModel extends HomeAbstractModel 
{
  
    private int $bookId;
    
    /**
     * Set the value of bookId
     *
     * @return  self
     */ 
    public function setBookId($bookId):self
    {
        $this->bookId = $bookId;

        return $this;
    }

    /**
     * setting value for the book
     *
     * @return void
     */
    public function fetchBook():bool
    {
        $sql ="SELECT * FROM book where bookid='$this->bookId';";
        $book=$this->conn->prepare($sql);
        $book->execute();
        if($book->rowCount()>0)
        {
           $books=$book->fetchAll(\PDO::FETCH_ASSOC);
            $this->setFetchBook($books);
            return true;
        }
        else
        {
            return false;
        }
    }

}