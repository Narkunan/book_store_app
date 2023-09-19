<?php

namespace App\Model\accounts;
use App\Model\accounts\abstarctModel;
use App\Model\accounts\AccountInterface;
/**
 * forgetmodel class is reponsible for using getters and setters
 *  
 */
class ForgetModel extends abstarctModel implements AccountInterface
{
    /**
     * checkforaccountexsits for given user.
     *
     * @return boolean
     */
    public function checkAccountExsits():bool
    {
        try
        {
            $reult=$this->conn->prepare("SELECT * FROM users where email= :email");
            $reult->bindParam("email",$this->email);
            $reult->execute();

            if($reult->rowCount()>0)
            {
                $storedata=$reult->fetchColumn(3);
                $this->setPassword($storedata);
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
     * forgetpasword() will checkaccountexsits 
     * 
     * return true if account exsits
     * 
     * return false if account not exsits.
     *
     * @return boolean
     */
    public function forgetPassword():bool
    {
       
        if($this->checkAccountExsits())
        {
           
            return true;
        }
        else
        {
            
            return false;
        }
        
    }

}

