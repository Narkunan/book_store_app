<?php
namespace App\Controller\authordash;
/**
 * AuthorDashBase contains all commonly
 * 
 * used variables
 * 
 *  and function.
 */
abstract class AuthorDashBase
{
    protected string $msg;
    abstract protected function displayMesage():void;
}