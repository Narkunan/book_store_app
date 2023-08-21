<?php
namespace App\Controller\authordash;
require "../../../vendor/autoload.php";
use App\Model\authordash\DeleteBookModel;
use App\View\authordash\DeleteBookView;
session_start();
class DeleteBook
{
      private DeleteBookModel $deleteBookModel;
      private DeleteBookView $deleteBookView; 
      public function __construct($deleteBookModel,$deleteBookView)
      {
        $this->deleteBookModel=$deleteBookModel;
        $this->deleteBookView=$deleteBookView;
      }
      public function deleteBookController()
      {
        
        $this->deleteBookModel->setAuthorid($_SESSION['authorid']);
        $returnValue=$this->deleteBookModel->fetchBook();
        if($returnValue)
        {
            $this->deleteBookView->displayBook($this->deleteBookModel->getFetchBook());
        }
        else
        {
            echo "<h1> Nothing to Fetch</h1>";
        }
      }
}
$deleteBookModel =new DeleteBookModel();
$deleteBookView =new DeleteBookView();
$deleteBook = new DeleteBook($deleteBookModel,$deleteBookView); 
$deleteBook->deleteBookController();