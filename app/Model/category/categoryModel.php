<?php
namespace App\Model\category;
use App\Model\Connection;

class CategoryModel
{
    use Connection;
    private \PDO $conn;
    private string $category;
    private array $books;
    public function __construct()
    {
        $this->conn=$this->getConnection();
    }
    public function fetchBookByCategory()
    {
        $sql="SELECT * FROM book where category='$this->category';";
        $result=$this->conn->query($sql);
        if($result->rowCount()>0)
        {
          $booksarray=$result->fetchAll(\PDO::FETCH_ASSOC);
          $this->setBooks($booksarray);
          return true;
        }
        else 
        {
           return false; 
        }
    }
    /**
     * Set the value of category
     *
     * @return  self
     */ 
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get the value of books
     */ 
    public function getBooks()
    {
        return $this->books;
    }

    /**
     * Set the value of books
     *
     * @return  self
     */ 
    public function setBooks($books)
    {
        $this->books = $books;

        return $this;
    }
}
 