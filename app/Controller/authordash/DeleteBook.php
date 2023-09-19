<?php
namespace App\Controller\authordash;
require "../../../vendor/autoload.php";
use App\Model\authordash\DeleteBookModel;
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
class DeleteBook extends AuthorDashBase
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
   public function deletedBookController():void
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
$deleteSelectedBookModel = new DeleteBookModel();
$DeleteSelectedBook= new DeleteBook($deleteSelectedBookModel);
$DeleteSelectedBook->deletedBookController();