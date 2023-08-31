<?php
namespace App\Model\authordash;
use App\Model\authordash\authordashAbstract;
/**
 * deleteSelectedBookModel will delete Seleceted
 * 
 * Book in DataBase.
 */
class DeleteSelectedBookModel extends authordashAbstract
{
    private int $bookid;

    private string $coverPage;

    /**
     * Set the value of bookid
     *
     * @param int $bookid
     * 
     * @return  self
     */ 
    public function setBookid(int $bookid):self
    {
        $this->bookid = $bookid;

        return $this;
    }
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
    public function deleteBookCoverPage():bool
    {
        $sql="SELECT coverpage FROM book WHERE bookid=:bookid;";
        $result=$this->connection->prepare($sql);
        $result->bindParam("bookid",$this->bookid);
        $result->execute();
        if($result->rowCount()>0)
        {
            $coverpage=$result->fetch(\PDO::FETCH_COLUMN);
            $this->setCoverPage($coverpage);
            return true;
        }
        else
        {
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
    public function deleteBook():bool
    {
        $sql="DELETE FROM book where bookid=:bookid;";
        $result=$this->connection->prepare($sql);
        $result->bindParam("bookid",$this->bookid);
        $result->execute();
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
     * Get the value of coverPage
     */ 
    public function getCoverPage():string
    {
        return $this->coverPage;
    }

    /**
     * Set the value of coverPage
     *
     * @param string $coverpage
     * 
     * @return  self
     */ 
    public function setCoverPage( string $coverPage):self
    {
        $this->coverPage = $coverPage;

        return $this;
    }
}