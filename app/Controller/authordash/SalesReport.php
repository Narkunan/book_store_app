<?php
namespace App\Controller\authordash;
use App\Controller\authordash\AuthorDashBase;
/**
 * SalesReport class is responsible for getReport of
 * 
 * author PublishedBook.
 */
class SalesReport extends AuthorDashBase
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
       $this->AuthorDashDTO->setAuthorName($authorname);
       $this->AuthorDashDTO->setAuthorId($authorId);
       $returnValue=$this->model->fetchBooks($this->AuthorDashDTO);
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
    $book=$this->AuthorDashDTO->getBook();
    $this->view->salesReport($book,$this->loggedUser,$this->name);
  }  
}


