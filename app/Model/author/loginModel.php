<?php

namespace App\Model\author;

//require_once "../../../vendor/autoload.php";

use App\Model\author\abstarctModel;

/**
 * LoginModel class is responsible for getters and setters
 * 
 * to LoginModel.
 */
class LoginModel extends abstarctModel
{

    private $id;
    

    /**
     * check for account exsits for given user.
     *
     * @return boolean
     */
    public function checkDualUser():bool
    {   
        
        $sql="select us.name,us.user_id from users as us join user_role as ur 
                on ur.user_id = us.user_id 
                    where us.email = :email and us.password = :password ;";
        $reult=$this->conn->prepare($sql);
        $reult->bindParam("email",$this->email);
        $reult->bindParam("password",$this->password);
        $reult->execute();

        if($reult->rowCount()==2)
        {   
            $details = $reult->fetchAll(\PDO::FETCH_ASSOC);
            $this->setId($details[0]['user_id']);
            $this->setName($details[0]['name']);
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
    public function LoginAuthor():string
    {
        
        if($this->checkDualUser())
        {
            
            return "Dual";   
        }
        else if($this->checkUser())
        {
           
           return "user";
        }
        else if($this->checkAuthor())
        {
           
           return "author";
        }
        else 
        {
            
            return "No";
        }

    }
    public function checkUser():bool
    {
        echo "check user";
        $sql = "select us.name ,us.user_id from users as us join user_role as ur
                     on ur.user_id = us.user_id 
                        where us.email = :email and us.password = :password and ur.roleid=2;";
        $stm = $this->conn->prepare($sql);
        $stm->bindParam("email",$this->email);
        $stm->bindParam("password",$this->password);
        $stm->execute();
        if($stm->rowCount()==1)
        {  
           $details=$stm->fetchAll(\PDO::FETCH_ASSOC);
           $this->setId($details[0]['user_id']);
           $this->setName($details[0]['name']);
           return true;
        }
        else
        {
            return false;
        }
    }
    public function checkAuthor():bool
    {
        echo "check author";
        $sql = "select us.name ,us.user_id from users as us join user_role as ur
                 on ur.user_id = us.user_id 
                    where us.email = :email and us.password = :password and ur.roleid=1;";
        $stm = $this->conn->prepare($sql);
        $stm->bindParam("email",$this->email);
        $stm->bindParam("password",$this->password);
        $stm->execute();
        if($stm->rowCount()==1)
        {  
           $details=$stm->fetchAll(\PDO::FETCH_ASSOC);
           $this->setId($details[0]['user_id']);
           $this->setName($details[0]['name']);
           return true;
        }
        else
        {
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

    
}