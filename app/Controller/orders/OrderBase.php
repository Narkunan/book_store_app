<?php
namespace App\Controller\orders;
use App\View\orders\OrderView;
use App\View\Home\HomeView;
use App\View\ViewDTO;

abstract class OrderBase
{
     protected array $data;
     protected function displayMessage():ViewDTO{
        return new ViewDTO(
            "app/view/home","HomeDisplayMessage.html.twig",$this->data
        );
     }
}