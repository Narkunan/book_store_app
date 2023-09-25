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
}