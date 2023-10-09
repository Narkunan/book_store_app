<?php
namespace App\Model\authordash;

class BookDTO{
    private array $book;
    private string $title;
    private int $category;
    private int $subcategory;
    private string $description;
    private int $price;
    private int $stock;
    private int $bookid;
    private string $coverpage;
    private int $authorid;

    public function __construct($booktitle,$category,$subcategory,$description,$stock,$price){
            $this->title = $booktitle;
            $this->category = $category;
            $this->subcategory = $subcategory;
            $this->description = $description;
            $this->stock = $stock;
            $this->price = $price; 
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
    public function setCategory(int $category):self
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
    public function setSubcategory(int $subcategory):self
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
    public static function fromArray(array $value):self{
        return new self(
                       $value['booktitle'],$value["book_category"],$value["book_subcategory"],
                       $value["description"],$value["stock"],$value["price"]
        );
    }

    /**
     * Get the value of authorid
     */ 
    public function getAuthorid()
    {
        return $this->authorid;
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
}
