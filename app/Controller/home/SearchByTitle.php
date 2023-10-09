<?php
namespace App\Controller\home;
use App\Controller\home\HomeBaseClass;
use App\Model\Home\category;
use App\Model\Home\HomeDTO;
use App\Model\Home\SearchByTitleModel;
use App\View\ViewDTO;
/**
 * searchBytitle Will display book Based on the Book Title
 * 
 * searched By User
 */
class SearchByTitle extends HomeBase implements HomeI
{
    private SearchByTitleModel $model;
    private category $category;

    public function __construct(SearchByTitleModel $model,category $category)
    {
        $this->model = $model;
        $this->category = $category;
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
        $exists= $this->model->fetchBook($homeDTO);
        if($exists)
        {
  
            $this->data=[
                 "category"=>$this->category->category(),
                 "book"=>$homeDTO->getFetchBook()
            ];   
            return $this->bookFound();
        }
        else
        {
            
            $this->data =[
                "msg"=>"No BOOK Found:("
            ];
            return $this->bookNotFound();
            
        }
    }
    public function bookFound():ViewDTO{
        return new ViewDTO(
            "app/view/home","SearchByTitleView.html.twig",$this->data
        );
    }
}



