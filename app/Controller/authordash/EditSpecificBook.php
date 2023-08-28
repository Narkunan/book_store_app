<?php
namespace App\Controller\authordash;
require "../../../vendor/autoload.php";
use App\Model\authordash\EditSpecificBookModel;
use App\Controller\authordash\AuthorDashBase;
class EditSpecificBook extends AuthorDashBase
{
  public function editSpecificBookController()
  {
    $this->model->setBookid($_GET['id']);
    $returnValue=$this->model->fetchBookByBookId();
    if($returnValue)
    {   

        $book=$this->model->getFetchBook();
        $loggedUser = $_SESSION['$loggedUser']??"no";
        $name =$_SESSION['UserName']??"no";
        $this->view->displayEditSpecificBook($book,$loggedUser,$name);

    }
    else
    {
        $msg="Nothing to fetch";
        $loggedUser=$_SESSION['loggedUser'];
        $name =$_SESSION['UserName'];
        $this->view->displayAuthorMessage($msg,$loggedUser,$name);
    }

  }
}
$editspecificBookModel=new EditSpecificBookModel();
$editspecificBook= new EditSpecificBook($editspecificBookModel);
$editspecificBook->editSpecificBookController();