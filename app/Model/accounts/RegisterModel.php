<?php
namespace App\Model\accounts;
use App\Model\accounts\abstarctModel;

/**
 * RegisterModel is responsible for register User
 */
class RegisterModel extends abstarctModel 
{   
    
    /**
     * registerUser will registerUser
     * 
     * based on the return value from 
     * 
     * checkaccountexists if account already found 
     * 
     * it will return false 
     * 
     * else will return true
     *
     * @access public
     * 
     * @return bool
     */
    public function registerAuthor(AccountsDTO $accountsDTO):bool
    {
         $account = $this->checkAccountExsits($accountsDTO);
        if($account)
        {   
             $createUser = $this->createUser($accountsDTO);

             if($createUser)
             {
                
               $updateRole = $this->updateRole($accountsDTO);

               if($updateRole)
               {  
                  
                  return true;
               }
               else
               {
                 return false;
               }
             }
             else
             {
                return false;
             }
             
        }
        else 
        {
            
            return false;
        }

    }
    /**
     * create User will create Acoount for user
     *
     * @return boolean
     */
    public function createUser(AccountsDTO $accountsDTO):bool
    {

        $sql="INSERT INTO USERS(email,name,password,security_question) values (:email,:name,:password,:Question);";
        $password = password_hash($accountsDTO->getPassword(),PASSWORD_ARGON2I);
        $args=[
            "email"=>$accountsDTO->getEmail(),
            "name"=>$accountsDTO->getName(),
            "password"=>$password,
            "Question"=>$accountsDTO->getSecurityQuestion()
        ];
        $reult = $this->save($sql,$args);
        
       if($reult)
       {
         return true;
       }
       else 
       {
            return false;
       }
    }
    public function updateRole(AccountsDTO $accountsDTO):bool
    {
       
        $sql="INSERT INTO user_role (user_id,roleid) VALUES ((SELECT user_id FROM users Where email=:email),:roleid)";
        $args = [
            "email"=>$accountsDTO->getEmail(),
            "roleid"=>$accountsDTO->getRole()
        ];
        $result = $this->save($sql,$args);
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