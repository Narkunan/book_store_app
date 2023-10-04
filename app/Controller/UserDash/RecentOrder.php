<?php
namespace App\Controller\UserDash;
use App\Model\UserDash\RecentOrderModel;
use App\Controller\UserDash\UserDashBase;
use App\Model\UserDash\UserDashDTO;
use App\View\ViewDTO;
/**
 * RecentOrder will display Orders recently Placed 
 * 
 * by user.
 */
class RecentOrder extends UserDashBase
{

   private $model;
   public function __construct($model)
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
        $data=[
          "data"=>$userdashDTO->getOrders()
     ];
        return new ViewDTO(
          "app/view/UserDash",'RecentOrderView.html.twig',$data
        );
        //$this->view->recentOrders($orders,$this->loggeduser,$this->name);
     }
   else
     {
         $this->msg =" no orders were found";
           $data =[
              "msg"=>$this->msg
           ];

          return new ViewDTO(
            "app/view/UserDash","UserMessage.html.twig",$data
          );
         //$this->view->userMessage($this->msg,$this->loggeduser,$this->name);
        
     }
  }
}
