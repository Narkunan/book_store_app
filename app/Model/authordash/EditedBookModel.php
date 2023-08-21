<?php
namespace App\Model\authordash;
use App\Model\Connection;
class EditedBookModel
{
    use Connection;

    private \PDO $conn;
    private int $bookid;
    private string $booktitle;
    private string $category;
    private string $sub_category;

    private string $description;
    private int $price;
    private int $stock;

    public function __construct()
    {
        $this->conn=$this->getConnection();
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
     * Set the value of booktitle
     *
     * @return  self
     */ 
    public function setBooktitle($booktitle)
    {
        $this->booktitle = $booktitle;

        return $this;
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
     * Set the value of sub_category
     *
     * @return  self
     */ 
    public function setSub_category($sub_category)
    {
        $this->sub_category = $sub_category;

        return $this;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
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
     * Set the value of stock
     *
     * @return  self
     */ 
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }
    public function updateBook():bool
    {
         $sql="UPDATE book SET title=:title,price=:price,category=:category,sub_category=:sub_category,stock=:stock,description=:description where bookid=:bookid;";
         $result=$this->conn->prepare($sql);
         $result->bindParam("title",$this->booktitle);
         $result->bindParam("category",$this->category);
         $result->bindParam("sub_category",$this->sub_category);
         $result->bindParam("stock",$this->stock);
         $result->bindParam("description",$this->description);
         $result->bindParam("price",$this->price);
         $result->bindParam("bookid",$this->bookid);
         $result->execute();
         
         if($result)
         {
            
            return true;
         }
         else
         {
            
            return false;
         }
    }
}