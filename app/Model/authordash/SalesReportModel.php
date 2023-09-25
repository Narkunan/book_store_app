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
    public function fetchBooks(AuthordashDTO $authordashDTO):bool
    {
        try
        {
            $sql="SELECT books.title,books.price,books.stock,cate.categoryname,sub.subcategoryname,orders.salescount
                    FROM books INNER JOIN category as cate
                        ON books.categoryid = cate.categoryid 
                            INNER JOIN subcategory as sub ON books.subcategoryid = sub.subcategoryid
                                 INNER JOIN orderdetails as orders ON orders.bookid = books.bookid
                                     where books.authorid =:authorid; ";
            $stm=$this->connection->prepare($sql);
            $authorid = $authordashDTO->getAuthorid();
            $stm->bindParam("authorid",$authorid);
            $stm->execute();
            if($stm->rowCount()>0)
            {
                
                $authordashDTO->setBook($stm->fetchAll(\PDO::FETCH_ASSOC));
                return true;
            }
            else
            {
                echo "nothing to fetch";
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
