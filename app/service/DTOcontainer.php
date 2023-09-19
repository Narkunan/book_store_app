<?php
namespace App\service;
use App\Model\accounts\AccountsDTO;
use App\Model\authordash\AuthordashDTO;
use App\Model\Home\HomeDTO;
use App\Model\orders\checkOutDTO;
use App\Model\UserDash\UserDashDTO;

class DTOcontainer
{
     public AccountsDTO $AccountsDTO;
     public AuthordashDTO $AuthordashDTO;
     public HomeDTO $HomeDTO;
     public  checkOutDTO $ordersDTO;
     public UserDashDTO $UserDashDTO;
     public function get(string $name):mixed
     {
        if($name === "accounts")
        {
            $this->AccountsDTO = new AccountsDTO();
            return $this->AccountsDTO;
        }
        else if($name === "author")
        {
          $this->AuthordashDTO = new AuthordashDTO();
          return $this->AuthordashDTO;
        }
        else if($name === "home")
        {
          $this->HomeDTO = new HomeDTO();
          return $this->HomeDTO;
        }
        else if($name === "order")
        {
          $this->ordersDTO = new checkOutDTO();
          return $this->ordersDTO;
        }
        else if($name === "user")
        {
         
          $this->UserDashDTO = new UserDashDTO();
          return $this->UserDashDTO;
        }
        else
        {
            return null;
        }
     }
}