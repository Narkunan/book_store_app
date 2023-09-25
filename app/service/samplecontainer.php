<?php
namespace App\service;
use App\Controller\accounts\RegisterUser;
use App\Model\accounts\AccountsDTO;
use App\Model\accounts\RegisterModel;
class samplecontainer
{
    public $user;
    public function getRegisterUser()
    {
        $registermodel = new RegisterModel();
        $accountdto = new AccountsDTO();
        if($this->user === null)
        {
            $this->user = new RegisterUser($registermodel);
            return $this->user;
        }
        else
        {
            return $this->user;
        }
    }
}