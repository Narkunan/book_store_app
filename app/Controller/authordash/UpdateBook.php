<?php
namespace App\Controller\authordash;
use App\Controller\authordash\AuthorDashBase;
use App\Model\authordash\AuthordashDTO;
use App\Model\authordash\BookModel;
use App\View\ViewDTO;

/**
 * Update Book will apply changes made by author
 * 
 * in the Database.
 * 
 */
class UpdateBook extends AuthorDashBase 
{
    private BookModel $model;

    public function __construct(BookModel $model)
    {
        $this->model = $model;
    }
    public function inputData(array $value)
    {
        $dto = new AuthordashDTO();
        $dto->setBookid($value['bookid']);
        $dto->setTitle($value['booktitle']);
        $dto->setCategory($value['book_category']);
        $dto->setSubcategory($value['book_subcategory']);
        $dto->setDescription($value['description']);
        $dto->setPrice($value['price']);
        $dto->setStock($value['stock']); 
        $this->updateBookController($dto);
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
    public function updateBookController(AuthordashDTO $dto):ViewDTO
    {
        
        $result=$this->model->updateBook($dto);
        if($result)
        {
            $this->msg="your Recent Book Edit Request was accomplished";
            //$this->displayMessages();
            $data=[
               "data"=>$this->msg
            ];
            return new ViewDTO
            (
                "app/view/authordash","AuthorMessage.html.twig",$data
            );
            
        }
        else
        {
           
           $this->msg=" we Cannot Update Book";
           $data=[
            "data"=>$this->msg
           ];
           return new ViewDTO(
            "app/view/authordash","AuthorMessage.html.twig",$data
           );

        }

    }
    public function displayMesage():void
    {

    }
}
