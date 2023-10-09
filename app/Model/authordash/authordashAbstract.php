<?php
namespace App\Model\authordash;
use App\Model\Connection;

/**
 * authordashModel will provide common variables and 
 * 
 * function to all the classes. 
 * 
 */
abstract class authordashAbstract
{
    
    protected  $connection;
    
    public function __construct()
    {
        $this->connection=Connection::getInstance();
        $this->connection=$this->connection->getConnection();
    }
    protected function saveData(string $sql , array $args):bool{
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
     protected function retrieveBook(string $sql,array $args,AuthordashDTO $DTO):bool
     {
        try
        {
        $stm = $this->connection->prepare($sql);
        foreach($args as $key=>$value)
        {
            $stm->bindValue(":".$key,$value);
        }
        $stm->execute();
        if($stm->rowCount()>0)
        {
            $DTO->setBook($stm->fetchAll(\PDO::FETCH_ASSOC));
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