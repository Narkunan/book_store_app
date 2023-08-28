<?php
namespace App\Model\UserDash;
use App\Model\Connection;
abstract class UserDashModelBase 
{
     use Connection;
     protected $userid;
     protected $conn;
     public function setUserId($userid):void
     {
          $this->userid = $userid;
     }
     public function getUserId():int
     {
        return $this->userid;
     }
     public function __construct()
     {
        $this->conn = $this->getConnection();
     }
}