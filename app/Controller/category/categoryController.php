<?php
require_once "../../../vendor/autoload.php";
use App\Model\category\CategoryModel;
use App\View\categoryView\categoryView;

class categoryController
{
    private  $category;
    private  $categoryView;

    public function __construct($category,$categoryView)
    {
       $this->category=$category;
       $this->categoryView=$categoryView;
    }
    public function categoryManager()
    {

        $this->category->setCategory($_GET['category']);
        $exists=$this->category->fetchBookByCategory();
        if($exists)
        {
            $this->categoryView->displayBook($this->category->getBooks());
        }
        else 
        {
            echo "<h1 style='font-size:30px;'> Not yet Published On this Category</h1>";
        }
    }
}
$category=new CategoryModel();
$categoryView=new categoryView();
$categoryController=new categoryController($category,$categoryView);
$categoryController->categoryManager();