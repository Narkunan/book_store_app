<?php
namespace App\Controller\accounts;
use App\View\ViewDTO;
class Loginform
{
    public function loginFormController(array $value):ViewDTO
    {
               $data=[];
               return new ViewDTO(
                "app/view/accounts","login.html.twig",$data
               );
    }
}