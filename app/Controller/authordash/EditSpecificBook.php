<?php
namespace App\Controller\authordash;
require "../../../vendor/autoload.php";
use App\Model\authordash\EditSpecificBookModel;
use App\Controller\authordash\AuthorDashBase;
class EditSpecificBook extends AuthorDashBase implements AuthorDashInterface
{
  public function editSpecificBookController()
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
  public function displayData()
  {
    $book=$this->model->getFetchBook();
    $this->loggedUser = $_SESSION['$loggedUser']??"no";
    $this->name =$_SESSION['UserName']??"no";
    $this->view->displayEditSpecificBook($book,$this->loggedUser,$this->name);
  }
}
$editspecificBookModel=new EditSpecificBookModel();
$editspecificBook= new EditSpecificBook($editspecificBookModel);
$editspecificBook->editSpecificBookController();