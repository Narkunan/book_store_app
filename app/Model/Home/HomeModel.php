<?php
namespace App\Model\Home;
use App\Model\Home\HomeAbstractModel;
/**
 * HomeModel will fetchBooks
 * 
 * by bookid
 */
class HomeModel extends HomeAbstractModel 
{
  
    private int $bookId;
    
    /**
     * Set the value of bookId
     *
     * @param int $bookId
     * 
     * @return  self
     */ 
    public function setBookId(int $bookId):self
    {
        $this->bookId = $bookId;

        return $this;
    }

    /**
     * fetchBook will fetchbook by bookid.
     *
     * @access public
     * 
     * @return bool
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