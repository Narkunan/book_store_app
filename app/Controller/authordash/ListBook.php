<?php
namespace App\Controller\authordash;
use App\Controller\authordash\AuthorDashBase;
use App\Model\authordash\AuthordashDTO;
use App\Model\authordash\ListBookModel;
use App\View\ViewDTO;

/**
 * EditBook will displayBooks Available to delete.
 * 
 */
class ListBook extends AuthorDashBase implements DisplayDataI
{
   private ListBookModel $model;
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
   public function listBookManager(array $value):ViewDTO
   {
      $dto = new AuthordashDTO();
      $dto->setAuthorid($_SESSION['Userid']);
      $bookFound=$this->model->fetchBooksByAuthorId($dto);
      if($bookFound)
      {
         $this->data = [
            "data"=>$dto->getBook()
         ];
         return $this->displayBook();
     }
     else
     {
        
         $this->data=[
            "data"=>"You Have Not published Any Book"
         ];
         return $this->displayMesage();

     }

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
   public function displayBook():ViewDTO
   {
      return new ViewDTO(
         "app/view/authordash","ListBook.html.twig",$this->data
      );
   }
  
}
