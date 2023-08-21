<?php
namespace App\Model\authordash;

require_once "../../../vendor/autoload.php";



class AuthorDashModel extends authordashAbstract
{
    private string $title;
    private string $category;
    private string $subcategory;
    private string $coverpage;

    private string $description;
    private int $price;
    private int $stock;
    
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
     * @return  self
     */ 
    public function setTitle($title):self
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
     * @return  self
     */ 
    public function setCategory($category):self
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
     * @return  self
     */ 
    public function setSubcategory($subcategory):self
    {
        $this->subcategory = $subcategory;

        return $this;
    }

    /**
     * Get the value of coverpage
     * 
     * @return  string 
     */ 
    public function getCoverpage():string
    {
        return $this->coverpage;
    }

    /**
     * Set the value of coverpage
     *
     * @return  self
     */ 
    public function setCoverpage($coverpage):self
    {
        $this->coverpage = $coverpage;

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
     * @return  self
     */ 
    public function setDescription($description):self
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
     * @return  self
     */ 
    public function setPrice($price):self
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
     * @return  self
     */ 
    public function setStock($stock):self
    {
        $this->stock = $stock;

        return $this;
    }
    /**
     * PublishBook function will publish book
     *
     * @return bool
     */
   public function publishBook():bool
   {
    $sql="INSERT INTO book(authorname,title,price,stock,category,sub_category,authorid,coverpage,description,published_Date,sales_count)
    values(:authorname,:title,:price,:stock,:category,:sub_category,:authorid,:coverpage,:description,:date,0);";
    $stm=$this->connection->prepare($sql);
    $stm->bindParam("authorname",$this->authorname);
    $stm->bindParam("title",$this->title);
    $stm->bindParam("price",$this->price);
    $stm->bindParam("stock",$this->stock);
    $stm->bindParam("category",$this->category);
    $stm->bindParam("sub_category",$this->subcategory);
    $stm->bindParam("authorid",$this->authorid);
    $stm->bindParam("coverpage",$this->coverpage);
    $stm->bindParam("description",$this->description);
    $date=date("Y-m-d");
    $stm->bindParam("date",$date);
    $stm->execute();
    if($stm)
    {
        return true;
    }
    else
    {
        return false;
    }
   }
}