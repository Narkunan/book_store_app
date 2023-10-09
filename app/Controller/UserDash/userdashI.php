<?php
namespace App\Controller\UserDash;

use App\View\ViewDTO;

interface UserdashI{
    public function displayData():ViewDTO;
}