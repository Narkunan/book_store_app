<?php
namespace App\Model\authordash;
use App\model\authordash\authordashAbstract;

/**
 * welcomepagemodel will fetch data 
 * 
 * like how many books they have published 
 * 
 * by category.
 */
class WelcomePageModel extends authordashAbstract
{
      public function fetchBookByCategory(AuthordashDTO $authordashDTO):bool
      {
          try
          {
            
          $sql = "SELECT cate.categoryname,COUNT(books.bookid) as noofbooks
                  FROM books INNER JOIN category as cate on books.categoryid = cate.categoryid
                  where books.Authorid =:authorid GROUP BY cate.categoryname;";
          $stm = $this->connection->prepare($sql);
          $authorid= $authordashDTO->getAuthorid();
          $stm->bindParam("authorid",$authorid);
          $stm->execute();
          if($stm->rowCount()>0)
          {
             
            $authordashDTO->setBook($stm->fetchAll(\PDO::FETCH_ASSOC));
            var_dump($authordashDTO->getBook());
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
