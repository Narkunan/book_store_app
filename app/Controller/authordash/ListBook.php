<?php
namespace App\Controller\authordash;
use App\Controller\authordash\AuthorDashBase;
use App\Model\authordash\AuthordashDTO;
use App\Model\authordash\ListBookModel;
//use App\View\authordash\AuthorDashView;
use App\View\ViewDTO;

/**
 * EditBook will displayBooks Available to delete.
 * 
 */
class ListBook extends AuthorDashBase implements DisplayDataI
{
   private ListBookModel $model;
   //private AuthordashDTO $dto;
   //private AuthorDashView $view;
   public function __construct(ListBookModel $model)
   {
       $this->model= $model;
   
   }
   /**
    * EditBookManager is responsible for 
    * 
    * display book available to edit 
    *
    * author have not published any Book 
    *
    * display Message to the author that
    *
    * You Havenot Published yet
    *
    * @access public
    *
    * @return void
    */
   public function listBookManager():ViewDTO
   {
      $dto = new AuthordashDTO();
      $dto->setAuthorid($_SESSION['Userid']);
      $bookFound=$this->model->fetchBooksByAuthorId($dto);
      if($bookFound)
      {
         $data = [
            "data"=>$dto->getBook()
         ];
         return new ViewDTO(
            "app/view/authordash","ListBook.html.twig",$data
         );
     }
     else
     {
         //$this->displayMesage();
         $this->msg="You Have Not published Any Book";
         $data=[
            "data"=>$this->msg
         ];
         return new ViewDTO(
            "app/view/authordash","AuthorMessage.html.twig",$data
         );

     }
     //echo "<h1 style='font-size:50px;'> from list book controller</h1>";

   }
   /**
    * displayData Function will Display 
    *
    * available to Delete
    * 
    * @access public
    *
    * @return void
    */
   public function displayBook():void
   {
      //$book=$this->dto->getBook();
      //$this->view->displayEditBookView($book);
   }
   public function displayMesage():void
   {
         //$this->msg="You have not published yet";
         //$this->view->displayAuthorMessage($this->msg);
   }
}
