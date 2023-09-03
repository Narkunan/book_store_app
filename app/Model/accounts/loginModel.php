<?php
namespace App\Model\accounts;
use App\Model\accounts\abstarctModel;

/**
 * LoginModel class is responsible for login user.
 * 
 * 
 */
class LoginModel extends abstarctModel
{

    private $id;
    
    /**
     * checkdualuser function will check the 
     * 
     * user has dual role .
     * 
     * @access public
     *
     * @return boolean
     */
    public function checkDualUser():bool
    {   

        try
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
        catch(\PDOException $e)
        {
            echo $e->getMessage();
            return false;
        }

    }

    /**
     * loginauthor() will call checkaccountexsits 
     * 
     * if user has Dual return dual
     * 
     * if user has one role as user it will return user
     * 
     * if user has one role as Author it will return Author
     * 
     * if account not found it will return no.
     * 
     * @access public
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
    /**
     * checkUser function will check the
     * 
     * given user is user
     * 
     * @access public 
     *
     * @return boolean
     */
    public function checkUser():bool
    {
        try
        {
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
        catch(\PDOException $e)
        {
            echo $e->getMessage();
            return false;
        }
    }

    /**
     * checkAuthor function will check 
     * 
     * user is Author or not
     *
     * @access public 
     * 
     * @return boolean
     */
    public function checkAuthor():bool
    {
        
       try
       {
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
        catch(\PDOException $e)
        {
            echo $e->getMessage();
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
    public function setId(string $id):void
    {
        $this->id = $id;
    }

    
}