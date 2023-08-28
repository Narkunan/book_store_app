<?php
namespace App\Model\Home;
use App\Model\Home\HomeAbstractModel;
class CategoryModel extends HomeAbstractModel
{
    private string $category;
    public function fetchBookByCategory()
    {
        $sql="SELECT * FROM book where category='$this->category';";
        $result=$this->conn->query($sql);
        if($result->rowCount()>0)
        {
          $this->setFetchBook($result->fetchAll(\PDO::FETCH_ASSOC));
          return true;
        }
        else 
        {
           return false; 
        }
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

   
}
 