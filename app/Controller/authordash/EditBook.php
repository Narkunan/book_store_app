<?php
namespace   App\Controller\authordash;
require "../../../vendor/autoload.php";
session_start();
use App\Model\authordash\EditBookModel;
use App\Controller\authordash\AuthorDashBase;
class EditBook extends AuthorDashBase
{
   
   public function editBookManager()
   {
      $this->model->setAuthorid(/**$_SESSION['Userid']**/1);
      $bookFound=$this->model->fetchBooksByAuthorId();
      if($bookFound)
      {

         $book=$this->model->getFetchBook();
         $loggedUser = $_SESSION['loggedUser']??"no";
         $name =$_SESSION['UserName']??"no";
         $this->view->displayEditBookView($book,$loggedUser,$name);

     }
     else
     {
         $msg="You have not published yet";
         $loggedUser=$_SESSION['loggedUser'];
         $name =$_SESSION['UserName'];
         $this->view->displayAuthorMessage($msg,$loggedUser,$name);
     }
   }
}
$editBookModel=new EditBookModel();
$EditBook=new EditBook($editBookModel);
$EditBook->editBookManager();