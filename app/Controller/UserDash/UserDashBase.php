<?php
namespace App\Controller\UserDash;
use App\View\ViewDTO;

/**
 * UserDashBase class will have Common Variables
 * 
 * and  function.
 */
abstract class UserDashBase
{
    protected array $data; 

    protected function displayMessage():ViewDTO
    {
        return new ViewDTO(
            "app/view/UserDash","UserMessage.html.twig",$this->data
        );
    }
}
