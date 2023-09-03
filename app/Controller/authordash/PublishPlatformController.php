<?php
namespace App\Controller\authordash;
session_start();
require "../../../vendor/autoload.php";
use App\Model\authordash\PublishPlatformModel;
use App\Controller\authordash\AuthorDashBase;
/***
 * PublishPlatform controller is 
 * 
 * bookpublishplatform
 * 
 */
class publishPlatformController extends AuthorDashBase 
{

    /**
     * This publishBookmanager 
     * 
     * it will publish book.
     *
     * @return void
     */
    public function publishBookManager():void
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
            $this->msg="Your recent Book Was Published Sucessfully";
            $this->loggedUser=$_SESSION['loggedUser'];
            $this->name=$_SESSION['UserName'];
            $this->displayMessages();
        }
        else
        {
            echo "problem with publish book";
        }
    }
}
$authorDashModel=new PublishPlatformModel();
$authordashcontroller=new publishPlatformController($authorDashModel);
$authordashcontroller->publishBookManager();