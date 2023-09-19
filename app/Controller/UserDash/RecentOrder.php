<?php
namespace App\Controller\UserDash;
use App\Model\UserDash\RecentOrderModel;
use App\Controller\UserDash\UserDashBase;
/**
 * RecentOrder will display Orders recently Placed 
 * 
 * by user.
 */
class RecentOrder extends UserDashBase
{
  /**
   * executeAction(= function will fetchRecentOrder by 
   * 
   * user Id
   * 
   * @access public
   *
   * @return void
   */
  public function executeAction(array $value):void
  {
     
     $this->userdashDTO->setUserid($_SESSION['Userid']);
     $returnValue=$this->model->fetchRecentOrder($this->userdashDTO);
     
     if($returnValue)
     {
        $orders=$this->userdashDTO->getOrders();
        
        $this->view->recentOrders($orders,$this->loggeduser,$this->name);
     }
   else
     {
         $this->msg =" no orders were found";
         $this->view->userMessage($this->msg,$this->loggeduser,$this->name);
        
     }
  }
}
