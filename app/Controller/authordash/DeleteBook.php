<?php
namespace App\Controller\authordash;
use App\Controller\authordash\AuthorDashBase;
use App\Model\authordash\AuthordashDTO;
use App\Model\authordash\BookModel;
use App\View\ViewDTO;

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
 
  private BookModel $model;
   
  public function __construct(BookModel $model )
  {
      $this->model = $model;
  }
  /**
   * deleteBookImage function will 
   * 
   * delete BookImage Locally Stored 
   * 
   * @access public
   * 
   * @return void
   */
   private function deleteBookImage($AuthorDashDTO):void
   {
      
      $coverimg=$this->model->deleteBookCoverPage($AuthorDashDTO);
      if($coverimg)
      {
         $path="../../Model/upload/".$AuthorDashDTO->getCoverPage();
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
   public function deletedBookController(array $id):ViewDTO
   {
      $dto = new AuthordashDTO();
      $dto->setBookid($id['id']);
      $this->deleteBookImage($dto);
      $reult=$this->model->deleteBook($dto);
      if($reult)
      {
         
          $this->data=[
            "data"=>"your Most Recent Request For Delete Book Was Accomplished"
          ];
          return $this->displayMesage();
      }
      else
      {
    
          $this->data=[
            "data"=>"encountred Problem With Deleting Book "
          ];
          return $this->displayMesage();
      }
   
    }
  
}
