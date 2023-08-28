<?php
namespace App\Controller\authordash;

require "../../../vendor/autoload.php";
session_start();
use App\Model\authordash\publishBookModel;
use App\View\authordash\DisplayMessageAuthor;
/**
 * PublishedBook class is responsible for getReport of
 * 
 * author PublishedBook
 */
class PublishedBook
{
  private publishBookModel $publishedBookModel;
 
  private DisplayMessageAuthor $displayMessageAuthor;

  public function __construct($publishedBookModel,$becomeUserView)
  {
    $this->publishedBookModel=$publishedBookModel;
    $this->displayMessageAuthor=$becomeUserView;
  }
  
  public function publishedBookController():void
  {
       $authorname=$_SESSION["UserName"]??"  ";
       $authorId=$_SESSION["Userid"]??" ";
       $this->publishedBookModel->setAuthorName($authorname);
       $this->publishedBookModel->setAuthorId($authorId);
       $returnValue=$this->publishedBookModel->fetchBooks();
       if($returnValue)
       {
          $msg=$this->publishedBookModel->getBook();
          $loggedUser=$_SESSION['loggedUser'];
          $name =$_SESSION['UserName'];
          $this->displayMessageAuthor->publishedBook($msg,$loggedUser,$name);
       }
       else
       {
          $msg="You haven't Published";
          $loggedUser=$_SESSION['loggedUser'];
          $name =$_SESSION['UserName'];
          $this->displayMessageAuthor->displayAuthorMessage($msg,$loggedUser,$name);
          
       }
  }
  
}

$publishedBookModel=new publishBookModel();
$publishBookView = new DisplayMessageAuthor();
$publishedBook=new PublishedBook($publishedBookModel,$publishBookView);
$publishedBook->publishedBookController();



