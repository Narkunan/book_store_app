<?php
namespace App\Controller\accounts;

use App\View\ViewDTO;


class Forgetform
{
    public function forgetFormController(array $value):ViewDTO
    {
         $data=[];
         return new ViewDTO(
            "app/view/accounts","forget.html.twig",$data
        );
    }
}