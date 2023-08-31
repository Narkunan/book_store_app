<?php
namespace App\Controller\authordash;
require "../../../vendor/autoload.php";
session_start();
use App\Model\authordash\publishBookModel;
use App\Controller\authordash\AuthorDashBase;
/**
 * PublishedBook class is responsible for getReport of
 * 
 * author PublishedBook.
 */
class PublishedBook extends AuthorDashBase implements AuthorDashInterface
{
  
  /**
   * publishedBookController will fetch 
   * 
   * books from Database by authorId.
   *
   * @access public
   * 
   * @return void
   */
  public function publishedBookController():void
  {
       $authorname=$_SESSION["UserName"]??"  ";
       $authorId=$_SESSION["Userid"]??" ";
       $this->model->setAuthorName($authorname);
       $this->model->setAuthorId($authorId);
       $returnValue=$this->model->fetchBooks();
       if($returnValue)
       {
          $this->displayData();
       }
       else
       {
          $this->msg="You haven't Published";
         
          $this->displayMessages();
          
       }
  }

  /**
   * displayData Function will display Book 
   * 
   * published by Author 
   *
   * @return void
   */
  public function displayData():void
  {
    $book=$this->model->getBook();
    $this->view->publishedBook($book,$this->loggedUser,$this->name);
  }  
}

$publishedBookModel=new publishBookModel();
$publishedBook=new PublishedBook($publishedBookModel);
$publishedBook->publishedBookController();



