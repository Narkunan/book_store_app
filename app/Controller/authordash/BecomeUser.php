<?php
namespace App\Controller\authordash;
use App\Model\authordash\BecomeUserModel;
use App\Model\authordash\AuthordashDTO;
//use App\View\authordash\AuthorDashView;
use App\Controller\authordash\AuthorDashBase;
use App\View\ViewDTO;
/**
 * BecomeUser class is responsible will author
 * 
 * the user privilleges that means they can bought book. 
 * 
 */
class BecomeUser extends AuthorDashBase
{
    private BecomeUserModel $model;
    private  AuthordashDTO $dto;
    //private AuthorDashView $view;
    public function __construct(BecomeUserModel $model)
    {
        $this->model = $model;

    }
    /**
     * BecomeUserController method will take 
     * 
     * care of making Author as User
     * 
     * @access public
     *
     * @return void
     */
    public function becomeUserController():ViewDTO
    {
        $this->dto->setAuthorId($_SESSION['Userid']);
        $returnValue=$this->model->updateRole($this->dto);
        if($returnValue)
        {
           $this->msg="You Are now Become the User";
           //$this->displayMesage();
           $data = [
            "data"=>$this->msg
           ];
           return new ViewDTO(
             "app/view/authordash","AuthorMessage.html.twig",$data
           );
        }
        else
        {
            $this->msg="something happened";
            $data=[
                "data"=>$this->msg
            ];
            return new ViewDTO
            (
                "app/view/authordash","AuthorMessage.html.twig",$data
            );

        }
         //echo "<h1 style='font-size:50px;'> from beome user controller</h1>";
    }
    protected function displayMesage():void
    {
        //$this->view->displayAuthorMessage($this->msg);
    }
}
