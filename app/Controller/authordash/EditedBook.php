<?php
namespace App\Controller\authordash;
require "../../../vendor/autoload.php";
use App\Model\authordash\EditedBookModel;
use App\Controller\authordash\AuthorDashBase;

class EditedBook extends AuthorDashBase
{
    
    public function editedBookController()
    {
        $this->model->setBookid($_POST['bookid']);
        $this->model->setBooktitle($_POST['booktitle']);
        $this->model->setCategory($_POST['book_category']);
        $this->model->setSub_category($_POST['book_subcategory']);
        $this->model->setDescription($_POST['description']);
        $this->model->setPrice($_POST['price']);
        $this->model->setStock($_POST['stock']);
        $result=$this->model->updateBook();
        if($result)
        {
            $msg="your Recent Book Edit Request was accomplished";
            $loggedUser=$_SESSION['loggedUser'];
            $name =$_SESSION['UserName'];
            $this->view->displayAuthorMessage($msg,$loggedUser,$name);
            
        }
        else
        {
           echo "<h1> we Cannot Update Book</h1>";
        }

    }
}
$editedBookModel= new EditedBookModel();
$EditedBook = new EditedBook($editedBookModel); 
$EditedBook->editedBookController();