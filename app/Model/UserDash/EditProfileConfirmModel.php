<?php
namespace App\Model\UserDash;
use App\Model\UserDash\UserDashModelBase;
class EditProfileConfirmModel extends UserDashModelBase
{

    private string $password;
    private string $name;
    private string $email;

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */ 
    
    public function updateUserProfile():bool
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
}