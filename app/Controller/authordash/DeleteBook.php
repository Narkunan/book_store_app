<?php
namespace App\Controller\authordash;
require "../../../vendor/autoload.php";
use App\Model\authordash\DeleteBookModel;
use App\Controller\authordash\AuthorDashBase;
session_start();
class DeleteBook extends AuthorDashBase implements AuthorDashInterface
{
      public function deleteBookController()
      {
          
          $this->model->setAuthorid($_SESSION['Userid']);
          $returnValue=$this->model->fetchBook();
          
          if($returnValue)
          {
            $this->displayData();

          }
          else
          {
            $this->msg="You Have Not Published";
            $this->loggedUser=$_SESSION['loggedUser'];
            $this->name=$_SESSION['UserName'];
            $this->displayMessages();
          }
      }
      public function displayData():void
      {
         $books=$this->model->getFetchBook();
         $this->loggedUser = $_SESSION['loggedUser']??"no";
         $this->name =$_SESSION['UserName']??"no";
         $this->view->deleteBook($books,$this->loggedUser,$this->name);
      }
}
$deleteBookModel =new DeleteBookModel();
$deleteBook = new DeleteBook($deleteBookModel); 
$deleteBook->deleteBookController();