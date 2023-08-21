<?php

namespace App\Model\Home;
require_once "../../../vendor/autoload.php";
use App\Model\Connection;

class HomeModel
{
    use Connection;
    private \PDO $conn;

    private string $bookTitle;
    private string $bookCategory;
    private string  $booksubcategory;
    private int $bookPrice;
    private string $bookDescription;
    private string $authorName;
    private int $bookId;
    private string  $coverPage;

    /**
     * Constructor will establish connection.
     */

    public function __construct()
    {
        $this->conn=$this->getConnection();
    }

    /**
     * Get the value of bookTitle
     * 
     * @return string
     */ 
    public function getBookTitle():string
    {
        return $this->bookTitle;
    }

    /**
     * Set the value of bookTitle
     *
     * @return  self
     */ 
    public function setBookTitle($bookTitle):self
    {
        $this->bookTitle = $bookTitle;

        return $this;
    }

    /**
     * Get the value of bookCategory
     * 
     * @return string 
     */ 
    public function getBookCategory():string 
    {
        return $this->bookCategory;
    }

    /**
     * Set the value of bookCategory
     *
     * @return  self
     */ 
    public function setBookCategory($bookCategory):self
    {
        $this->bookCategory = $bookCategory;

        return $this;
    }

    /**
     * Get the value of booksubcategory
     * 
     * @return string
     */ 
    public function getBooksubcategory():string
    {
        return $this->booksubcategory;
    }

    /**
     * Set the value of booksubcategory
     *
     * @return  self
     */ 
    public function setBooksubcategory($booksubcategory):self
    {
        $this->booksubcategory = $booksubcategory;

        return $this;
    }

    /**
     * Get the value of bookPrice
     * 
     * @return int
     */ 
    public function getBookPrice():int
    {
        return $this->bookPrice;
    }

    /**
     * Set the value of bookPrice
     *
     * @return  self
     */ 
    public function setBookPrice($bookPrice):self
    {
        $this->bookPrice = $bookPrice;

        return $this;
    }

    /**
     * Get the value of bookDescription
     * 
     * @return self
     */ 
    public function getBookDescription():string
    {
        return $this->bookDescription;
    }

    /**
     * Set the value of bookDescription
     *
     * @return  self
     */ 
    public function setBookDescription($bookDescription):self
    {
        $this->bookDescription = $bookDescription;

        return $this;
    }

    /**
     * Get the value of authorName
     * 
     * @return string 
     */ 
    public function getAuthorName():string
    {
        return $this->authorName;
    }

    /**
     * Set the value of authorName
     *
     * @return  self
     */ 
    public function setAuthorName($authorName):self
    {
        $this->authorName = $authorName;

        return $this;
    }

    /**
     * Get the value of bookId
     * 
     * @return int
     */ 
    public function getBookId():int
    {
        return $this->bookId;
    }

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
    public function getBookData():bool
    {
        $sql ="SELECT * FROM book where bookid='$this->bookId';";
        $book=$this->conn->prepare($sql);
        $book->execute();
        if($book->rowCount()>0)
        {
        $books=$book->fetchAll(\PDO::FETCH_ASSOC);
        $this->setBookTitle($books[0]["title"]);
        $this->setAuthorName($books[0]["authorname"]);
        $this->setBookCategory($books[0]["category"]);
        $this->setBooksubcategory($books[0]["sub_category"]);
        $this->setBookPrice($books[0]["price"]);
        $this->setBookDescription($books[0]["description"]);
        $this->setCoverPage($books[0]["coverpage"]);
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Get the value of coverPage
     * 
     * @return string
     */ 
    public function getCoverPage():string
    {
        return $this->coverPage;
    }

    /**
     * Set the value of coverPage
     *
     * @return  self
     */ 
    public function setCoverPage($coverPage):self
    {
        $this->coverPage = $coverPage;

        return $this;
    }
}