<?php
require_once "../../../vendor/autoload.php";
use App\Controller\home\HomeBaseClass;
use App\Model\Home\CategoryModel;

/**
 * categoryController class will  fetch Book 
 * 
 * based on category selected by User.
 */
class categoryController extends HomeBaseClass 
{
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
    public function findBook():void
    {

        $this->model->setCategory($_GET['category']);
        $exists=$this->model->fetchBookByCategory();
        if($exists)
        { 
            $this->books=$this->model->getFetchBook();
            $this->bookFound();
             
        }
        else 
        {
            $this->msg="Not yet Published On this Category";
            $this->bookNotFound();           
        }
    }
}
$category=new CategoryModel();
$categoryController=new categoryController($category);
$categoryController->findBook();