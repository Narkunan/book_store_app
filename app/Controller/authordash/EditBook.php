<?php
namespace   App\Controller\authordash;
require "../../../vendor/autoload.php";
session_start();
use App\Model\authordash\EditBookModel;
use App\View\authordash\EditBookView;
class EditBook
{
   private EditBookModel $editBookModel;
   private EditBookView $editBookView;

   public function __construct($editBookModel,$editBookView)
   {
     $this->editBookModel=$editBookModel;
     $this->editBookView=$editBookView;
   }
   public function editBookManager()
   {
     $this->editBookModel->setAuthorid($_SESSION['authorid']);
     $bookFound=$this->editBookModel->fetchBooksByAuthorId();
     if($bookFound)
     {
        $this->editBookView->displayBook($this->editBookModel->getFetchBook());
     }
     else
     {
        echo "<h1 font-size:30px> You Haven't Published </h1>";
     }
   }
}
$editBookModel=new EditBookModel();
$editBookView=new EditBookView();
$EditBook=new EditBook($editBookModel,$editBookView);
$EditBook->editBookManager();