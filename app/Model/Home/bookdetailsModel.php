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
        
        try
        {
            
            $sql ="SELECT * FROM book where bookid='$homeDTO->bookId';";
            $book=$this->conn->prepare($sql);
            $book->execute();
            if($book->rowCount()>0)
            {
                $books=$book->fetchAll(\PDO::FETCH_ASSOC);
                $homeDTO->setFetchBook($books);
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