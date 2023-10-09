<?php
namespace App\Controller\authordash;
use App\Controller\authordash\AuthorDashBase;
use App\Model\authordash\BookModel;
use App\Model\authordash\AuthordashDTO;
use App\View\authordash\AuthorDashView;
use App\View\ViewDTO;
/**
 * Edit Specific Book will Display value fetched from 
 * 
 * database to display Author existing Value 
 */
class EditBook extends AuthorDashBase implements DisplayDataI
{
  private BookModel $model;
  public function __construct(BookModel $model )
  {
      $this->model = $model;
      
  }
  /**
   * EditspecificBookController will fetch Book From
   * 
   * Database  and it will display exsiting values
   *    
   * @access public 
   *
   * @return void
   */
    public function editBookController(array $id):ViewDTO
    {
      $dto = new AuthordashDTO();
      $dto->setBookid($id['id']);
      $returnValue=$this->model->fetchBookByBookId($dto);
      if($returnValue)
      {   
        $data=[
          "data"=>$dto->getBook()
        ];
        return new ViewDTO(
            "app/view/authordash","EditBookView.html.twig",$data
        );

      }
      else
      {
         //$this->displayMesage();
         $data=[
          "data"=>"problem occured"
         ];
         return new ViewDTO(
          "app/view/authordash","Authormessage.html.twig",$data
         );
      }
      //echo "<h1 style='font-size:50px;'>Edit book</h1>";

    }
    /**
     * DisplayData will book
    *
    * @return void
    */
    public function displayBook():void
    {
      //$book=$this->AuthorDashDTO->getBook();
      //$this->view->displayEditSpecificBook($book);
    } 
    protected function displayMesage():void
    {
       //$this->msg="Nothing to fetch";
       //$this->view->displayAuthorMessage($this->msg);
    }
}
