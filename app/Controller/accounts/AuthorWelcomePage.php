<?php
namespace App\Controller\accounts;
use App\Model\authordash\AuthordashDTO;
use App\Model\authordash\WelcomePageModel;
use App\View\authordash\AuthorDashView;
/**
 * Author Welcome Page is responsible for 
 * 
 * for showing things like how many they have published
 * 
 * by category and also number of book.
 * 
 */
class AuthorWelcomePage
{
    private WelcomePageModel $model;
    private AuthorDashView $view;
    private AuthordashDTO $dto;
    public function __construct($model,$dto)
    {
       $this->model = $model;
       $this->dto = $dto;
       $this->view = new AuthorDashView();
    }
    public function welcomeAuthordash()
    {
         $this->dto->setAuthorid($_SESSION['Userid']);
         $returnvalue = $this->model->fetchBookByCategory($this->dto);
         if($returnvalue)
         {     
               $book= $this->dto->getBook();
               $logguser = $_SESSION['loggedUser'];
               $name = $_SESSION['UserName'];
               $this->view->welcomePage($book,$logguser,$name);
         }
         else
         {
             $msg = "start your journey by publishing books";
             $logguser = $_SESSION['loggedUser'];
             $name = $_SESSION['UserName'];
             $this->view->displayAuthorMessage($msg,$logguser,$name);
         }
    }
}
