<?php
namespace App\Controller\authordash;
use App\Controller\authordash\AuthorDashBase;
use App\Model\authordash\SalesReportModel;
use App\Model\authordash\AuthordashDTO;
use App\View\ViewDTO;
/**
 * SalesReport class is responsible for getReport of
 * 
 * author PublishedBook.
 */
class SalesReport extends AuthorDashBase implements DisplayDataI
{
  
    private SalesReportModel $model;
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
  public function salesReportController(array $value):ViewDTO
  {
       $dto = new AuthordashDTO();
       $authorname=$_SESSION["UserName"]??"  ";
       $authorId=$_SESSION["Userid"]??" ";
       $dto->setAuthorName($authorname);
       $dto->setAuthorId($authorId);
       $returnValue=$this->model->fetchBooks($dto);
       if($returnValue)
       {  

          $book = $dto->getBook();
          $this->data=[
            "data"=>$book
          ];
          return $this->displayBook();

       }
       else
       {
    
          $this->data =[
            "data"=>"You have Not Published Any Book yet"
          ];
          return $this->displayMesage();

       }
  }

  /**
   * displayData Function will display Book 
   * 
   * published by Author 
   *
   * @return void
   */
  public function displayBook():ViewDTO
  {
    return new ViewDTO(
      "app/view/authordash","SalesReportView.html.twig",$this->data
    );
  } 

}


