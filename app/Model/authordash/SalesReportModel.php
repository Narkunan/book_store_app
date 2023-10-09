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
  
            $sql="SELECT books.title,books.price,books.stock,cate.categoryname,sub.subcategoryname,orders.salescount
                    FROM books INNER JOIN category as cate
                        ON books.categoryid = cate.categoryid 
                            INNER JOIN subcategory as sub ON books.subcategoryid = sub.subcategoryid
                                 INNER JOIN orderdetails as orders ON orders.bookid = books.bookid
                                     where books.authorid =:authorid; ";
            $args =[
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
