<?php
namespace App\Model\UserDash;
use App\Model\Connection;
/**
 * userdashmodel class have common variable and function.
 * 
 */
abstract class UserDashModelBase 
{ 
     protected $conn;   
     public function __construct()
     {
        $this->conn = Connection::getInstance();
        $this->conn = $this->conn->getConnection();
     }
}