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
            $sql="SELECT coverpage FROM book WHERE bookid=:bookid;";
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
        $sql="DELETE FROM book where bookid=:bookid;";
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
          $sql="SELECT * FROM BOOK where bookid=:bookID;";
          $result=$this->connection->prepare($sql);
          $result->bindParam("bookID",$authordashDTO->bookid);
          $result->execute();
          if($result)
          {
            $authordashDTO->book=$result->fetchAll(\PDO::FETCH_ASSOC);
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
  
        $sql="INSERT INTO book(authorname,title,price,stock,category,sub_category,authorid,coverpage,description,published_Date,sales_count)
        values(:authorname,:title,:price,:stock,:category,:sub_category,:authorid,:coverpage,:description,:date,0);";
        $date=date("Y-m-d");
        $param=[
            "authorname"=>$authordashDTO->getAuthorname(),
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
            $sql="UPDATE book SET title=:title,price=:price,category=:category,sub_category=:sub_category,stock=:stock,description=:description where bookid=:bookid;";
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