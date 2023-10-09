<?php
namespace App\Model\Home;
use App\Model\Connection;

/**
 * HomeAbstractModel have common variables and function 
 * 
 * to be used across the classes.
 */
class HomeAbstractModel
{
    protected $conn;
    
    /**
     * Constructor will establish connection
     */
    public function __construct()
    {
        $this->conn = Connection::getInstance();
        $this->conn=$this->conn->getConnection();
    }

    protected function retrieveBook(string $sql,array $args,HomeDTO $dto):bool{

        try
        {
        $stm = $this->conn->prepare($sql);
        foreach($args as $key=>$value)
        {
            $stm->bindValue(":".$key,$value);
        }
        $stm->execute();
        if($stm->rowCount()>0)
        {
            $dto->setFetchBook($stm->fetchAll(\PDO::FETCH_ASSOC));
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