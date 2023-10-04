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
  private AuthordashDTO $AuthorDashDTO;
   
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
   public function deletedBookController(int $id):ViewDTO
   {
      $this->AuthorDashDTO->setBookid($id);
      $this->deleteBookImage($this->AuthorDashDTO);
      $reult=$this->model->deleteBook($this->AuthorDashDTO);
      if($reult)
      {
          $this->msg="your Most Recent Request For Delete Book Was Accomplished";
          //$this->displayMesage();
          $data=[
            "data"=>$this->msg
          ];
          return new ViewDTO(
            "app/view/authordash","AuthorMessage.html.twig",$data
          );
      }
      else
      {
        ;
        $this->msg="encountred Problem With Deleting Book ";
          //$this->displayMesage();
          $data=[
            "data"=>$this->msg
          ];
          return new ViewDTO(
            "app/view/authordash","AuthorMessage.html.twig",$data
          );
      }
      //echo "<h1 style='font-size:50px;'> from delete book controller</h1>";

    }
    public function displayMesage():void
    {
        //$this->msg="your Most Recent Request For Delete Book Was Accomplished";
        //$this->view->displayAuthorMessage($this->msg);
    }
}
