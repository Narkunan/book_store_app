<?php
namespace App\Model\Home;
use App\Model\Home\HomeAbstractModel;
use App\Model\Home\FetchBookInterface;
/**
 *indexModel will Fetch Book detail
 */
class IndexModel extends HomeAbstractModel  
{
    /**
     * FetchBook will fetch all book details.
     *
     * @return bool
     */
    public function fetchBook():bool
    {
        try
        {
            $sql="SELECT * FROM book ORDER BY sales_count DESC";
            $result=$this->conn->prepare($sql);
            $result->execute();
            if($result->rowCount()>0)
            {
                 $this->setFetchBook($result->fetchAll(\PDO::FETCH_ASSOC));
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
