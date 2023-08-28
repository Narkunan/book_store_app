<?php
namespace App\Model\authordash;
require "../../../vendor/autoload.php";
use App\Model\Connection;
class DeleteBookModel
{
    use Connection;
    private \PDO $conn;
    private int $authorid;
    private array $fetchBook;
    public function __construct()
    {
        $this->conn=$this->getConnection();
    }

    public function fetchBook():bool
    {
        $sql="SELECT * from book where authorid=:authorid";
        $result=$this->conn->prepare($sql);
        $result->bindParam("authorid",$this->authorid);
        $result->execute();
        if($result->rowCount()>0)
        {
            $books=$result->fetchAll(\PDO::FETCH_ASSOC);
            $this->setFetchBook($books);
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