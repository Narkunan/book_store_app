<?php
namespace App\Controller\authordash;
require "../../../vendor/autoload.php";
use App\View\authordash\DisplayMessageAuthor;

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
        $name = $_SESSION['UserName'];
        $loggedUser = $_SESSION['loggedUser'];
    }
    public function displayMessages():void
    {
        $this->view->displayAuthorMessage($this->msg,$this->loggedUser,$this->name);
    }
}