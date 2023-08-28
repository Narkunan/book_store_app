<?php
namespace App\Controller\home;

interface HomeBase
{
    public function bookFound():void;
    public function bookNotFound():void;
   
}