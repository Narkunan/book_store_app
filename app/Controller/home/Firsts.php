<?php
namespace App\Controller\home;
use App\Model\Home\HomeDTO;
use App\Model\Home\IndexModel;
use App\View\ViewDTO;
use App\Model\Home\category;
class Firsts 
{
    private IndexModel $indexmodel;
    private category $category;
    public function __construct(IndexModel $indexModel , category $category)
    {
        $this->category = $category;
        $this->indexmodel = $indexModel;
    }
    public function displayBook(array $value):ViewDTO
    {

        $homeDto = new HomeDTO();
        $categorys = $this->category->category(); 
        $this->indexmodel->fetchBook($homeDto);
        $product=$homeDto->getFetchBook();
        $data=[
            "category"=>$categorys,
            "book"=>$product
        ];
       
        return new ViewDTO(
            "app/view/home","SearchByTitleView.html.twig",$data
        );
    }
    
}



      
    