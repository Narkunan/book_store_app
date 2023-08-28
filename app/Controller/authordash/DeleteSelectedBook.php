<?php
namespace App\Controller\authordash;
require "../../../vendor/autoload.php";
use App\Model\authordash\DeleteSelectedBookModel;
use App\Controller\authordash\AuthorDashBase;

class DeleteSelectedBook extends AuthorDashBase
{
 
   public function deleteBookImage()
   {
      $this->model->setBookid($_GET['id']);
      $coverimg=$this->model->deleteBookCoverPage();
      if($coverimg)
      {
         $path="../../Model/upload/".$this->model->getCoverPage();
         if(file_exists($path))
         {
           echo "file exists";
           unlink($path);
         }
      }
   }
   public function deletedSelectedBookController()
   {
     
     
      $reult=$this->model->deleteBook();
      if($reult)
      {
        $this->deleteBookImage();
        $msg="your Most Recent Request For Delete Book Was Accomplished";
        $loggedUser = $_SESSION['loggedUser']??"no";
        $name = $_SESSION['UserName']??"no"; 
        $this->view->displayAuthorMessage($msg,$loggedUser,$name);
      }
      else
      {
        echo "<h1>encountred Problem With Deleting Book ";
      }
    }
}
$deleteSelectedBookModel = new DeleteSelectedBookModel();
$DeleteSelectedBook= new DeleteSelectedBook($deleteSelectedBookModel);
$DeleteSelectedBook->deletedSelectedBookController();