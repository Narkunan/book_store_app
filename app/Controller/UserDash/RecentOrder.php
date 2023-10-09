<?php
namespace App\Controller\UserDash;
use App\Model\UserDash\RecentOrderModel;
use App\Controller\UserDash\UserDashBase;
use App\Model\UserDash\UserDashDTO;
use App\View\ViewDTO;
use App\Controller\UserDash\UserdashI;
/**
 * RecentOrder will display Orders recently Placed 
 * 
 * by user.
 */
class RecentOrder extends UserDashBase implements UserdashI
{

   private RecentOrderModel $model;
   public function __construct(RecentOrderModel $model)
   {
     $this->model = $model;
   }
  /**
   * executeAction(= function will fetchRecentOrder by 
   * 
   * user Id
   * 
   * @access public
   *
   * @return void
   */
  public function executeAction(array $value):ViewDTO
  {
     $userdashDTO = new UserDashDTO();
     $userdashDTO->setUserid($_SESSION['Userid']);
     $returnValue=$this->model->fetchRecentOrder($userdashDTO);
     
     if($returnValue)
     {
        $this->data=[
          "data"=>$userdashDTO->getOrders()
     ];
        return $this->displayData();
        
     }
   else
     {
           $this->data =[
              "msg"=>" no orders were found"
           ];
          return $this->displayMessage();
  
     }
  }
  public function displayData():ViewDTO{
    return new ViewDTO(
      "app/view/UserDash",'RecentOrderView.html.twig',$this->data
    );
  }
}
