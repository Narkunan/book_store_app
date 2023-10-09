<?php
namespace App\Controller\authordash;
use App\Controller\authordash\AuthorDashBase;
use App\Model\authordash\BookDTO;
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
    /**
     * updateBookController will
     * 
     * Apply changes Made bY author
     *
     * @access public
     * 
     * @return void
     */
    public function updateBookController(array $value):ViewDTO
    {
        $dto = BookDTO::fromArray($value);
        $dto->setBookid($value['bookid']);
        $result=$this->model->updateBook($dto);
        if($result)
        {
           
            $this->data=[
               "data"=>"your Recent Book Edit Request was accomplished"
            ];
            return $this->displayMesage();   
        }
        else
        {
           $this->data=[
            "data"=>" we Cannot Update Book"
           ];
           return $this->displayMesage();

        }

    }
   
}
