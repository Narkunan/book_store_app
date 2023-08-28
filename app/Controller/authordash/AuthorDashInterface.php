<?php
namespace App\Controller\authordash;

interface AuthorDashInterface
{
    public function bookFound():void;
    public function bookNotFound():void;
}