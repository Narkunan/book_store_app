<?php
namespace App\Controller\authordash;
require "../../../vendor/autoload.php";
use App\View\authordash\DisplayMessageAuthor;
/**
 * AuthorDashBase contains all commonly
 * 
 * used variables
 * 
 *  and function.
 */
abstract class AuthorDashBase
{
    protected $model;
    protected DisplayMessageAuthor $view;
    protected string $loggedUser ;
    protected string $name;
    protected string $msg;

    public function __construct($model)
    {
        $this->model = $model;
        $this->view =new DisplayMessageAuthor();
        $this->name = $_SESSION['UserName'];
        $this->loggedUser = $_SESSION['loggedUser'];
    }
    public function displayMessages():void
    {
        $this->view->displayAuthorMessage($this->msg,$this->loggedUser,$this->name);
    }
}