<?php
namespace App\Controller\UserDash;
use App\Controller\UserDash\UserDashBase;
use App\Model\UserDash\BecomeAuthorModel;
use App\Model\UserDash\UserDashDTO;
use App\View\ViewDTO;
/**
 * BecomeAuthor will make 
 * 
 * user as Author.
 * 
 */
class BecomeAuthor extends UserDashBase
{
    private $model;
    public function __construct($model)
    {
        $this->model = $model;
    }
    /**
     * executeAction will assign user 
     * 
     * with author privilleges.
     * 
     * @access public
     *
     * @return void
     */
    public function executeAction($array):ViewDTO
    {
        $userdash = new UserDashDTO();
        $userdash->setUserId($_SESSION['Userid']);
        $returnValue=$this->model->updateRole($userdash);
        if($returnValue)
        {
            $msg="You are Now Become Author";
            //$this->view->userMessage($this->msg,$this->loggeduser,$this->name);
            $data=[
                 "data"=>$msg
            ];
            return new ViewDTO(
                "app/view/UserDash","UserMessage.html.twig",$data
            );
        }
        else
        {
            $msg="some error occured";
            $data=[
                "data"=>$msg
            ];
            return new ViewDTO(
                "app/view/UserDash","UserMessage.html.twig",$data
            );
        }

    }
}
