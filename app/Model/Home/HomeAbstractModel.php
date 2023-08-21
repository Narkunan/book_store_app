<?php
namespace App\Model\Home;
use App\Model\Connection;

class HomeAbstractModel
{
    public \PDO $conn;
    public array $FetchBook;
    use Connection;

    /**
     * Constructor will establish connection
     */
    public function __construct()
    {
        $this->conn=$this->getConnection();
    }
    /**
     * Get the value of ProductData
     * 
     * @return array
     */ 
    public function getFetchBook():array
    {
        return $this->FetchBook;
    }

    /**
     * Set the value of ProductData
     *
     * @return  self
     */ 
    public function setFetchBook($ProductData):self
    {
        $this->FetchBook = $ProductData;

        return $this;
    }
}