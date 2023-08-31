<?php
namespace App\Controller\home;
require "../../../vendor/autoload.php";
use App\Model\Home\SearchByTitleModel;
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

