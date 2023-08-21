<?php
namespace App\Model\authordash;
require "../../../vendor/autoload.php";
use App\Model\Connection;

class DeleteSelectedBookModel
{
    use Connection;
    private \PDO $conn;
    private int $bookid;

    private string $coverPage;
    public function __construct()
    {
      $this->conn=$this->getConnection();
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
    public function deleteBookCoverPage()
    {
        $sql="SELECT coverpage FROM book WHERE bookid=:bookid;";
        $result=$this->conn->prepare($sql);
        $result->bindParam("bookid",$this->bookid);
        $result->execute();
        if($result->rowCount()>0)
        {
            $coverpage=$result->fetch(\PDO::FETCH_COLUMN);
            $this->setCoverPage($coverpage);
            return true;
        }
        else
        {
            return false;
        }
        
    }
    public function deleteBook()
    {
        $sql="DELETE FROM book where bookid=:bookid;";
        $result=$this->conn->prepare($sql);
        $result->bindParam("bookid",$this->bookid);
        $result->execute();
        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Get the value of coverPage
     */ 
    public function getCoverPage()
    {
        return $this->coverPage;
    }

    /**
     * Set the value of coverPage
     *
     * @return  self
     */ 
    public function setCoverPage($coverPage)
    {
        $this->coverPage = $coverPage;

        return $this;
    }
}