<?php

namespace App\Model\author;

require_once "../../../vendor/autoload.php";

use App\Model\author\abstarctModel;

/**
 * forgetmodel class is reponsible for using getters and setters
 *  
 */
class ForgetModel extends abstarctModel
{
    /**
     * checkforaccountexsits for given user.
     *
     * @return boolean
     */
    public function checkAccountExsits():bool
    {
        $reult=$this->conn->prepare("SELECT * FROM author where email= :email");
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

