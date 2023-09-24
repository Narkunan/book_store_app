<?php
namespace App\Model\accounts;
use App\Model\accounts\abstarctModel;
/**
 * LoginModel class is responsible for login user.
 * 
 */
class LoginModel extends abstarctModel
{
    private $passwordfromdb; 
    /**
     * checkdualuser function will check the 
     * 
     * user has dual role .
     * 
     * @access public
     *
     * @return boolean
     */
    public function checkDualUser(AccountsDTO $accountsDTO):bool
    {   
        
        try
        {
            
             $sql="select us.name,us.user_id,us.password from users as us join user_role as ur 
                         on ur.user_id = us.user_id 
                             where us.email = :email  ;";
             $reult=$this->conn->prepare($sql);
             $email = $accountsDTO->getEmail();
             $reult->bindParam("email",$email);
             $reult->execute();
          
            if($reult->rowCount()==2)
            {   
                 
                 $details = $reult->fetchAll(\PDO::FETCH_ASSOC);
                 $accountsDTO->setId($details[0]['user_id']);
                 $accountsDTO->setName($details[0]['name']);
                 $this->passwordfromdb = $details[0]['password'];
                 $value=$this->verifyPassword($accountsDTO->getPassword())?true:false;
                 return $value;
                 
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
     * checkUser function will check the
     * 
     * given user is user
     * 
     * @access public 
     *
     * @return boolean
     */
    public function checkUser(AccountsDTO $accountsDTO):bool
    {
       
        try
        {

            $sql = "select us.name ,us.user_id,us.password from users as us join user_role as ur
                     on ur.user_id = us.user_id 
                        where us.email = :email and ur.roleid = 2";
            $stm = $this->conn->prepare($sql);
            $email = $accountsDTO->getEmail();
            $stm->bindParam("email",$email);
            $stm->execute();
            
            if($stm->rowCount()==1)
            {  
                
                $details=$stm->fetchAll(\PDO::FETCH_ASSOC);
                $accountsDTO->setId($details[0]['user_id']);
                $accountsDTO->setName($details[0]['name']);
                $this->passwordFromDB = $details[0]['password'];
                $value=$this->verifyPassword($accountsDTO->getPassword())?true:false;
                return $value;

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
    public function checkAuthor(AccountsDTO $accountsDTO):bool
    {
       
       try
       {
            $sql = "select us.name ,us.user_id,us.password from users as us join user_role as ur
                    on ur.user_id = us.user_id where us.email = :email and ur.roleid = 1;";
                    
            $stm = $this->conn->prepare($sql);
            $email= $accountsDTO->getEmail();
            $stm->bindParam("email",$email);
            
            $stm->execute();
            
            
            if($stm->rowCount()==1)
            {  
               
                $details=$stm->fetchAll(\PDO::FETCH_ASSOC);
                
                $accountsDTO->setId($details[0]['user_id']);
                $accountsDTO->setName($details[0]['name']);
                $this->passwordFromDB = $details[0]['password'];
                $value=$this->verifyPassword($accountsDTO->getPassword())?true:false;
                return $value;
                
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
    
    public function verifyPassword(string $password):bool
    {
          if(password_verify($password,$this->passwordfromdb))
          {
            echo "password verified";
            return true;
          }
          else
          {
            
            return false;
          }
    }
    
}