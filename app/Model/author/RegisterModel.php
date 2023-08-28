<?php
namespace App\Model\author;

use App\Model\author\abstarctModel;
use App\Model\author\AccountInterface;
class RegisterModel extends abstarctModel implements AccountInterface
{
     
    private int $roleid;
    
    
    /**
     * checkforaccountexsits for given user.
     *
     * @return boolean
     */
    public function checkAccountExsits():bool
    {
        $reult=$this->conn->prepare("SELECT * FROM users where email= :email;");
        $reult->bindParam("email",$this->email);
        $reult->execute();

        if($reult->rowCount()>0)
        {
            echo "<center><h1>user already exists</h1></center>";
            return false;
        }
        else
        {
            return true;
        }
    }

    /**
     * registerAuthor will registerAuthor.
     *
     * @return bool
     */
    public function registerAuthor():bool
    {
         $account = $this->checkAccountExsits();
        if($account)
        {   
             $createUser = $this->createUser();

             if($createUser)
             {
               $updateRole = $this->updateRole();

               if($updateRole)
               {  
                  echo "role also updated";
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
            echo "account already exists";
            return false;
        }

    }

    /**
     * Set the value of roleid
     *
     * @return  self
     */ 
    public function setRoleid($roleid)
    {
        $this->roleid = $roleid;
        
        return $this;
    }
    public function createUser():bool
    {
        $sql="INSERT INTO users(name,email,password) values (:name,:email,:password);";
        $stn=$this->conn->prepare($sql);
        $stn->bindParam("name",$this->name);
        $stn->bindParam("email",$this->email);
        $stn->bindParam("password",$this->password);
        $stn->execute();
       if($stn)
       {
         return true;
       }
       else 
       {
            return false;
       }
    }
    public function updateRole():bool
    {
        $sql="INSERT INTO user_role (user_id,roleid) VALUES ((SELECT user_id FROM users Where email=:email),:roleid)";
        $stn = $this->conn->prepare($sql);
        $stn->bindParam("email",$this->email);
        $stn->bindParam("roleid",$this->roleid);
        $stn->execute();
        if($stn)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}