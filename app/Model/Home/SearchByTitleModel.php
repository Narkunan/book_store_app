<?php
namespace App\Model\Home;
use App\Model\Home\HomeAbstractModel;
use App\Model\Home\FetchBookInterface;

class SearchByTitleModel extends HomeAbstractModel implements FetchBookInterface
{
    private array $bookTitle;
    public string $title;
    public function fetchBook():bool
    {
       $sql="SELECT * FROM book where title=:bookname;";
       $result=$this->conn->prepare($sql);
       $result->bindParam("bookname",$this->title);
       $result->execute();
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


}