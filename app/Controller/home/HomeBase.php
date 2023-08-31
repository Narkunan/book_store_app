<?php
namespace App\Controller\home;

/**
 * HomeBase will Have Common method to be implement on the
 *  
 * every class
 */
interface HomeBase
{
    public function bookFound():void;
    public function bookNotFound():void;
   
}