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
            
          $sql = "SELECT cate.categoryname,COUNT(books.bookid) as noofbooks
                  FROM books INNER JOIN category as cate on books.categoryid = cate.categoryid
                  where books.Authorid =:authorid GROUP BY cate.categoryname;";
          $args = [
            "authorid"=>$authordashDTO->getAuthorid()
          ];
          $result = $this->retrieveBook($sql,$args,$authordashDTO);
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
