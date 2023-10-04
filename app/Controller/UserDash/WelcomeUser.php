<?php
namespace App\Controller\UserDash;

use App\View\ViewDTO;

class WelcomeUser
{
    public function welcomeUserController(array $value):ViewDTO
    {
        $data=[];
        echo" from user controller";
        return new ViewDTO(
            "app/view/userdash","Userwelcome.html.twig",$data
        );
    }
}