<?php
namespace App\Model\accounts;
class AccountsDTO
{
    private string $email;
    private string $password;
    private string $name;
    private string $securityQuestion;
    private int $id;
    private string $passwordFromDB;
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
     * Set the value of email.
     * 
     * @param string $email
     * 
     *@return void
     */ 
    public function setEmail(string $email):void
    {
        $this->email = $email;    
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

    /**
     * Set the value of password.
     *
     * @param string $password
     * 
     * @return void
     */ 
    public function setPassword(string $password):void
    {
        $this->password = $password;
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
     * Set the value of securityQuestion
     *
     * @return  self
     */ 
    public function setSecurityQuestion($securityQuestion)
    {
        $this->securityQuestion = $securityQuestion;

        return $this;
    }
    /**
     * Get the value of id
     * 
     * @return string
     */ 
    public function getId():string
    {
        return $this->id;
    }

    /**
     * Set the value of id
     * 
     * @param int $id
     *
     * @return  void
     */ 
    public function setId(int $id):void
    {
        $this->id = $id;
    }
    

    /**
     * Get the value of securityQuestion
     */ 
    public function getSecurityQuestion()
    {
        return $this->securityQuestion;
    }
}