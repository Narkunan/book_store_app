<?php
namespace App\Model\Home;
class HomeDTO
{
    private array $FetchBook;
    private int $bookId;
    private string $title; 
    private string $category;
    private float $totalprice;
    private int $quantity;
   
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
     
    /**
     * Set the value of bookId
     *
     * @param int $bookId
     * 
     * @return  self
     */ 
    public function setBookId(int $bookId):self
    {
        $this->bookId = $bookId;

        return $this;
    }
    /**
     * Get the value of totalprice
     */ 
    public function getTotalprice()
    {
        return $this->totalprice;
    }

    /**
     * Set the value of totalprice
     *
     * @return  self
     */ 
    public function setTotalprice($totalprice)
    {
        $this->totalprice = $totalprice;

        return $this;
    }

    /**
     * Get the value of quantity
     */ 
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */ 
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }
    
    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of category
     */ 
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the value of category
     *
     * @return  self
     */ 
    public function setCategory(string $category)
    {
        $this->category = $category;

        return $this;
    }
}