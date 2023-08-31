<?php
namespace App\Model\authordash;
use App\Model\authordash\authordashAbstract;

/**
 * BookUpadetBase will provide Common Variables for 
 * 
 * update and
 * 
 * publish Book classes.
 * 
 */
class bookUpdateBase extends authordashAbstract
{
    protected string $title;
    protected string $category;
    protected string $subcategory;
    protected string $description;
    protected int $price;
    protected int $stock;
    
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

}