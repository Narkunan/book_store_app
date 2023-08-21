<?php
namespace App\Model\authordash;

require_once "../../../vendor/autoload.php";

use App\Model\authordash\authordashAbstract;

class publishBookModel extends authordashAbstract
{
   
    private array $Book;

    /**
     * Get the value of Report
     * 
     * @return array
     */ 
    public function getBook():array
    {
        return $this->Book;
    }

    /**
     * Set the value of Report
     *
     * @param array $Report
     * 
     * @return  self
     */ 
    public function setBook($Book)
    {
        $this->Book = $Book;

        return $this;
    }

    public function fetchBooks()
    {
        $sql="SELECT * FROM book WHERE authorid=:authorid;";
        $stm=$this->connection->prepare($sql);
        $stm->bindParam("authorid",$this->authorid);
        $stm->execute();
        if($stm->rowCount()>0)
        {
            $result=$stm->fetchAll(\PDO::FETCH_ASSOC);
            $this->setBook($result);
        }
    }


}