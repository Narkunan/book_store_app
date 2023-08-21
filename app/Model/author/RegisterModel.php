<?php
namespace App\Model\author;

require_once "../../../vendor/autoload.php";

use App\Model\author\abstarctModel;
class RegisterModel extends abstarctModel
{
    private $name;   
    /**
     * Get the value of name
     * 
     * @return string
     */ 
    public function getName()
    {
        return $this->name;
    }
    /**
     * Set the value of name.
     *
     * @param string $name
     * 
     * @return void
     */ 
    public function setName($name)
    {
        $this->name = $name;
    }
    
    /**
     * checkforaccountexsits for given user.
     *
     * @return boolean
     */
    public function checkAccountExsits():bool
    {
        $reult=$this->conn->prepare("SELECT * FROM author where email= :email;");
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
        
        if($this->checkAccountExsits())
        {

             $sql="INSERT INTO author (Author_name,email,password) values (:name,:email,:password);";
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
        else 
        {
            echo "account already exists";
            return false;
        }

    }
}