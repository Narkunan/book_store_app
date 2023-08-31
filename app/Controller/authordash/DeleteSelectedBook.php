<?php
namespace App\Controller\authordash;
require "../../../vendor/autoload.php";
use App\Model\authordash\DeleteSelectedBookModel;
use App\Controller\authordash\AuthorDashBase;
session_start();

/**
 * DeleteSelectedBook is responsible For 
 * 
 * delete Selected Book from database based on the 
 * 
 * BookId
 * 
 */
class DeleteSelectedBook extends AuthorDashBase
{
 
  /**
   * deleteBookImage function will 
   * 
   * delete BookImage Locally Stored 
   * 
   * @access public
   * 
   * @return void
   */
   public function deleteBookImage():void
   {
      
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

   /**
    * deleteselectedBookController will Delete Book from
    * 
    * Database Based on the BookID
    *
    * @access public
    *
    * @return void
    */
   public function deletedSelectedBookController():void
   {
      $this->model->setBookid($_GET['id']);
      $this->deleteBookImage();
      $reult=$this->model->deleteBook();
      if($reult)
      {
        
        $this->msg="your Most Recent Request For Delete Book Was Accomplished";
        $this->displayMessages();
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