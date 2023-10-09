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
    private BecomeAuthorModel $model;
    public function __construct(BecomeAuthorModel $model)
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
            $this->data=[
                 "data"=>"You are Now Become Author"
            ];
            return $this->displayMessage();
        }
        else
        {
            $this->data=[
                "data"=>"some error occured"
            ];
            return $this->displayMessage();
        }

    }
}
