<?php
namespace App\Controller\UserDash;
use App\View\Userdash\DisplayMessage;
use App\View\Userdash\UserDashView;

/**
 * UserDashBase class will have Common Variables
 * 
 * and  function.
 */
abstract class UserDashBase
{
    protected $model ;
    protected $view  ;
    protected $name;
    protected $loggeduser;
    protected $msg;

    public function __construct($model)
    {
        $this->model = $model;
        $this->view = new UserDashView(); 
        $this->name = $_SESSION['UserName'];
        $this->loggeduser = $_SESSION['loggedUser'];
    }
    abstract public function executeAction():void;
}