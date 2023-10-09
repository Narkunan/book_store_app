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
    public function checkExsits(string $sql,array $args):bool
    {
        $stm = $this->conn->prepare($sql);
        foreach($args as $key=>$value)
        {
            $stm->bindValue(":".$key,$value);
        }
        $stm->execute();
        if($stm->rowCount()>=1)
        {
            return true;
        }
        else
        {
            return false;
        }
            
    }

    protected function save(string $sql,array $args)
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
    public function checkAccountExsits(AccountsDTO $accountsDTO):bool{
        
        $sql="SELECT * FROM users where email= :email;";
        $value=[
            "email"=>$accountsDTO->getEmail()
        ];
        $result = $this->checkExsits($sql,$value);
        if($result)
        {    
            return true;
        }
        else
        {
            return false;
        }
    }

}