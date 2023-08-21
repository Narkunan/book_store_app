<?php
namespace App\Controller\authordash;
require "../../../vendor/autoload.php";

use App\Model\authordash\EditedBookModel;
use App\View\authordash\BookPublishConfirm;

class EditedBook
{
    private EditedBookModel $editedBookModel;
    private BookPublishConfirm $bookpublishConfirm;
    public function __construct($editedBookModel,$bookPublishConfirm)
    {
        $this->editedBookModel=$editedBookModel;
        $this->bookpublishConfirm=$bookPublishConfirm;
    }
    public function editedBookController()
    {
        $this->editedBookModel->setBookid($_POST['bookid']);
        $this->editedBookModel->setBooktitle($_POST['booktitle']);
        $this->editedBookModel->setCategory($_POST['book_category']);
        $this->editedBookModel->setSub_category($_POST['book_subcategory']);
        $this->editedBookModel->setDescription($_POST['description']);
        $this->editedBookModel->setPrice($_POST['price']);
        $this->editedBookModel->setStock($_POST['stock']);
        $result=$this->editedBookModel->updateBook();
        if($result)
        {
           
            $this->bookpublishConfirm->displayBook("your Recent Book Edit Request was accomplished");
        }
        else
        {
           echo "<h1> we Cannot Update Book</h1>";
        }

    }
}
$editedBookModel= new EditedBookModel();
$bookPublishConfirm= new BookPublishConfirm();
$EditedBook = new EditedBook($editedBookModel,$bookPublishConfirm); 
$EditedBook->editedBookController();