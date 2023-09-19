<?php
namespace App\Controller\UserDash;
require "../../../vendor/autoload.php";
use App\Model\UserDash\RecentOrderModel;
use App\Controller\UserDash\UserDashBase;
session_start();

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
  public function executeAction():void
  {
     
     $this->model->setUserid($_SESSION['Userid']);
     $returnValue=$this->model->fetchRecentOrder();
     
     if($returnValue)
     {
        $orders=$this->model->getOrders();
        
        $this->view->recentOrders($orders,$this->loggeduser,$this->name);
     }
   else
     {
         $this->msg =" no orders were found";
         $this->view->userMessage($this->msg,$this->loggeduser,$this->name);
        
     }
  }
}
$recentorderModel= new RecentOrderModel();
$recentorder= new RecentOrder($recentorderModel);
$recentorder->executeAction();