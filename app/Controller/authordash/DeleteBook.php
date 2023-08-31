<?php
namespace App\Controller\authordash;
require "../../../vendor/autoload.php";
use App\Model\authordash\DeleteBookModel;
use App\Controller\authordash\AuthorDashBase;
session_start();

/**
 * DeleteBook is will display books available to delete .
 * 
 */
class DeleteBook extends AuthorDashBase implements AuthorDashInterface
{

      /**
       * DeleteBookController Function Will 
       * 
       * display Book Available to delete 
       * 
       * if Author Have not published any book
       * 
       * we will display Message You Haven't Published.
       * 
       * @access public
       *
       * @return void
       */
      public function deleteBookController():void
      {
          
          $this->model->setAuthorid($_SESSION['Userid']);
          $returnValue=$this->model->fetchBook();
          
          if($returnValue)
          {
            $this->displayData();

          }
          else
          {
            $this->msg="You Have Not Published";
            $this->loggedUser=$_SESSION['loggedUser'];
            $this->name=$_SESSION['UserName'];
            $this->displayMessages();
          }
      }
      /**
       * Display Function will display 
       * 
       * available Books To delete
       *
       * @return void
       */
      public function displayData():void
      {
         $books=$this->model->getBook();
         $this->loggedUser = $_SESSION['loggedUser']??"no";
         $this->name =$_SESSION['UserName']??"no";
         $this->view->deleteBook($books,$this->loggedUser,$this->name);
      }
}
$deleteBookModel =new DeleteBookModel();
$deleteBook = new DeleteBook($deleteBookModel); 
$deleteBook->deleteBookController();