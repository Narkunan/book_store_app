<?php

namespace App\Model\user;

require_once "../../../vendor/autoload.php";

use App\Model\Connection;

class LoginModel
{
    private $email;
    private $password; 
    private $conn;
    private $id;

    private $name;

    use Connection;
    
    public function __construct()
    {
        $this->conn=$this->getConnection();
    }

    /**
     * Get the value of email
     */ 
    public function getemail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setemail($email)
    {
        $this->email = $email;
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
    public function Loginuser()
    {
        $reult=$this->conn->prepare("SELECT * FROM user where email= :email and password=:password;");
        $reult->bindParam("email",$this->email);
        $reult->bindParam("password",$this->password);
        $reult->execute();
        echo "<h1> query executed</h1>";
        //echo $id,"<br>",$name;
        if($reult->rowCount()>0)
        {
            $row =$reult->fetch(\PDO::FETCH_ASSOC);
            $name=$row["user_name"];
            $id=$row["id"];
            $this->setName($name);
            $this->setId($id);
            echo "<center><h1>user already exists</h1></center>";
            return true;
        }
        
        else
        {
            echo "<h1> account not found</h1>";
           return false;
        }

    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;
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
    public function setName($name)
    {
        $this->name = $name;

    }
}