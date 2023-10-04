<?php
namespace App\Controller\UserDash;
use App\Model\UserDash\UserDashDTO;
use App\View\Userdash\DisplayMessage;
use App\View\Userdash\UserDashView;

/**
 * UserDashBase class will have Common Variables
 * 
 * and  function.
 */
abstract class UserDashBase
{
    //protected $model ;
    protected $view  ;
    protected $name;
    protected $loggeduser;
    protected $msg;
    protected UserDashDTO $userdashDTO;

    public function __construct(/***$model ,$userdashDTO*/)
    {
        /**$this->model = $model;
        $this->userdashDTO = $userdashDTO;
        $this->view = new UserDashView(); 
        $this->name = $_SESSION['UserName'];
        $this->loggeduser = $_SESSION['loggedUser'];**/
    }
    //abstract public function executeAction(array $value):void;
}