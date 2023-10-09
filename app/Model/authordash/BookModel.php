<?php
namespace App\Model\authordash;
use App\Model\authordash\authordashAbstract;
/**
 * BookModel will do crud
 * 
 * operation related to book in DataBase.
 */
class BookModel extends authordashAbstract
{
    /**
     * deleteBookCoverPage will
     * 
     * fetch Coverpage file name 
     * 
     * to delete locally befor delete form
     * 
     * database.
     *
     * @access public
     * 
     * @return boolean
     */
    public function deleteBookCoverPage(AuthordashDTO $authordashDTO):bool
    {
        try
        {
            $sql="SELECT coverpage FROM books WHERE bookid=:bookid;";
            $result=$this->connection->prepare($sql);
            $result->bindParam("bookid",$authordashDTO->getBookid());
            $result->execute();
            if($result->rowCount()>0)
            {
                $coverpage=$result->fetch(\PDO::FETCH_COLUMN);
                $authordashDTO->setCoverPage($coverpage);
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
     * deleteBook function will delete selected Book from database.
     *
     * @access public 
     * 
     * @return boolean
     */
    public function deleteBook(AuthordashDTO $authordashDTO):bool
    {
        $sql="DELETE FROM books where bookid=:bookid;";
        $args=[
            "bookid"=>$authordashDTO->getBookid()
        ];
        $result=$this->saveData($sql,$args);
        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    /**
     * fetch book by book id will fetch book for edit.
     *
     * @param AuthordashDTO $authordashDTO
     * @return boolean
     */
    public function fetchBookByBookId(AuthordashDTO $authordashDTO):bool
    {

          $sql="SELECT * FROM BOOKS JOIN subcategory as sub 
           ON books.subcategoryid = sub.subcategoryid 
           JOIN category as cate ON cate.categoryid = books.categoryid
           where bookid=:bookID;";

          $args = [
            "bookID"=>$authordashDTO->getBookid()
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
     /**
     * PublishBook function will publish book
     * 
     * @access public
     * @param AuthordashDTO $authordashDTO
     * @return bool
     */
   public function publishBook(BookDTO $bookDTO):bool
   {
          
        $sql="INSERT INTO books(title,price,stock,categoryid,subcategoryid,authorid,coverpage,description,published_Date)
        values(:title,:price,:stock,:category,:sub_category,:authorid,:coverpage,:description,:date);";
        $date=date("Y-m-d");
        $param=[
            
            "title"=>$bookDTO->getTitle(),
            "price"=>$bookDTO->getPrice(),
            "stock"=>$bookDTO->getStock(),
            "category"=>$bookDTO->getCategory(),
            "sub_category"=>$bookDTO->getSubcategory(),
            "authorid"=>$bookDTO->getAuthorid(),
            "coverpage"=>$bookDTO->getCoverpage(),
            "description"=>$bookDTO->getDescription(),
            "date"=>$date
        ];
        $result = $this->saveData($sql,$param);
        if($result)
        {
           return true;
        }
        else
        {
            return false;
        }

   }
    /**
     * updateBook function will update
     * 
     * books information on the database.
     *
     * @access public
     * 
     * @param AuthordashDTO
     * 
     * @return boolean
     */
    public function updateBook(BookDTO $bookDTO):bool
    {
            $sql="UPDATE books SET title=:title,price=:price,category=:category,sub_category=:sub_category,stock=:stock,description=:description where bookid=:bookid;";
            $args=[
                "title"=>$bookDTO->getTitle(),
                "category"=>$bookDTO->getCategory(),
                "sub_category"=>$bookDTO->getSubcategory(),
                "stock"=>$bookDTO->getStock(),
                "description"=>$bookDTO->getDescription(),
                "price"=>$bookDTO->getPrice(),
                "bookid"=>$bookDTO->getBookid()
            ];
            $result = $this->saveData($sql,$args);
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