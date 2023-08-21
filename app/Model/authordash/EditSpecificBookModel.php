<?php
namespace App\Model\authordash;
require "../../../vendor/autoload.php";
use App\Model\Connection;

class EditSpecificBookModel
{
    use Connection;
    private \PDO $conn;
    private array $fetchBook;
    private int $bookid;
    public function __construct()
    {
        $this->conn=$this->getConnection();
    }
    /**
     * fetchBookByBookId will fetch specific Book Data
     * 
     * Based on the Book Id
     * 
     * if Book is available Return True
     *
     * else Book is Not Found Return False
     * @return boolean
     */
    public function fetchBookByBookId():bool
    {
       $sql="SELECT * FROM BOOK where bookid=:bookID;";
       $result=$this->conn->prepare($sql);
       $result->bindParam("bookID",$this->bookid);
       $result->execute();
       if($result)
       {
         $book=$result->fetchAll(\PDO::FETCH_ASSOC);
         $this->setFetchBook($book);
         return true;
       }
       else
       {
         return false;
       }
    }
    
    
    /**
     * Set the value of bookid
     *
     * @return  self
     */ 
    public function setBookid($bookid)
    {
        $this->bookid = $bookid;

        return $this;
    }

    /**
     * Get the value of fetchBook
     */ 
    public function getFetchBook()
    {
        return $this->fetchBook;
    }

    /**
     * Set the value of fetchBook
     *
     * @return  self
     */ 
    public function setFetchBook($fetchBook)
    {
        $this->fetchBook = $fetchBook;

        return $this;
    }
}