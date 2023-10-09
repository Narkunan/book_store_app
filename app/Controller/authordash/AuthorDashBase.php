<?php
namespace App\Controller\authordash;
use App\View\ViewDTO;

/**
 * AuthorDashBase contains all commonly
 * 
 * used variables
 * 
 *  and function.
 */
abstract class AuthorDashBase
{
    protected array $data;
    protected function displayMesage():ViewDTO{
    
        return new ViewDTO(
            "app/view/authordash","Authormessage.html.twig",$this->data
         ); 
    }

}