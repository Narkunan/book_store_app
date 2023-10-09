<?php
namespace App\Controller\authordash;
use App\Model\authordash\BecomeUserModel;
use App\Model\authordash\AuthordashDTO;
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
    public function becomeUserController(array $value):ViewDTO
    {
        $dto = new AuthordashDTO();
        $dto->setAuthorId($_SESSION['Userid']);
        $returnValue=$this->model->updateRole($dto);
        if($returnValue)
        {
           $this->data = [
            "data"=>"You Are now Become the User"
           ];
           return $this->displayMesage();
        }
        else
        {
            $this->data=[
                "data"=>"something happened"
            ];
            return $this->displayMesage();
        }
        
    }
   
}
