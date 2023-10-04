<?php
namespace App\Model\accounts;
class loginuserDTO
{
      private string $name;
      private string $email;
      private string $password;
      private int $id;

      public function __construct( string $email, string $password)
      {
        $this->email = $email;
        $this->password = $password;
      }
      public static function fromArray(array $value):self{
          return new self(
             $value["email"]??" ",
             $value["password"]??" "
          );
      }
      

      /**
       * Get the value of name
       */ 
      public function getName()
      {
            return $this->name;
      }

      /**
       * Set the value of name
       *
       * @return  self
       */ 
      public function setName(string $name)
      {
            $this->name = $name;

            return $this;
      }

      /**
       * Get the value of id
       */ 
      public function getId()
      {
            return $this->id;
      }

      /**
       * Set the value of id
       *
       * @return  self
       */ 
      public function setId(int $id)
      {
            $this->id = $id;

            return $this;
      }

      /**
       * Get the value of email
       */ 
      public function getEmail()
      {
            return $this->email;
      }

      /**
       * Get the value of password
       */ 
      public function getPassword()
      {
            return $this->password;
      }
}