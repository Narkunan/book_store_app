<?php
namespace App\Model\accounts;
use App\Model\accounts\abstarctModel;

/**
 * forgetmodel class is reponsible for using getters and setters
 *  
 */
class ForgetModel extends abstarctModel 
{

    /**
     * forgetpasword() will checkaccountexsits 
     * 
     * return true if account exsits
     * 
     * return false if account not exsits.
     *
     * @return boolean
     */
    public function checkSecurityQuestion(AccountsDTO $accountsDTO):bool
    {
      
        $sql = "SELECT name from users where email = :email and security_question = :security";
        $args=[
            "email"=>$accountsDTO->getEmail(),
            "security"=>$accountsDTO->getSecurityQuestion()
        ];
        $result = $this->checkExsits($sql,$args);
        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
        
    }
    public function updatePassword(AccountsDTO $accountsDTO):bool
    {

            $sql = "UPDATE users set password = :password where email =:email";
            $password = password_hash($accountsDTO->getPassword(),PASSWORD_ARGON2I); 
            $args=[
                "password"=>$password,
                 "email"=>$accountsDTO->getEmail()
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

