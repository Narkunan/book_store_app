<?php
namespace App\Model\authordash;
use App\Model\authordash\authordashAbstract;
/**
 * publishBookModel will fetch all the Book
 * 
 * published by author 
 * 
 */
class publishBookModel extends authordashAbstract
{
   
    /**
     * fetchBook function will fetch all the books 
     * 
     * and associated data published by the author.
     *
     * @return boolean
     */
    public function fetchBooks():bool
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


}