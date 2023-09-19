<?php
namespace App\Model\Home;
use App\Model\Home\HomeAbstractModel;
use App\Model\Home\FetchBookInterface;
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
      try
      {
        $sql="SELECT * FROM book where title=:bookname;";
        $result=$this->conn->prepare($sql);
        $result->bindParam("bookname",$homeDTO->title);
        $result->execute();
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