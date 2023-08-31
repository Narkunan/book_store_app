<?php
namespace App\Model\authordash;
use App\Model\authordash\bookUpdateBase;
/**
 * editedBookModel class will update 
 * 
 * all the updated Information about book.
 */
class EditedBookModel extends bookUpdateBase
{
    private int $bookid;

    /**
     * updateBook function will update
     * 
     * books information on the database.
     *
     * @access public
     * 
     * @return boolean
     */
    public function updateBook():bool
    {
         $sql="UPDATE book SET title=:title,price=:price,category=:category,sub_category=:sub_category,stock=:stock,description=:description where bookid=:bookid;";
         $result=$this->connection->prepare($sql);
         $result->bindParam("title",$this->title);
         $result->bindParam("category",$this->category);
         $result->bindParam("sub_category",$this->subcategory);
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

    /**
     * Get the value of bookid
     */ 
    public function getBookid():int
    {
        return $this->bookid;
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
}