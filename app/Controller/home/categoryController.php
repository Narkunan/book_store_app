<?php
namespace App\Controller\home;
use App\Controller\home\HomeBase;
use App\Model\Home\HomeDTO;
use App\View\ViewDTO;
use App\Model\Home\category;
use App\Model\Home\CategoryModel;

/**
 * categoryController class will  fetch Book 
 * 
 * based on category selected by User.
 */
class categoryController extends HomeBase implements HomeI
{

    protected CategoryModel $model;
    protected category $category;
    public function __construct($model,$category)
    {
      $this->model = $model;
      $this->category = $category;
    }

    /**
     * findBook function will display 
     * 
     * books based on the category 
     * 
     * if books not available on the category 
     * 
     * it say Not Yet Published On this Category
     * 
     * @access public 
     * 
     * @return void
     */
    public function findBook(array $value):ViewDTO
    {
        $categorys = $this->category->category();
        $homeDTO = new HomeDTO();
        $homeDTO->setCategory($value['id']);
        
        $exists=$this->model->fetchBookByCategory($homeDTO);
        if($exists)
        { 

            $this->data=[
                "book"=>$homeDTO->getFetchBook(),
                "category"=>$categorys
            ];
            return $this->bookFound();
        }
        else 
        {
    
            $this->data=[
                "msg"=>"Not yet Published On this Category"
            ];
            return  $this->bookNotFound();     
        }
    }
    public function bookFound():ViewDTO{
        return new ViewDTO(
            "app/view/home","SearchByTitleView.html.twig",$this->data
        );
         
    }
}
