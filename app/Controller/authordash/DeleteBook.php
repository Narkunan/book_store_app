<?php
namespace App\Controller\authordash;
use App\Controller\authordash\AuthorDashBase;

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
   public function deleteBookImage($AuthorDashDTO):void
   {
      
      $coverimg=$this->model->deleteBookCoverPage($AuthorDashDTO);
      if($coverimg)
      {
         $path="../../Model/upload/".$this->AuthorDashDTO->getCoverPage();
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
   public function deletedBookController(int $id):void
   {
      $this->AuthorDashDTO->setBookid($id);
      $this->deleteBookImage($this->AuthorDashDTO);
      $reult=$this->model->deleteBook($this->AuthorDashDTO);
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
