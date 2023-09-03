<?php
namespace App\Controller\authordash;
require "../../../vendor/autoload.php";
session_start();
use App\Model\authordash\SalesReportModel;
use App\Controller\authordash\AuthorDashBase;
/**
 * SalesReport class is responsible for getReport of
 * 
 * author PublishedBook.
 */
class SalesReport extends AuthorDashBase implements AuthorDashInterface
{
  
  /**
   * salesReportController will fetch 
   * 
   * books from Database by authorId.
   * 
   * and display book sales .
   *
   * @access public
   * 
   * @return void
   */
  public function salesReportController():void
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
    $this->view->salesReport($book,$this->loggedUser,$this->name);
  }  
}

$publishedBookModel=new SalesReportModel();
$publishedBook=new SalesReport($publishedBookModel);
$publishedBook->salesReportController();



