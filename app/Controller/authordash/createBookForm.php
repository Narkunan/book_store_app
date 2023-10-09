<?php

namespace App\Controller\authordash;
use App\View\ViewDTO;

class CreateBookForm
{
    public function createBookFormController(array $value)
    {
        $data =[];
        return new ViewDTO(
            "app/view/authordash","PublishPlatform.html.twig",$data
        );
    }
}