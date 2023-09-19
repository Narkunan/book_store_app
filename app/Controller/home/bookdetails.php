<?php
namespace App\Controller\home;
use App\Controller\home\HomeBaseClass;
/**
 * indexController is for Display Selected book in home page.
 */
class bookdetails extends HomeBaseClass
{
    
    /**
     * By using bookid display details of book.
     *
     * 
     * @access public
     * 
     * @return void
     * 
     */
    public function findBook(array $value):void
    {

       $this->homeDTO->setBookId($value["id"]);
       if($this->model->fetchBook($this->homeDTO))
       {
          $this->books=$this->homeDTO->getFetchBook();
          $this->view->displaySelectedBook($this->books,$this->loggedUser,$this->name);
       }
       
    }
}
