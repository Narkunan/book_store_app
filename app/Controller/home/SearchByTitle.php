<?php
namespace App\Controller\home;
require "../../../vendor/autoload.php";
use App\Model\Home\SearchByTitleModel;
use App\View\home\SearchByTitleView;

class SearchByTitle
{
    private SearchByTitleModel $searchModel;
    private SearchByTitleView $searchView; 
    public function __construct($searchModel,$searchView)
    {
        $this->searchModel=$searchModel;
        $this->searchView=$searchView;
    }

    public function searchByTitleController()
    {
        $this->searchModel->title=$_GET["bookname"];
        $exists= $this->searchModel->fetchBook();
        if($exists)
        {
            
            $book=$this->searchModel->getFetchBook();
            $this->searchView->displayBook($book);
        }
        else
        {
            echo "<h1 style='font-size:50px;'>No Book Found:)<h1>";
        }
    }
}

$searchModel= new SearchByTitleModel();
$searchView= new SearchByTitleView();
$searchbytitle=new SearchByTitle($searchModel,$searchView);
$searchbytitle->searchByTitleController();

