<?php
namespace App\Model\UserDash;
use App\Model\Connection;
/**
 * userdashmodel class have common variable and function.
 * 
 */
abstract class UserDashModelBase 
{
     use Connection;
     protected $userid;
     protected $conn;

     /**
      * set the value for userid
      *
      * @param int $userid
      *
      * @return void
      */
     public function setUserId(int $userid):void
     {
          $this->userid = $userid;
     }

     /**
      * get the value of userId
      *
      * @access public
      *
      * @return integer
      */
     public function getUserId():int
     {
        return $this->userid;
     }
     public function __construct()
     {
        $this->conn = $this->getConnection();
     }
}