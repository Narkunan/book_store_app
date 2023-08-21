<?php
namespace App\Controller\authordash;

require "../../../vendor/autoload.php";
session_start();
use App\Model\authordash\publishBookModel;
use App\View\authordash\PublishedBookView;
/**
 * PublishedBook class is responsible for getReport of
 * 
 * author PublishedBook
 */
class PublishedBook
{
  private publishBookModel $publishedBookModel;

  private PublishedBookView $publishedBookView;

  public function __construct($publishedBookModel,$publishedBookView)
  {
    $this->publishedBookModel=$publishedBookModel;
    $this->publishedBookView=$publishedBookView;
  }
  
  public function publishedBookController():void
  {
       $authorname=$_SESSION["authorname"]??"  ";
       $authorId=$_SESSION["authorid"]??" ";
       $this->publishedBookModel->setAuthorName($authorname);
       $this->publishedBookModel->setAuthorId($authorId);
       $this->publishedBookModel->fetchBooks();
       $this->publishedBookView->displayBook($this->publishedBookModel->getBook());
  }
  
}

$publishedBookModel=new publishBookModel();
$publishedBookView=new PublishedBookView();
$publishedBook=new PublishedBook($publishedBookModel,$publishedBookView);
$publishedBook->publishedBookController();



