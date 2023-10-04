<?php
namespace App\Controller\authordash;
use App\Model\authordash\BookModel;
use App\model\authordash\AuthordashDTO;
use App\Controller\authordash\AuthorDashBase;
use App\View\authordash\AuthorDashView;
use App\View\ViewDTO;

/***
 * PublishPlatform controller is 
 * 
 * bookpublishplatform
 * 
 */
class publishPlatformController extends AuthorDashBase 
{
    private BookModel $model;
    //private AuthorDashView $view;
    private AuthordashDTO $AuthorDashDTO;
   
    public function __construct(BookModel $model )
    {
        $this->model = $model;
      
    }
    public function inputData(array $value)
    {
        $AuthorDashDTO = new AuthordashDTO();
        $authorname=$_SESSION["UserName"];
        $authorId=$_SESSION["Userid"];
        $AuthorDashDTO->setAuthorid($authorId);
        $AuthorDashDTO->setAuthorname($authorname);
        $AuthorDashDTO->setTitle($_POST["booktitle"]);
        $AuthorDashDTO->setCategory($_POST["book_category"]);
        $AuthorDashDTO->setSubcategory($_POST["book_subcategory"]);
        $AuthorDashDTO->setDescription($_POST["description"]);
        $AuthorDashDTO->setStock($_POST["stock"]);
        $AuthorDashDTO->setPrice($_POST["price"]);
        $AuthorDashDTO->setCoverpage($_FILES["coverpage"]["name"]);
        //$this->publishBookManager($AuthorDashDTO);
        $result=$this->model->publishBook($AuthorDashDTO);
        if($result)
        {
            move_uploaded_file($_FILES["coverpage"]["tmp_name"],"app/Model/upload/".$AuthorDashDTO->getCoverpage());
            //$this->displayMesage(); 
            $this->msg="Your recent Book Was Published Sucessfully";
            $data=[
                "data"=>$this->msg
            ];
            return new ViewDTO(
                "app/view/authordash","AuthorMessage.html.twig",$data
            );
        }
        else
        {
            $this->msg = "problem with publish book";
            $data = [
                "data"=>$this->msg
            ];
            return new ViewDTO(
                "app/view/authordash","AuthorMessage.html.twig",$data
            );
        }

    }
    /**
     * This publishBookmanager 
     * 
     * it will publish book.
     *
     * @return void
     */
    public function publishBookManager(AuthordashDTO $dto):void
    {
        
        /**$result=$this->model->publishBook($dto);
        if($result)
        {
            move_uploaded_file($_FILES["coverpage"]["tmp_name"],"app/Model/upload/".$dto->getCoverpage());
            //$this->displayMesage(); 
            $this->msg="Your recent Book Was Published Sucessfully";
            $data=[
                "msg"=>$this->msg
            ];
            return new ViewDTO(
                "app/view/authordash","AuthorMessage.html.twig",$data
            );
        }
        else
        {
            $this->msg = "problem with publish book";
            $data = [
                "msg"=>$this->msg
            ];
            return new ViewDTO(
                "app/view/authordash","AuthorMessage.html.twig",$data
            );
        }**/
    }
    protected function displayMesage():void
    {
        
        //$this->view->displayAuthorMessage($this->msg);
    }
}
