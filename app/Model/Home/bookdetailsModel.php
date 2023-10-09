<?php
namespace App\Model\Home;
use App\Model\Home\HomeAbstractModel;
/**
 * HomeModel will fetchBooks
 * 
 * by bookid
 */
class bookdetailsModel extends HomeAbstractModel 
{
    /**
     * fetchBook will fetchbook by bookid.
     *
     * @access public
     * 
     * @return bool
     */
    public function fetchBook(HomeDTO $homeDTO):bool
    {
        
            $sql ="SELECT * FROM book where bookid=':bookid';";
            $args=[
                "bookid"=>$homeDTO->getBookId()
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