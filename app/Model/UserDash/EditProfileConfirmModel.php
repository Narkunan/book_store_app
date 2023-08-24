<?php
namespace App\Model\UserDash;
use App\model\Connection;
class EditProfileConfirmModel
{
    use Connection;
    private \PDO $conn;

    private int $userid;
    private string $password;
    private string $name;
    private string $email;
    private string $address;

   public function __construct()
   {
      $this->conn=$this->getConnection();
   }

    /**
     * Set the value of userid
     *
     * @return  self
     */ 
    public function setUserid($userid)
    {
        $this->userid = $userid;

        return $this;
    }

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
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }
    public function updateUserProfile():bool
    {
        $sql="UPDATE USER SET user_name=:username,email=:email,password=:password,address=:address where id=:userid;";
        $stm=$this->conn->prepare($sql);
        $stm->bindParam("username",$this->name);
        $stm->bindParam("userid",$this->userid);
        $stm->bindParam("address",$this->address);
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