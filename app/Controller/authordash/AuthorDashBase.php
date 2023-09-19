<?php
namespace App\Controller\authordash;
use App\Model\authordash\AuthordashDTO;
use App\View\authordash\AuthorDashView;
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
    protected AuthorDashView $view;
    protected string $loggedUser ;
    protected string $name;
    protected string $msg;
    protected AuthordashDTO $AuthorDashDTO;

    public function __construct($model,AuthordashDTO $AuthorDashDTO)
    {
        $this->model = $model;
        $this->view =new AuthorDashView();
        $this->name = $_SESSION['UserName'];
        $this->loggedUser = $_SESSION['loggedUser'];
        $this->AuthorDashDTO = $AuthorDashDTO;
    }
    public function displayMessages():void
    {
        $this->view->displayAuthorMessage($this->msg,$this->loggedUser,$this->name);
    }
}