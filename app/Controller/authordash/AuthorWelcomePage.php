<?php
namespace App\Controller\authordash;
use App\Controller\authordash\AuthorDashBase;
use App\Model\authordash\AuthordashDTO;
use App\Model\authordash\WelcomePageModel;
//use App\View\authordash\AuthorDashView;
use App\View\ViewDTO;
/**
 * Author Welcome Page is responsible for 
 * 
 * for showing things like how many they have published
 * 
 * by category and also number of book.
 * 
 */
class AuthorWelcomePage extends AuthorDashBase
{
    private WelcomePageModel $model;
    private  AuthordashDTO $dto;
    //private AuthorDashView $view;
    public function __construct(WelcomePageModel $model)
    {
        $this->model = $model;

    }
    public function welcomeAuthordash():ViewDTO
    {
         $dto = new AuthordashDTO(); 
         $dto->setAuthorid($_SESSION['Userid']);
         echo $_SESSION['Userid'];
         $returnvalue = $this->model->fetchBookByCategory($dto);
         if($returnvalue)
         {
               //$this->displayBook();
               $data =[
                "data"=>$dto->getBook()
               ];
               return new ViewDTO(
                    "app/view/authordash","welcome.html.twig",$data
               );
         }
         else
         {
             $this->msg = "start your journey by publishing books";
             //$this->view->displayAuthorMessage($this->msg);
             $data =[
                "data"=>$this->msg
             ];
             return new ViewDTO(
                "app/view/authordash","Authormessage.html.twig",$data
             ); 

         }
         //echo "<h1 style='font-size:50px;'> from author welcomepage controller</h1>";
    }
    protected function displayMesage():void
    {
        //$this->view->displayAuthorMessage($this->msg);
    }
    public function displayBook():void
    {
            $book= $this->dto->getBook();
            //$this->view->welcomePage($book);
    }
}
