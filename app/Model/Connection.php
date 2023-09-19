<?php
namespace App\Model;

require "config.php";
/**
 * Connection is responsible for give Connection to the classes
 */
class Connection{

     private static $instance = null;
     private $conn;
    /**
     * create new connection when object is instantiated.
     */
    private function __construct()
    {
        $this->conn=new \PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_UserName,DB_PASSWORD);
    }
    /**
     * check for connection exists 
     * 
     * if connection exists it will existing connection
     * 
     * else it will create new connection
     *
     * @return Connection
     */
    public static function getInstance(): Connection
    {
        
        
        if(self::$instance == null)
        {
            self::$instance = new Connection();
           
            return self::$instance;
        }
        else
        {
            
            return self::$instance;
        }
        
    }
    /**
     * getconnection will return connection
     *
     * @return \PDO
     */
    public function getConnection():\PDO
    {
        return $this->conn;
    }

}

