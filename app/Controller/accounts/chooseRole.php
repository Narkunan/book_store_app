<?php
namespace App\Controller\accounts;
use App\View\ViewDTO;
class ChooseRole
{
    public function chooseRoleController(array $value):ViewDTO
    {
        $data=[
            "msg"=>"please choose role"
        ];
        return new ViewDTO("app/View/accounts","chooseRole.html.twig",$data
               
        );
    }
}