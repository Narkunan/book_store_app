<?php
namespace App\Controller\authordash;
require "../../../vendor/autoload.php";
use App\Model\authordash\DeleteBookModel;
use App\Controller\authordash\AuthorDashBase;
session_start();
class DeleteBook extends AuthorDashBase
{
      public function deleteBookController()
      {
          
          $this->model->setAuthorid($_SESSION['Userid']);
          $returnValue=$this->model->fetchBook();
          
          if($returnValue)
          {
            $books=$this->model->getFetchBook();
            $loggedUser = $_SESSION['loggedUser']??"no";
            $name =$_SESSION['UserName']??"no";
            $this->view->deleteBook($books,$loggedUser,$name);
          }
          else
          {
            $msg="You Have Not Published";
            $loggedUser=$_SESSION['loggedUser'];
            $name=$_SESSION['UserName'];
            $this->view->displayAuthorMessage($msg,$loggedUser,$name);
          }
      }
}
$deleteBookModel =new DeleteBookModel();
$deleteBook = new DeleteBook($deleteBookModel); 
$deleteBook->deleteBookController();