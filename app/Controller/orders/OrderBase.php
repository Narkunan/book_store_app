<?php
namespace App\Controller\orders;
use App\Model\orders\checkOutDTO;
use App\View\orders\OrderView;
use App\View\Home\HomeView;
abstract class OrderBase
{
    protected checkOutDTO $checkOutDTO;
    protected $model;
    protected OrderView $orderview;
    protected string $msg;
    protected string $loggeduser;
    protected string $name;
    protected HomeView $homeview;
    public function __construct($model,$checkOutDTO)
    {
        $this->orderview = new OrderView();
        $this->homeview = new HomeView();
        $this->model = $model;
        $this->checkOutDTO =$checkOutDTO;
        $this->loggeduser = $_SESSION['loggedUser'];
        $this->name = $_SESSION['UserName'];
    }
}