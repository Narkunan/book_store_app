<?php 
namespace App\Model\authordash;
class AuthordashDTO
{
    private array $book;
    private string $title;
    private int $category;
    private int $subcategory;
    private string $description;
    private int $price;
    private int $stock;
    private int $bookid;
    private string $coverpage;
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
    /**
     * Get the value of title
     * 
     * @return string
     */ 
    public function getTitle():string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @param string $title
     * 
     * @return  self
     */ 
    public function setTitle(string $title):self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of category
     * 
     * @return string
     */ 
    public function getCategory():string
    {
        return $this->category;
    }

    /**
     * Set the value of category
     * 
     * @param  string $name
     *
     * @return  self
     */ 
    public function setCategory(string $category):self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get the value of subcategory
     * 
     * @return string
     */ 
    public function getSubcategory():string
    {
        return $this->subcategory;
    }

    /**
     * Set the value of subcategory
     *
     * @param string  $name
     * 
     * @return  self
     */ 
    public function setSubcategory(string $subcategory):self
    {
        $this->subcategory = $subcategory;

        return $this;
    }

    
    /**
     * Get the value of description
     * 
     * @return string
     */ 
    public function getDescription():string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     * 
     * @param string 
     *
     * @return  self
     */ 
    public function setDescription(string $description):self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of price
     * 
     * @return int 
     */ 
    public function getPrice():int
    {
        return $this->price;
    }

    /**
     * Set the value of price
     * 
     * @param int $price
     *
     * @return  self
     */ 
    public function setPrice(float $price):self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of stock
     * 
     * @return int
     */ 
    public function getStock():int
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
     * 
     * @param int $stock
     *
     * @return  self
     */ 
    public function setStock(int $stock):self
    {
        $this->stock = $stock;

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
    public function setBookid(int $bookid)
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
    public function setCoverpage(string $coverpage)
    {
        $this->coverpage = $coverpage;

        return $this;
    }
    private String $authorname;
    private int $authorid;
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

    
}