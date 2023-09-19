<?php
namespace App\Model\Home;
use App\Model\Connection;

/**
 * HomeAbstractModel have common variables and function 
 * 
 * to be used across the classes.
 */
class HomeAbstractModel
{
    public \PDO $conn;
    protected array $FetchBook;
    
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
     * @param array $productdata
     *
     * @return  self
     */ 
    public function setFetchBook(array $ProductData):self
    {
        $this->FetchBook = $ProductData;

        return $this;
    }
}