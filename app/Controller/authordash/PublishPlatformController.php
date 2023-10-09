<?php
namespace App\Controller\authordash;
use App\Model\authordash\BookModel;
use App\Controller\authordash\AuthorDashBase;
use App\Model\authordash\BookDTO;

/***
 * PublishPlatform controller is 
 * 
 * bookpublishplatform
 * 
 */
class publishPlatformController extends AuthorDashBase 
{
    private BookModel $model;
   
    public function __construct(BookModel $model )
    {
        $this->model = $model;
      
    }
    public function publishBook(array $value)
    {
        $AuthorDashDTO = BookDTO::fromArray($value);
        $authorId=$_SESSION["Userid"];
        $AuthorDashDTO->setAuthorid($authorId);
        $AuthorDashDTO->setCoverpage($_FILES["coverpage"]["name"]);
        $result=$this->model->publishBook($AuthorDashDTO);
        if($result)
        {
            move_uploaded_file($_FILES["coverpage"]["tmp_name"],"app/Model/upload/".$AuthorDashDTO->getCoverpage());
            
            $this->data=[
                "data"=>"Your recent Book Was Published Sucessfully"
            ];
            return $this->displayMesage();
        }
        else
        {
            $this->data = [
                "data"=>"problem with publish book"
            ];
            return $this->displayMesage();
        }
    }

}
