<?php

namespace App\Model;

define("DB_HOST","localhost");
define("DB_NAME","bookstore");
define("DB_UserName","root");
define("DB_PASSWORD","Tharun");

/**
 * Connection is responsible for give Connection to the classes
 */
trait Connection{


    /**
     * getconnection() will return Pdo connection Object.
     *
     * @return \PDO
     */
    public function getConnection():\PDO
    {
        $conn=new \PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_UserName,DB_PASSWORD);
        
        if($conn)
        {
            
            
            return $conn;
        }
        else
        {
            echo "connection not established";
            die("happended something");
           
        }
    }

}
