<?php
namespace App\Controller\home;
use App\Model\Home\category;
use App\View\home\displayHome;
use App\Controller\home\HomeBase;
session_start();
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
   abstract public function findBook():void;
}