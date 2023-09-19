<?php
namespace App\Controller\home;
use App\Controller\home\HomeBaseClass;
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
    public function findBook(array $value):void
    {

        $this->homeDTO->setCategory($value['id']);
        echo $value["id"];
        $exists=$this->model->fetchBookByCategory($this->homeDTO);
        if($exists)
        { 
            $this->books=$this->homeDTO->getFetchBook();
            $this->bookFound();
             
        }
        else 
        {
            $this->msg="Not yet Published On this Category";
            $this->bookNotFound();           
        }
    }
}
