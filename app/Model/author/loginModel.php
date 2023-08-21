<?php

namespace App\Model\author;

require_once "../../../vendor/autoload.php";

use App\Model\author\abstarctModel;

/**
 * LoginModel class is responsible for getters and setters
 * 
 * to LoginModel.
 */
class LoginModel extends abstarctModel
{

    private $id;
    private $name;

    /**
     * checkforaccountexsits for given user.
     *
     * @return boolean
     */
    public function checkAccountExsits():bool
    {
        $reult=$this->conn->prepare("SELECT * FROM author where email= :email and password=:password;");
        $reult->bindParam("email",$this->email);
        $reult->bindParam("password",$this->password);
        $reult->execute();
        $row =$reult->fetch(\PDO::FETCH_ASSOC);

        if($reult->rowCount()>0)
        {
            $name=$row["Author_name"];
            $id=$row["Author_id"];
            $this->setName($name);
            $this->setId($id);
            echo "<center><h1>user already exists</h1></center>";
            return true;
        }
        else
        {
            return false;
        }

    }

    /**
     * loginauthor() will call checkaccountexsits 
     * 
     * if user exists return true
     * 
     * else return false.
     *
     * @return boolean
     */
    public function LoginAuthor():bool
    {
        
        if($this->checkAccountExsits())
        {
            echo "user already exists should be redirect to user dash";
            return true;
        }
        else
        {
            echo "userot exists should be redirect to the register.html";
            return false;
        }

    }

    /**
     * Get the value of id
     * 
     * @return string
     */ 
    public function getId():string
    {
        return $this->id;
    }

    /**
     * Set the value of id
     * 
     * @param string $id
     *
     * @return  void
     */ 
    public function setId($id)
    {
        $this->id = $id;
    }

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
     * Set the value of name
     * 
     * @param string $name
     *
     * @return  string
     */ 
    public function setName($name)
    {
        $this->name = $name;

    }
}