<?php
namespace App\Controller\home;
use App\Controller\home\HomeBase;
use App\Model\Home\bookdetailsModel;
use App\Model\Home\HomeDTO;
use App\View\ViewDTO;
use App\model\Home\category;
/**
 * indexController is for Display Selected book in home page.
 */
class bookdetails extends HomeBase implements HomeI
{
   private bookdetailsModel $model;
   private category $category;
   public function __construct($model,$category)
   {
      $this->model = $model;
      $this->category = $category;
   }
    
    /**
     * By using bookid display details of book.
     *
     * 
     * @access public
     * 
     * @return void
     * 
     */
    public function findBook(array $value):ViewDTO
    {
       $homeDto = new HomeDTO();
       $categorys = $this->category->category();
       $homeDto->setBookId($value["id"]);
       if($this->model->fetchBook($homeDto))
       {
          $this->data=[
            "book"=>$homeDto->getFetchBook(),
            'category'=>$categorys

          ];
          return $this->bookFound();
       }
       else
       {
            $this->data=[
               "msg"=>"problem with fetching book"
            ];
            return $this->bookNotFound();
       }
       
    }
    public function bookFound():ViewDTO{
      return new ViewDTO(
         "app/view/home","bookdetails.html.twig",$this->data
       );
    }
}
