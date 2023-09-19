<?php 
namespace App\Model\accounts;
use App\Model\Connection;

/**
 * abstract Model class will common variables and function 
 * 
 * to be used across accounts folder classes.
 */
abstract class abstarctModel
{
    use Connection;
    public $email;
    public  $password;
    public $conn;
    public string $name;
    /**
     * intialize the connection to the database.
     */
    public function __construct()
    {
        $this->conn=$this->getConnection();
    }
    
     /**
     * Get the value of email.
     * 
     * @return string
     */ 
    public function getEmail():string
    {
        return $this->email;
    }

    /**
     * Set the value of email.
     * 
     * @param string $email
     * 
     *@return void
     */ 
    public function setEmail(string $email):void
    {
        $this->email = $email;

        
    }

    /**
     * get value of password
     *
     * @return string
     * 
     * 
     */
    public function getPassword():string 
    {
        return $this->password;
    }

    /**
     * Set the value of password.
     *
     * @param string $password
     * 
     * @return void
     */ 
    public function setPassword(string $password):void
    {
        $this->password = $password;

    } 
    
    /**
     * check for account exists.
     *
     * @return void
     */
   /**
     * Get the value of name
     * 
     * @return string
     */ 
    public function getName():string
    {
        return $this->name;
    }
    /**
     * Set the value of name.
     *
     * @param string $name
     * 
     * @return void
     */ 
    public function setName(string $name):void
    {
        $this->name = $name;
    }
    
}