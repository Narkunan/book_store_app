<?php
namespace App\Controller\authordash;
require "../../../vendor/autoload.php";
use App\Model\authordash\EditSpecificBookModel;
use App\View\authordash\EditSpecificBookView;
class EditSpecificBook
{
  private EditSpecificBookModel $editspecificbookModel;
  private EditSpecificBookView $editspecificBookView; 

  public function __construct($editspecificBookModel,$editSpecificBookView)
  {
    $this->editspecificbookModel=$editspecificBookModel;
    $this->editspecificBookView=$editSpecificBookView;
  }
  public function editSpecificBookController()
  {
    $this->editspecificbookModel->setBookid($_GET['id']);
    $returnValue=$this->editspecificbookModel->fetchBookByBookId();
    if($returnValue)
    {
        $this->editspecificBookView->displayBook($this->editspecificbookModel->getFetchBook());

    }
    else
    {
        echo "<h1 style='font-size:15px;'>Nothing to fetch</h1>";
    }

  }
}
$editspecificBookModel=new EditSpecificBookModel();
$editSpecificBookView= new EditSpecificBookView();
$editspecificBook= new EditSpecificBook($editspecificBookModel,$editSpecificBookView);
$editspecificBook->editSpecificBookController();