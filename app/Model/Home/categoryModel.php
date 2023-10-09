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

            $sql="SELECT * FROM book where category=:category;";
            $args=[
                "category"=>$homeDTO->getCategory()
            ];
            $result = $this->retrieveBook($sql,$args,$homeDTO);
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
 