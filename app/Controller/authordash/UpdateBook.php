<?php
namespace App\Controller\authordash;
require "../../../vendor/autoload.php";
use App\Model\authordash\UpdateBookModel;
use App\Controller\authordash\AuthorDashBase;
session_start();

/**
 * Update Book will apply changes made by author
 * 
 * in the Database.
 * 
 */
class UpdateBook extends AuthorDashBase 
{
    /**
     * updateBookController will
     * 
     * Apply changes Made bY author
     *
     * @access public
     * 
     * @return void
     */
    public function updateBookController():void
    {
        $this->model->setBookid($_POST['bookid']);
        $this->model->setTitle($_POST['booktitle']);
        $this->model->setCategory($_POST['book_category']);
        $this->model->setSubcategory($_POST['book_subcategory']);
        $this->model->setDescription($_POST['description']);
        $this->model->setPrice($_POST['price']);
        $this->model->setStock($_POST['stock']);
        $result=$this->model->updateBook();
        if($result)
        {
            $this->msg="your Recent Book Edit Request was accomplished";
            $this->loggedUser=$_SESSION['loggedUser'];
            $this->name =$_SESSION['UserName'];
            $this->displayMessages();
            
        }
        else
        {
           echo "<h1> we Cannot Update Book</h1>";
        }

    }
}
$editedBookModel= new UpdateBookModel();
$EditedBook = new UpdateBook($editedBookModel); 
$EditedBook->updateBookController();