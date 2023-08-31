<?php
namespace App\Model\authordash;
/**
 * authordashModel class
 * 
 * will publish Book
 */
class AuthorDashModel extends bookUpdateBase
{
    private string $coverpage;
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
     * @param string $coverpage
     * 
     * @return  self
     */ 
    public function setCoverpage(string $coverpage):self
    {
        $this->coverpage = $coverpage;

        return $this;
    }

    
    /**
     * PublishBook function will publish book
     * 
     * @access public
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