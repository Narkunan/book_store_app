<?php
namespace App\Controller\home;
use App\Model\Home\HomeDTO;
use App\Model\Home\category;
use App\Controller\home\HomeBase;
use App\View\home\HomeView;

/**
 * HomeBaseClass will have commonly used
 * 
 * Variable and function.
 * 
 */
abstract class HomeBaseClass implements HomeBase
{
   protected $model;
   protected $view;
   protected string $msg;
   protected string $loggedUser;
   protected string $name; 
   protected array $categorys;
   protected array $books;
   protected HomeDTO $homeDTO;

   public function __construct($model,HomeDTO $homeDTO)
   {
      $this->model = $model;
      $this->view = new HomeView();
      $this->loggedUser = $_SESSION["loggedUser"]??"login please";
      $this->name = $_SESSION["UserName"]??"login please";
      $category = new category();
      $this->categorys = $category->category();
      $this->homeDTO = $homeDTO;
   }
   /**
    * Bookfound function is responsible for 
    * 
    * display founded Book.
    *
    * @access public 
    *
    * @return void
    */
   public function bookFound():void
   {
     $this->view->displayBook($this->loggedUser,$this->name,$this->categorys,$this->books); 
   }

   /**
    * booknotfound is responsible 
    * 
    * For display When Book is not available.
    *
    * @access public
    *
    * @return void
    */
   public function bookNotFound():Void
   {
    $this->view->displayMessage($this->msg,$this->loggedUser,$this->name,$this->categorys);
   }
   /**
    * findBook is a common method to be implemented in
    * 
    * each class
    *
    * @access public
    *
    * @return void
    */
   abstract public function findBook(array $value):void;
}