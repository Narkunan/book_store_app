<?php
namespace App\Model\orders;
class checkOutDTO
{
    private float $price;
    private float $totalPrice;
    private int $quantity;
    private int $userid;
    private int $bookid;
    private float $finalprice;

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
     * Get the value of totalPrice
     */ 
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * Set the value of totalPrice
     *
     * @return  self
     */ 
    public function setTotalPrice()
    {
        $this->totalPrice = $this->price * $this->quantity;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }
     /**
     * Set the value of userid
     * 
     * @param int $userid
     *
     * @return  self
     */ 
    public function setUserid(int $userid):self
    {
       
        $this->userid = $userid;

        return $this;
    }

    /**
     * Set the value of bookid
     * 
     * @param int $bookid
     *
     * @return  self
     */ 
    public function setBookid(int $bookid):self
    {
        
        $this->bookid = $bookid;

        return $this;
    }
    


    /**
     * Get the value of finalprice
     */ 
    public function getFinalprice()
    {
        return $this->finalprice;
    }

    /**
     * Set the value of finalprice
     *
     * @return  self
     */ 
    public function setFinalprice($finalprice)
    {
        $this->finalprice = $finalprice;

        return $this;
    }
}