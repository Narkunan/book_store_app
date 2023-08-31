<?php
namespace App\Model\authordash;
use App\Model\Connection;

/**
 * authordashModel will provide common variables and 
 * 
 * function to all the classes. 
 * 
 */
abstract class authordashAbstract
{
    use Connection;
    public \PDO $connection;
    protected String $authorname;
    protected int $authorid;
    protected array $book;

    public function __construct()
    {
        $this->connection=$this->getConnection();
    }



    /**
     * Get the value of authorname
     */ 
    public function getAuthorname():string
    {
        return $this->authorname;
    }

    /**
     * Set the value of authorname
     *
     * @param string  $name
     * 
     * @return  self
     */ 
    public function setAuthorname(string $authorname):self
    {
        $this->authorname = $authorname;

        return $this;
    }

    /**
     * Get the value of authorid
     */ 
    public function getAuthorid():int
    {
        return $this->authorid;
    }

    /**
     * Set the value of authorid
     *
     * @param int $authorid
     * 
     * @return  self
     */ 
    public function setAuthorid(int $authorid):self
    {
        $this->authorid = $authorid;

        return $this;
    }

    /**
     * Get the value of book
     */ 
    public function getBook():array
    {
        return $this->book;
    }

    /**
     * Set the value of book
     *
     * @param array $name
     * @return  self
     */ 
    public function setBook(array $book):self
    {
        $this->book = $book;

        return $this;
    }
}