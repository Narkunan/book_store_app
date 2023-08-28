<?php
namespace App\Controller\home;
require "../../../vendor/autoload.php";
use App\Model\Home\SearchByTitleModel;
use App\Controller\home\HomeBaseClass;

class SearchByTitle extends HomeBaseClass
{
    public function findBook():void
    {
        $this->model->title=$_GET["bookname"];
        $exists= $this->model->fetchBook();
        if($exists)
        {
            $this->books=$this->model->getFetchBook();
            $this->bookFound();
            
        }
        else
        {
            
            $this->msg="No Book Found:(";
            $this->bookNotFound();
            
        }
    }
}

$searchModel= new SearchByTitleModel();
$searchbytitle=new SearchByTitle($searchModel);
$searchbytitle->findBook();

