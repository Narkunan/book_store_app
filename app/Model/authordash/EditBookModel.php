<?php
namespace App\Model\authordash;
require "../../../vendor/autoload.php";
use App\Model\Connection;

class EditBookModel
{
    private int $authorid;
    private array $fetchBook;
    use Connection;
    
    private \PDO $conn;
    public function __construct()
    {
        $this->conn=$this->getConnection();
    }
    /**
     * fetchBooksByAuthorId function will fetch Books
     * 
     * that are Published By author and return true if any book is available
     * 
     * else return false if no book is found
     *
     * @return boolean
     */
    public function fetchBooksByAuthorId():bool
    {
       $sql="SELECT * FROM BOOK WHERE authorid=:authorID;";
       $result=$this->conn->prepare($sql);
       $result->bindParam("authorID",$this->authorid);
       $result->execute();
       if($result->rowCount()>0)
       {
          $Book=$result->fetchAll(\PDO::FETCH_ASSOC);
          $this->setFetchBook($Book);
          return true;
       }
       else
       {
         return false;
       }
    }
    /**
     * Set the value of authorid
     *
     * @return  self
     */ 
    public function setAuthorid($authorid)
    {
        $this->authorid = $authorid;

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
