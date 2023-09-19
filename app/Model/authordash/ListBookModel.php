<?php
namespace App\Model\authordash;
use App\Model\authordash\authordashAbstract;

class ListBookModel extends authordashAbstract
{
    
    
    /**
     * fetchBooksByAuthorId function will fetch Books
     * 
     * that are Published By author and return true if any book is available
     * 
     * else return false if no book is found
     *
     * @return boolean
     */
    public function fetchBooksByAuthorId(AuthordashDTO $authordashDTO):bool
    {
       try
       {
            $sql="SELECT * FROM BOOK WHERE authorid=:authorID;";
            $result=$this->connection->prepare($sql);
            $result->bindParam("authorID",$authordashDTO->authorid);
            $result->execute();
            if($result->rowCount()>0)
            {
               $authordashDTO->book=$result->fetchAll(\PDO::FETCH_ASSOC);
          
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
