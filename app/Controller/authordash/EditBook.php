<?php
namespace App\Controller\authordash;
use App\Controller\authordash\AuthorDashBase;
/**
 * Edit Specific Book will Display value fetched from 
 * 
 * database to display Author existing Value 
 */
class EditBook extends AuthorDashBase implements AuthorDashInterface
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
  public function editBookController(int $id):void
  {
    $this->AuthorDashDTO->setBookid($id);
    $returnValue=$this->model->fetchBookByBookId($this->AuthorDashDTO);
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
    $book=$this->AuthorDashDTO->getBook();
    $this->loggedUser = $_SESSION['loggedUser']??"no";
    $this->name =$_SESSION['UserName']??"no";
    $this->view->displayEditSpecificBook($book,$this->loggedUser,$this->name);
  }
}
