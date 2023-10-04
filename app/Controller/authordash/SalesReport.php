<?php
namespace App\Controller\authordash;
use App\Controller\authordash\AuthorDashBase;
use App\Model\authordash\SalesReportModel;
use App\Model\authordash\AuthordashDTO;
use App\View\authordash\AuthorDashView;
use App\View\ViewDTO;
/**
 * SalesReport class is responsible for getReport of
 * 
 * author PublishedBook.
 */
class SalesReport extends AuthorDashBase implements DisplayDataI
{
  
    private SalesReportModel $model;
    private AuthordashDTO $dto;
    private AuthorDashView $view;

    public function __construct(SalesReportModel $model)
    {
        $this->model = $model;
       
    }
    /**
   * salesReportController will fetch 
   * 
   * books from Database by authorId.
   * 
   * and display book sales .
   *
   * @access public
   * 
   * @return void
   */
  public function salesReportController():ViewDTO
  {
       $dto = new AuthordashDTO();
       $authorname=$_SESSION["UserName"]??"  ";
       $authorId=$_SESSION["Userid"]??" ";
       $dto->setAuthorName($authorname);
       $dto->setAuthorId($authorId);
       $returnValue=$this->model->fetchBooks($dto);
       if($returnValue)
       {  
          //$this->displayBook();
          $book = $dto->getBook();
          $data=[
            "data"=>$book
          ];
          return new ViewDTO(
            "app/view/authordash","SalesReportView.html.twig",$data
          );

       }
       else
       {
          //$this->displayMesage();  
          $this->msg = "You have Not Published Any Book yet";
          $data =[
            "data"=>$this->msg
          ];
          return new ViewDTO(
            "app/view/authordash","AuthorMessage.html.twig",$data
          );
       }
  }

  /**
   * displayData Function will display Book 
   * 
   * published by Author 
   *
   * @return void
   */
  public function displayBook():void
  {
    $book=$this->dto->getBook();
    $this->view->salesReport($book);
  } 
  public function displayMesage():void 
  {
    $this->msg="You haven't Published";
    $this->view->displayAuthorMessage($this->msg);
  }
}


