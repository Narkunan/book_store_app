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
            $result->bindParam("bookid",$authordashDTO->bookid);
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
        $result=$this->executeQuery($sql,$args);
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
       try
       {
          $sql="SELECT * FROM BOOKS JOIN subcategory as sub 
           ON books.subcategoryid = sub.subcategoryid 
           JOIN category as cate ON cate.categoryid = books.categoryid
           where bookid=:bookID;";
          $result=$this->connection->prepare($sql);
          $bookid = $authordashDTO->getBookid();
          $result->bindParam("bookID",$bookid);
          $result->execute();
          if($result)
          {
            
            $authordashDTO->setBook($result->fetchAll(\PDO::FETCH_ASSOC));
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
     * PublishBook function will publish book
     * 
     * @access public
     * @param AuthordashDTO $authordashDTO
     * @return bool
     */
   public function publishBook(AuthordashDTO $authordashDTO):bool
   {
  
        $sql="INSERT INTO books(title,price,stock,categoryid,subcategoryid,authorid,coverpage,description,published_Date)
        values(:title,:price,:stock,:category,:sub_category,:authorid,:coverpage,:description,:date);";
        $date=date("Y-m-d");
        $param=[
            
            "title"=>$authordashDTO->getTitle(),
            "price"=>$authordashDTO->getPrice(),
            "stock"=>$authordashDTO->getStock(),
            "category"=>$authordashDTO->getCategory(),
            "sub_category"=>$authordashDTO->getSubcategory(),
            "authorid"=>$authordashDTO->getAuthorid(),
            "coverpage"=>$authordashDTO->getCoverpage(),
            "description"=>$authordashDTO->getDescription(),
            "date"=>$date
        ];
        $result = $this->executeQuery($sql,$param);
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
    public function updateBook(AuthordashDTO $authordashDTO):bool
    {
            $sql="UPDATE books SET title=:title,price=:price,category=:category,sub_category=:sub_category,stock=:stock,description=:description where bookid=:bookid;";
            $args=[
                "title"=>$authordashDTO->getTitle(),
                "category"=>$authordashDTO->getCategory(),
                "sub_category"=>$authordashDTO->getSubcategory(),
                "stock"=>$authordashDTO->getStock(),
                "description"=>$authordashDTO->getDescription(),
                "price"=>$authordashDTO->getPrice(),
                "bookid"=>$authordashDTO->getBookid()
            ];
            $result = $this->executeQuery($sql,$args);
            if($result)
            {
            
                return true;
            }
            else
            {
            
                return false;
            }
       
    }
    private function executeQuery(string $sql,array $args):bool
    {
        try
        {
        $stm = $this->connection->prepare($sql);
        foreach($args as $key=>$value)
        {
            $stm->bindValue(":".$key,$value);
        }
        $stm->execute();
        if($stm)
        {
            return true;
        }
        else
        {
            return false;
        }
         }
        catch(\PDOException $e)
        {
           $e->getMessage();
           return false;
        }

    }

    
}