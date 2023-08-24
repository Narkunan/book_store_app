<?php

namespace App\Model\user;

require_once "../../../vendor/autoload.php";

use App\Model\Connection;

class ForgetModel
{
    private \PDO $conn;
    
    private string $password;
    private string $email;
    
    use Connection;

    /**
     * constructor will establish connection.
     */
    public function __construct()
    {
        $this->conn=$this->getConnection();
    }
    

    /**
     * Get the value of email
     * 
     * @return string 
     */ 
    public function getEmail():string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function forgetPassword()
    {
        $reult=$this->conn->prepare("SELECT * FROM user where email= :email");
        $reult->bindParam("email",$this->email);
        $reult->execute();

        if($reult->rowCount()>0)
        {
            $storedata=$reult->fetchColumn(3);
            $this->setPassword($storedata);
            return true;
        }
        
        else
        {
           return false;
        }
    }

   

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;
    }
}