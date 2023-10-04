<?php
namespace App\Controller\accounts;
use App\View\ViewDTO;
class Registerform
{
    public function registerFormController(array $value):ViewDTO
    {
             $data = [];

             return new ViewDTO(
                "app/view/accounts","register.html.twig",$data
             );
    }
}