<?php
namespace App\Controller\authordash;
use App\Controller\authordash\AuthorDashBase;

/**
 * Update Book will apply changes made by author
 * 
 * in the Database.
 * 
 */
class UpdateBook extends AuthorDashBase 
{
    public function inputData(array $value)
    {
        $this->AuthorDashDTO->setBookid($value['bookid']);
        $this->AuthorDashDTO->setTitle($value['booktitle']);
        $this->AuthorDashDTO->setCategory($value['book_category']);
        $this->AuthorDashDTO->setSubcategory($value['book_subcategory']);
        $this->AuthorDashDTO->setDescription($value['description']);
        $this->AuthorDashDTO->setPrice($value['price']);
        $this->AuthorDashDTO->setStock($value['stock']); 
    }
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
        
        $result=$this->model->updateBook($this->AuthorDashDTO);
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
