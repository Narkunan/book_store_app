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
    public  $conn;
    
    
    

    /**
     * Constructor will establish connection
     */
    public function __construct()
    {
        $this->conn = Connection::getInstance();
        $this->conn=$this->conn->getConnection();
    }
    
}