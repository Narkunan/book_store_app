<?php
namespace App\Controller\home;
use App\View\ViewDTO;

/**
 * HomeBaseClass will have commonly used
 * 
 * Variable and function.
 * 
 */
interface HomeI
{
     public function bookFound():ViewDTO;             
}