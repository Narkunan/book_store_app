<?php
namespace App\Model\Home;
use App\Model\Home\HomeAbstractModel;
use App\Model\Home\FetchBookInterface;
/**
 * searchByTitleModel will fetch Books by title.
 */
class SearchByTitleModel extends HomeAbstractModel
{

    private string $title; 

    /**
     * fetchBook will fetch Books 
     * 
     * by title
     * 
     * @access public
     *
     * @return boolean
     */
    public function fetchBook():bool
    {
      try
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
      catch(\PDOException $e)
      {
        echo $e->getMessage();
        return false;
      }
    }



    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }
}