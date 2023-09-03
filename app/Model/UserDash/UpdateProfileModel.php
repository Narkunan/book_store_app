<?php
namespace App\Model\UserDash;
use App\Model\UserDash\UserDashModelBase;
/**
 * EditProfileModel function will
 * 
 * update user data in user table.
 */
class UpdateProfileModel extends UserDashModelBase
{

    private string $password;
    private string $name;
    private string $email;

    /**
     * Set the value of password
     *
     * @param string $password
     * 
     * @return  self
     */ 
    public function setPassword(string $password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Set the value of name
     * 
     * @param string $name
     *
     * @return  self
     */ 
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set the value of email
     *
     * @param string $email
     * @return  self
     */ 
    public function setEmail(string $email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * upadteuserprofile will update user profile .
     *
     * @return  bool
     */ 
    
    public function updateUserProfile():bool
    {
        try
        {
             $sql="UPDATE USERs SET name=:username,email=:email,password=:password where user_id=:userid;";
             $stm=$this->conn->prepare($sql);
             $stm->bindParam("username",$this->name);
             $stm->bindParam("userid",$this->userid);
             $stm->bindParam("email",$this->email);
             $stm->bindParam("password",$this->password);
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
      catch(\PDOException $e)
      {
            echo $e->getMessage();
            return false;
      }
    }
}