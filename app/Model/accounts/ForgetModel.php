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
        $stm = $this->conn->prepare($sql);
        $email = $accountsDTO->getEmail();
        $sq = $accountsDTO->getSecurityQuestion();
        $stm->bindParam("email",$email);
        $stm->bindParam("security",$sq);
        $stm->execute();
        if($stm->rowCount()>0)
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
            $stm = $this->conn->prepare($sql);
            $password = password_hash($accountsDTO->getPassword(),PASSWORD_ARGON2I); 
            $stm->bindParam("password",$password);
            $email = $accountsDTO->getEmail();
            $stm->bindParam("email",$email);
            $stm->execute();

            if($stm)
            {
               
                return true;
            }
            else
            {
                return false;
            }
       
    }
    
}

