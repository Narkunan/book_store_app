<?php
namespace App\Controller\authordash;

use App\Model\authordash\PublishPlatformModel;
use App\Controller\authordash\AuthorDashBase;
use App\Model\authordash\AuthordashDTO;
/***
 * PublishPlatform controller is 
 * 
 * bookpublishplatform
 * 
 */
class publishPlatformController extends AuthorDashBase 
{

    public function inputData(array $value)
    {
        $authorname=$_SESSION["UserName"];
        $authorId=$_SESSION["Userid"];
        $this->AuthorDashDTO->setAuthorid($authorId);
        $this->AuthorDashDTO->setAuthorname($authorname);
        $this->AuthorDashDTO->setTitle($_POST["booktitle"]);
        $this->AuthorDashDTO->setCategory($_POST["book_category"]);
        $this->AuthorDashDTO->setSubcategory($_POST["book_subcategory"]);
        $this->AuthorDashDTO->setDescription($_POST["description"]);
        $this->AuthorDashDTO->setStock($_POST["stock"]);
        $this->AuthorDashDTO->setPrice($_POST["price"]);
        $this->AuthorDashDTO->setCoverpage($_FILES["coverpage"]["name"]);
    }
    /**
     * This publishBookmanager 
     * 
     * it will publish book.
     *
     * @return void
     */
    public function publishBookManager():void
    {
        
        $result=$this->model->publishBook($this->AuthorDashDTO);
        if($result)
        {
            move_uploaded_file($_FILES["coverpage"]["tmp_name"],"app/Model/upload/".$this->AuthorDashDTO->getCoverpage());
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
