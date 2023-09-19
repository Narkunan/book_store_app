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
      public function fetchBookByCategory():bool
      {
          try
          {
          $stm = $this->connection->prepare("SELECT category,COUNT(*) as total FROM book where authorid = :authorid group by category;");
          $stm->bindParam("authorid",$this->authorid);
          $stm->execute();
          if($stm->rowCount()>0)
          {
             
             $this->book=$stm->fetchAll(\PDO::FETCH_ASSOC);
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
