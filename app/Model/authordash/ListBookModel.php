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
            $sql="SELECT * FROM BOOKs 
            INNER JOIN category as cate ON books.categoryid = cate.categoryid
            INNER JOIN subcategory as sub ON books.subcategoryid = sub.subcategoryid
            where books.authorid = :authorID";
            $result=$this->connection->prepare($sql);
            $authorid = $authordashDTO->getAuthorid();
            $result->bindParam("authorID",$authorid);
            $result->execute();
            if($result->rowCount()>0)
            {
               $authordashDTO->setBook($result->fetchAll(\PDO::FETCH_ASSOC));
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

