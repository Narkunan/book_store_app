<?php
namespace App\Controller\UserDash;
require "../../../vendor/autoload.php";
use App\Model\UserDash\RecentOrderModel;
use App\View\UserDash\RecentOrderView;
session_start();
class RecentOrder
{
  private RecentOrderModel $recentorderModel;
  private RecentOrderView $recentorderView;
  public function __construct($recentorderModel,$recentorderView)
  {
     $this->recentorderModel=$recentorderModel;
     $this->recentorderView=$recentorderView;
  }
  public function RecentOrder()
  {
     
     $this->recentorderModel->setUserid($_SESSION['userid']);
     $returnValue=$this->recentorderModel->fetchRecentOrder();
     if($returnValue)
     {
        $this->recentorderView->displayOrders($this->recentorderModel->getOrders());
     }
     else
     {
        echo "<h1 style='font-size:20px;text-align:center;'>no orders found :(</h1>";
     }
  }
}
$recentorderModel= new RecentOrderModel();
$recentorderView= new RecentOrderView();
$recentorder= new RecentOrder($recentorderModel,$recentorderView);
$recentorder->RecentOrder();