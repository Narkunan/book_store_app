<?php
namespace App\Model\authordash;
use App\Model\authordash\authordashAbstract;
/**
 * deleteBookModel will fetch books
 * 
 * those who are Available to delete
 */
class DeleteBookModel extends authordashAbstract
{
    /**
     * fetchBook function will fetchBook
     * 
     * for deletion.
     * 
     * @access public
     *
     * @return boolean
     */
    public function fetchBook():bool
    {
        $sql="SELECT * from book where authorid=:authorid";
        $result=$this->connection->prepare($sql);
        $result->bindParam("authorid",$this->authorid);
        $result->execute();
        if($result->rowCount()>0)
        {
            $this->book=$result->fetchAll(\PDO::FETCH_ASSOC);
            return true;
        }
        else
        {
            return false;
        }
    }

}