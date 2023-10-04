<?php
namespace App\Model\accounts;
use App\Model\accounts\abstarctModel;
/**
 * LoginModel class is responsible for login user.
 * 
 */
class LoginModel extends abstarctModel
{
    private string $passwordFromDB; 
    /**
     * checkdualuser function will check the 
     * 
     * user has dual role .
     * 
     * @access public
     *
     * @return boolean
     */
    public function checkDualUser(loginuserDTO $accountsDTO):bool
    {   
        
             $sql="select us.name,us.user_id,us.password from users as us join user_role as ur 
                         on ur.user_id = us.user_id 
                             where us.email = :email  ;";

             $result = $this->checkUserRole($sql,$accountsDTO);

            if($result)
            {   
                 return true;                 
            }
            else
            {
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
    public function checkUser(loginuserDTO $accountsDTO):bool
    {

            $sql = "select us.name ,us.user_id,us.password from users as us join user_role as ur
                     on ur.user_id = us.user_id 
                        where us.email = :email and ur.roleid = 2";
        
            $result = $this->checkUserRole($sql,$accountsDTO);

            if($result)
            {  
               return true;

            }
            else
            {

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
    public function checkAuthor(loginuserDTO $accountsDTO):bool
    {
       
            $sql = "select us.name ,us.user_id,us.password from users as us join user_role as ur
                    on ur.user_id = us.user_id where us.email = :email and ur.roleid = 1;";
            
            $result = $this->checkUserRole($sql,$accountsDTO);
            
            if($result)
            {  
                  
                   return true;
            }
            else
            {
                return false;
            }
    
    }
    private function checkUserRole(string $sql,loginuserDTO $dto):bool
    {
        try
        {       
           $stm = $this->conn->prepare($sql);
           $email = $dto->getEmail();

           $stm->bindParam("email",$email);
           $stm->execute();
           if($stm->rowCount()==2)
           {
               $details = $stm->fetchAll(\PDO::FETCH_ASSOC);
               $dto->setId($details[0]['user_id']);
               $dto->setName($details[0]['name']);
               $this->passwordFromDB = $details[0]['password'];
               $value=$this->verifyPassword($dto->getPassword())?true:false;
               return $value;    
           }
           else if($stm->rowCount()==1)
           {
               
               $details = $stm->fetchAll(\PDO::FETCH_ASSOC);
               $dto->setId($details[0]['user_id']);
               $dto->setName($details[0]['name']);
               $this->passwordFromDB = $details[0]['password'];
               $value=$this->verifyPassword($dto->getPassword())?true:false;
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
        }    
    }
    
    public function verifyPassword(string $password):bool
    {
          if(password_verify($password,$this->passwordFromDB))
          {
            return true;
          }
          else
          {
            
            return false;
          }
    }
    
}