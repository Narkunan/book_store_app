<?php
namespace App\Model\Home;
use App\Model\Home\HomeAbstractModel;
/**
 * categoryModel will fetch books
 * 
 * by category 
 * 
 */
class CategoryModel extends HomeAbstractModel
{
    private string $category;

    /**
     * 
     * fetchBookBycategory function will fetch
     * 
     * books By category.
     * 
     * @access public
     * 
     * @return bool
     */

    public function fetchBookByCategory(HomeDTO $homeDTO):bool
    {
        try
        {
            $sql="SELECT * FROM book where category='$homeDTO->category';";
            $result=$this->conn->query($sql);
            if($result->rowCount()>0)
            {
                $homeDTO->setFetchBook($result->fetchAll(\PDO::FETCH_ASSOC));
                return true;
            }
            else 
            {
                return false; 
            }
        }
        catch(\PDOException $e)
        {
            echo $e->getMessage();
            return false;
        }
    }
    
   
}
 