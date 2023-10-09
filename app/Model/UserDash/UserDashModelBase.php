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
     protected function saveData(string $sql , array $args):bool
     {
         try
         {
               $stm = $this->conn->prepare($sql);
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
}