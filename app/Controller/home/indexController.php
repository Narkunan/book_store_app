<?php
namespace App\Controller\home;
require "../../../vendor/autoload.php";
use App\Model\Home\HomeModel;
use App\Controller\home\HomeBaseClass;
/**
 * indexController is for Display book in home page.
 */

class indexController extends HomeBaseClass
{
    
    /**
     * By using bookid display all details of book.
     *
     * @return void
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
