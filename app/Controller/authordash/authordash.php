<?php
namespace App\Controller\authordash;
session_start();
require "../../../vendor/autoload.php";
use App\Model\authordash\AuthorDashModel;
use App\Controller\authordash\AuthorDashBase;
/***
 * Authordashconteoller for authordashboard
 * controller.
 */
class AuthorDashController extends AuthorDashBase
{
    
    /**
     * This authordash manager 
     * 
     * it process publish book edit book delete book etc..
     *
     * @return void
     */
    public function AuthorDashManager()
    {
        $authorname=$_SESSION["UserName"];
        $authorId=$_SESSION["Userid"];
        $this->model->setAuthorid($authorId);
        $this->model->setAuthorname($authorname);
        $this->model->setTitle($_POST["booktitle"]);
        $this->model->setCategory($_POST["book_category"]);
        $this->model->setSubcategory($_POST["book_subcategory"]);
        $this->model->setDescription($_POST["description"]);
        $this->model->setStock($_POST["stock"]);
        $this->model->setPrice($_POST["price"]);
        $this->model->setCoverpage($_FILES["coverpage"]["name"]);
        $result=$this->model->publishBook();
        if($result)
        {
            move_uploaded_file($_FILES["coverpage"]["tmp_name"],"../../Model/upload/".$this->model->getCoverpage());
            //$bookpublish=new BookPublishConfirm();
            //$bookpublish->displayBook("Your recent Book Was Published Sucessfully");
            $msg="Your recent Book Was Published Sucessfully";
            $loggeduser=$_SESSION['loggedUser'];
            $name=$_SESSION['UserName'];
            $this->view->displayAuthorMessage($msg,$loggeduser,$name);
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