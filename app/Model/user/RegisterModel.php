<?php
namespace App\Model\user;

require_once "../../../vendor/autoload.php";

use App\Model\Connection;
class RegisterModel
{
    private $name;
    private $email;
    private $password;
    private $address;
    private $conn;

    use Connection;
    
    public function __construct()
    {
        $this->conn=$this->getConnection();
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
     * 
     */ 
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * 
     */ 
    public function setEmail($email)
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
     * 
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

       
    }

    public function registerUser()
    {
        
        $reult=$this->conn->prepare("SELECT * FROM user where email= :email;");
        $reult->bindParam("email",$this->email);
        $reult->execute();

        if($reult->rowCount()>0)
        {
            echo "<center><h1>user already exists</h1></center>";
            return false;
        }
        
        else
        {

         $sql="INSERT INTO user(user_name,email,password,address) values (:name,:email,:password,:address);";
         $stn=$this->conn->prepare($sql);
         $stn->bindParam("name",$this->name);
         $stn->bindParam("email",$this->email);
         $stn->bindParam("password",$this->password);
         $stn->bindParam("address",$this->address);
         $stn->execute();
         if($stn)
         {
            echo "dataposted";
            return true;
         }
         else 
         {
            die("some problem");
         }

        }
    }

    /**
     * Get the value of address
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */ 
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }
}