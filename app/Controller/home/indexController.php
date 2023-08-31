<?php
namespace App\Controller\home;
require "../../../vendor/autoload.php";
use App\Model\Home\HomeModel;
use App\Controller\home\HomeBaseClass;
/**
 * indexController is for Display Selected book in home page.
 */

class indexController extends HomeBaseClass
{
    
    /**
     * By using bookid display details of book.
     *
     * 
     * @access public
     * 
     * @return void
     * 
     */
    public function findBook():void
    {
       $this->model->setBookId($_GET["id"]);
       if($this->model->fetchBook())
       {
         
          $this->books=$this->model->getFetchBook();
          $this->view->displaySelectedBook($this->books,$this->loggedUser,$this->name);
       }
       
    }
}
$homemodel=new HomeModel();
$indexController=new indexController($homemodel);
$indexController->findBook();
