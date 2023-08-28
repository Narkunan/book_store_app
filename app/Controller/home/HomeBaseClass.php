<?php
namespace App\Controller\home;
use App\Model\Home\category;
use App\View\home\displayHome;
use App\Controller\home\HomeBase;
session_start();
abstract class HomeBaseClass implements HomeBase
{
   protected $model;
   protected $view;
   protected $msg;
   protected string $loggedUser;
   protected string $name; 
   protected array $categorys;
   protected array $books;

   public function __construct($model)
   {
      $this->model = $model;
      $this->view = new displayHome();
      $this->loggedUser = $_SESSION["loggedUser"]??"login please";
      $this->name = $_SESSION["UserName"]??"login please";
      $category = new category();
      $this->categorys = $category->category();
   }
   public function bookFound():void
   {
     $this->view->displayBook($this->loggedUser,$this->name,$this->categorys,$this->books); 
   }
   public function bookNotFound():Void
   {
    $this->view->displayMessage($this->msg,$this->loggedUser,$this->name,$this->categorys);
   }
   abstract public function findBook():void;
}