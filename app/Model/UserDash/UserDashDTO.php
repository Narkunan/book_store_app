<?php
namespace App\Model\UserDash;
class UserDashDTO
{
   private array $userData;
   private array $orders;
   private int $userid;
   private string $name;
    /**
     * Get the value of orders
     */ 
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * Set the value of orders
     * 
     * @param array $orders
     *
     * @return  self
     */ 
    public function setOrders(array $orders)
    {
        $this->orders = $orders;

        return $this;
    }
     /**
    * Get the value of userData
    */ 
   public function getUserData()
   {
      return $this->userData;
   }

   /**
    * Set the value of userData
    *
    *@param array $userdata
    *
    * @return  self
    */ 
   public function setUserData($userData)
   {
      $this->userData = $userData;

      return $this;
   }
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

   /**
    * Get the value of name
    */ 
   public function getName()
   {
      return $this->name;
   }

   /**
    * Set the value of name
    *
    * @return  self
    */ 
   public function setName(string $name)
   {
      $this->name = $name;

      return $this;
   }
}