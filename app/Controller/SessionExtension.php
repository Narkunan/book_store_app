<?php
namespace App\Controller;
use Twig\Extension\AbstractExtension;
use twig\TwigFunction;
class SessionExtension extends AbstractExtension
{
    private $session;
    public function __construct($session)
    {
        $this->session = $session;
    }
    public function getFunctions()
    {
        return [
            new TwigFunction('getSession',[$this,'getSession']),
        ];
    }
    public function getSession($key)
    {
        return $this->session->get($key);
    }
}