<?php
require_once "../../../vendor/autoload.php";
use App\Controller\home\HomeBaseClass;
use App\Model\Home\CategoryModel;
class categoryController extends HomeBaseClass 
{
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