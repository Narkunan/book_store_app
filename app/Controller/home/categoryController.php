<?php
namespace App\Controller\home;
use App\Controller\home\HomeBaseClass;
use App\Model\Home\HomeDTO;
use App\View\ViewDTO;
use App\Model\Home\category;
/**
 * categoryController class will  fetch Book 
 * 
 * based on category selected by User.
 */
class categoryController extends HomeBaseClass 
{

    protected $model;
    public function __construct($model)
    {
      $this->model = $model;
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
        $category = new category();
        $categorys = $category->category();
        $homeDTO = new HomeDTO();
        $homeDTO->setCategory($value['id']);
        //echo  "from categoryController".$value["id"];
        $exists=$this->model->fetchBookByCategory($homeDTO);
        if($exists)
        { 
            $this->books=$this->homeDTO->getFetchBook();
            //$this->bookFound();
            $data=[
                "book"=>$homeDTO->getFetchBook(),
                "category"=>$categorys
            ];
            return new ViewDTO(
                "app/view/home","SearchByTitleView.html.twig",$data
            );
             
        }
        else 
        {
            $this->msg="Not yet Published On this Category";
            //$this->bookNotFound();   
            $data=[
                "msg"=>$this->msg
            ];
            return new ViewDTO("
            app/view/home","HomeDisplayMessage.html.twig",$data);        
        }
    }
}
