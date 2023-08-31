<?php
namespace App\Controller\authordash;
require "../../../vendor/autoload.php";
use App\Model\authordash\EditSpecificBookModel;
use App\Controller\authordash\AuthorDashBase;
session_start();

/**
 * Edit Specific Book will Display value fetched from 
 * 
 * database to display Author existing Value 
 */
class EditSpecificBook extends AuthorDashBase implements AuthorDashInterface
{

  /**
   * EditspecificBookController will fetch Book From
   * 
   * Database  and it will display exsiting values
   *    
   * @access public 
   *
   * @return void
   */
  public function editSpecificBookController():void
  {
    $this->model->setBookid($_GET['id']);
    $returnValue=$this->model->fetchBookByBookId();
    if($returnValue)
    {   
       
        $this->displayData();

    }
    else
    {
        $this->msg="Nothing to fetch";
        $this->loggedUser=$_SESSION['loggedUser'];
        $this->name =$_SESSION['UserName'];
        $this->view->displayAuthorMessage($this->msg,$this->loggedUser,$this->name);
    }

  }
  /**
   * DisplayData will book
   *
   * @return void
   */
  public function displayData():void
  {
    $book=$this->model->getBook();
    $this->loggedUser = $_SESSION['$loggedUser']??"no";
    $this->name =$_SESSION['UserName']??"no";
    $this->view->displayEditSpecificBook($book,$this->loggedUser,$this->name);
  }
}
$editspecificBookModel=new EditSpecificBookModel();
$editspecificBook= new EditSpecificBook($editspecificBookModel);
$editspecificBook->editSpecificBookController();