<?php
namespace App\Model\authordash;
use App\Model\authordash\authordashAbstract;
/**
 * EditedspecificBookmodel class will fetch the 
 * 
 * specific Book Data By bookid.
 * 
 */
class EditBookModel extends authordashAbstract
{

    private int $bookid;
    /**
     * fetchBookByBookId will fetch specific Book Data
     * 
     * Based on the Book Id
     * 
     * if Book is available Return True
     *
     * else Book is Not Found Return False
     * 
     * @access public
     * 
     * @return boolean
     */
    public function fetchBookByBookId():bool
    {
       try
       {
          $sql="SELECT * FROM BOOK where bookid=:bookID;";
          $result=$this->connection->prepare($sql);
          $result->bindParam("bookID",$this->bookid);
          $result->execute();
          if($result)
          {
            $this->book=$result->fetchAll(\PDO::FETCH_ASSOC);
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
     * Set the value of bookid
     * 
     * @param int $bookid
     *
     * @return  self
     */ 
    public function setBookid($bookid):self
    {
        $this->bookid = $bookid;

        return $this;
    }

    
}