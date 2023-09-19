<?php
namespace App\Controller\home;
use App\Controller\home\HomeBaseClass;
/**
 * searchBytitle Will display book Based on the Book Title
 * 
 * searched By User
 */
class SearchByTitle extends HomeBaseClass
{
    /**
     * findBook() will find Book by 
     * 
     * bookName.
     * 
     * @access public 
     *
     * @return void
     */
    public function findBook(array $value):void
    {

        $this->homeDTO->setTitle($value["bookname"]);
        $exists= $this->model->fetchBook($this->homeDTO);
        if($exists)
        {
            $this->books=$this->homeDTO->getFetchBook();
            $this->bookFound();
            
        }
        else
        {
            
            $this->msg="No Book Found:(";
            $this->bookNotFound();
            
        }
    }
}



