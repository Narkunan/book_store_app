<?php 
namespace App\Model\authordash;
class AuthordashDTO
{
    private String $authorname;

    private array $book;
    private int $authorid;

    private int $bookid;

    private string $coverpage;
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
    public function getBook()
    {
        return $this->book;
    }

    /**
     * Set the value of book
     *
     * @return  self
     */ 
    public function setBook($book)
    {
        $this->book = $book;

        return $this;
    }

    /**
     * Get the value of bookid
     */ 
    public function getBookid()
    {
        return $this->bookid;
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
     * Get the value of coverpage
     */ 
    public function getCoverpage()
    {
        return $this->coverpage;
    }

    /**
     * Set the value of coverpage
     *
     * @return  self
     */ 
    public function setCoverpage($coverpage)
    {
        $this->coverpage = $coverpage;

        return $this;
    }
}