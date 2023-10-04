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
    protected $conn;

    /**
     * intialize the connection to the database.
     */
    public function __construct()
    {
        $this->conn = Connection::getInstance();
        $this->conn = $this->conn->getConnection();
    }
    /**
     * checkforaccountexsits for given user.
     * 
     * @access public
     *
     * @return boolean
     */
    public function checkAccountExsits(AccountsDTO $accountsDTO):bool
    {
            $sql="SELECT * FROM users where email= :email;";
            $reult=$this->conn->prepare($sql);
            $email = $accountsDTO->getEmail();
            $reult->bindParam("email",$email);
            $reult->execute();
            
            if($reult->rowCount()>0)
            {    
                return false;
            }
            else
            {
                
                return true;
            }
        
    }


}