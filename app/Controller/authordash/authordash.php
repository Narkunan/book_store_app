<?php

namespace App\Controller\authordash;
session_start();
require "../../../vendor/autoload.php";
use App\Model\authordash\AuthorDashModel;
use App\View\authordash\BookPublishConfirm;
/***
 * Authordashconteoller for authordashboard
 * controller.
 */
class AuthorDashController
{
    private authorDashModel $authordashmodel;
    
    /**
     * initialies authordashModel.
     *
     * @param authordashmodel $authorDashModel
     */
    public function __construct($authorDashModel)
    {
       $this->authordashmodel=$authorDashModel;
    }


    /**
     * This authordash manager 
     * 
     * it process publish book edit book delete book etc..
     *
     * @return void
     */
    public function AuthorDashManager()
    {
        $authorname=$_SESSION["authorname"];
        $authorId=$_SESSION["authorid"];
        $this->authordashmodel->setAuthorid($authorId);
        $this->authordashmodel->setAuthorname($authorname);
        $this->authordashmodel->setTitle($_POST["booktitle"]);
        $this->authordashmodel->setCategory($_POST["book_category"]);
        $this->authordashmodel->setSubcategory($_POST["book_subcategory"]);
        $this->authordashmodel->setDescription($_POST["description"]);
        $this->authordashmodel->setStock($_POST["stock"]);
        $this->authordashmodel->setPrice($_POST["price"]);
        $this->authordashmodel->setCoverpage($_FILES["coverpage"]["name"]);
        $result=$this->authordashmodel->publishBook();
        if($result)
        {
            move_uploaded_file($_FILES["coverpage"]["tmp_name"],"../../Model/upload/".$this->authordashmodel->getCoverpage());
            $bookpublish=new BookPublishConfirm();
            $bookpublish->displayBook("Your recent Book Was Published Sucessfully");
        }
        else
        {
            echo "problem with publish book";
        }
    }
}
$authorDashModel=new AuthorDashModel();
$authordashcontroller=new AuthorDashController($authorDashModel);
$authordashcontroller->AuthorDashManager();