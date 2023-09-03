<?php
namespace   App\Controller\authordash;
require "../../../vendor/autoload.php";
session_start();
use App\Model\authordash\ListBookModel;
use App\Controller\authordash\AuthorDashBase;

/**
 * EditBook will displayBooks Available to delete.
 * 
 */
class EditBook extends AuthorDashBase implements AuthorDashInterface
{
   
   /**
    * EditBookManager is responsible for 
    * 
    * display book available to edit 
    *
    * author have not published any Book 
    *
    * display Message to the author that
    *
    * You Havenot Published yet
    *
    * @access public
    *
    * @return void
    */
   public function editBookManager():void
   {
      $this->model->setAuthorid($_SESSION['Userid']);
      $bookFound=$this->model->fetchBooksByAuthorId();
      if($bookFound)
      {
         $this->displayData();  
     }
     else
     {
         $this->msg="You have not published yet";
         $this->loggedUser=$_SESSION['loggedUser'];
         $this->name =$_SESSION['UserName'];
         $this->view->displayAuthorMessage($this->msg,$this->loggedUser,$this->name);
     }
   }
   /**
    * displayData Function will Display 
    *
    * available to Delete
    * 
    * @access public
    *
    * @return void
    */
   public function displayData():void
   {
      $book=$this->model->getBook();
      $this->loggedUser = $_SESSION['loggedUser']??"no";
      $this->name =$_SESSION['UserName']??"no";
      $this->view->displayEditBookView($book,$this->loggedUser,$this->name);
   }
}
$editBookModel=new ListBookModel();
$EditBook=new EditBook($editBookModel);
$EditBook->editBookManager();