<?php
namespace App\Model\accounts;
class AccountsDTO
{
    private string $email;
    private string $password;
    private string $name;
    private string $securityQuestion;
    private int $role;

    public function __construct(string $email,string $password,string $securityquestion)
    {
           $this->email = $email;
           $this->password = $password;
           $this->securityQuestion = $securityquestion;
    }

     /**
     * Get the value of email.
     * 
     * @return string
     */ 
    public function getEmail():string
    {
        return $this->email;
    }

    /**
     * get value of password
     *
     * @return string
     * 
     * 
     */
    public function getPassword():string 
    {
        return $this->password;
    }

    public function getName():string
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
    public function setName(string $name):void
    {
        $this->name = $name;
    }

    /**
     * Get the value of securityQuestion
     */ 
    public function getSecurityQuestion()
    {
        return $this->securityQuestion;
    }
    public static function fromMethod(array $data)
    {
        return new self(
          $data["email"],
          $data["password"],
          $data["'securityquestion'"]
        );
    }

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }
}