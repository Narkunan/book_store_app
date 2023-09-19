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
          $stm = $this->connection->prepare("SELECT category,COUNT(*) as total FROM book where authorid = :authorid group by category;");
          $stm->bindParam("authorid",$authordashDTO->authorid);
          $stm->execute();
          if($stm->rowCount()>0)
          {
             
             $authordashDTO->book=$stm->fetchAll(\PDO::FETCH_ASSOC);
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
