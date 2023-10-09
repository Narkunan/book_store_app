<?php
namespace App\Model\Home;
use App\Model\Home\HomeAbstractModel;
/**
 * searchByTitleModel will fetch Books by title.
 */
class SearchByTitleModel extends HomeAbstractModel
{
    /**
     * fetchBook will fetch Books 
     * 
     * by title
     * 
     * @access public
     *
     * @return boolean
     */
    public function fetchBook(HomeDTO $homeDTO):bool
    {
    
        $sql="SELECT * FROM book where title=:bookname;";
        $args =[
          "bookname"=>$homeDTO->getTitle()
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