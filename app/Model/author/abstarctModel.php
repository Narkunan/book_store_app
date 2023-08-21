<?php 
namespace App\Model\author;
require_once "../../../vendor/autoload.php";
use App\Model\Connection;
abstract class abstarctModel
{
    use Connection;
    public $email;
    public  $password;
    public $conn;

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
    public function setEmail($email):void
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
    public function setPassword($password):void
    {
        $this->password = $password;

    } 
    
    /**
     * check for account exists.
     *
     * @return void
     */
    abstract public function checkAccountExsits():bool;
    
}