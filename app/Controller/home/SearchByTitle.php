<?php
namespace App\Controller\home;
use App\Controller\home\HomeBaseClass;
use App\Model\Home\category;
use App\Model\Home\HomeDTO;
use App\View\ViewDTO;
/**
 * searchBytitle Will display book Based on the Book Title
 * 
 * searched By User
 */
class SearchByTitle extends HomeBaseClass
{

    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }
    /**
     * findBook() will find Book by 
     * 
     * bookName.
     * 
     * @access public 
     *
     * @return void
     */
    public function findBook(array $value):ViewDTO
    {
        $homeDTO = new HomeDTO();
        $homeDTO->setTitle($value["bookname"]);
        $exists= $this->model->fetchBook($this->homeDTO);
        $category = new category();

        if($exists)
        {
            //$this->books=$this->homeDTO->getFetchBook();
            //$this->bookFound();
            $data=[
                 "category"=>$category->category(),
                 "book"=>$homeDTO->getFetchBook()
            ];

            return new ViewDTO(
                "app/view/home","SearchByTitleView.html.twig",$data
            );
            
        }
        else
        {
            
            $this->msg="No Book Found:(";
            //$this->bookNotFound();

            $data =[
                "msg"=>"No BOOK Found:("
            ];
            return new ViewDTO(
                "app/view/home","HomeDisplayMessage.html.twig",$data
            );
            
        }
    }
}



