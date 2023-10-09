<?php
namespace App\Controller\home;

use App\View\ViewDTO;

/**
 * HomeBase will Have Common method to be implement on the
 *  
 * every class
 */
abstract class HomeBase
{
     protected array $data;
     protected function bookNotFound():ViewDTO{
        return new ViewDTO(
            "app/view/home","HomeDisplayMessage.html.twig",$this->data
         );

     }
   
}