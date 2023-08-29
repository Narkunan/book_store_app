<?php
namespace   App\Controller\authordash;
use SebastianBergmann\Type\VoidType;
require "../../../vendor/autoload.php";
session_start();
use App\Model\authordash\EditBookModel;
use App\Controller\authordash\AuthorDashBase;
class EditBook extends AuthorDashBase implements AuthorDashInterface
{
   
   public function editBookManager()
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
   public function displayData():void
   {
      $book=$this->model->getFetchBook();
      $this->loggedUser = $_SESSION['loggedUser']??"no";
      $this->name =$_SESSION['UserName']??"no";
      $this->view->displayEditBookView($book,$this->loggedUser,$this->name);
   }
}
$editBookModel=new EditBookModel();
$EditBook=new EditBook($editBookModel);
$EditBook->editBookManager();