<?php
namespace App\Model\authordash;
use App\Model\authordash\authordashAbstract;
/**
 * SalesReportModel will fetch all the Book
 * 
 * published by author 
 * 
 */
class SalesReportModel extends authordashAbstract
{
   
    /**
     * fetchBooks function will fetch all the books 
     * 
     * and associated data published by the author.
     *
     * @return boolean
     */
    public function fetchBooks():bool
    {
        try
        {
            $sql="SELECT * FROM book WHERE authorid=:authorid;";
            $stm=$this->connection->prepare($sql);
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