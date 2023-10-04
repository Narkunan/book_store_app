<?php
namespace App\Controller;
use Twig\Extension\AbstractExtension;
use twig\TwigFunction;
class SessionExtension extends AbstractExtension
{
    public function getFunctions()
    {
        
        return [
            new TwigFunction('getSession',[$this,'getSession']),
        ];
    }
    public function getSession($key)
    {
        return $_SESSION[$key]??"login";
    }
}