<?php
namespace App\Controller\accounts;
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
    public function __construct($model,$view)
    {
       $this->model = $model;
       $this->view = $view;
    }
    public function welcomeAuthordash()
    {
         $this->model->setAuthorid($_SESSION['Userid']);
         $returnvalue = $this->model->fetchBookByCategory();
         if($returnvalue)
         {
               $book= $this->model->getBook();
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
$model = new WelcomePageModel();
$view = new AuthorDashView();
$loginview =new AuthorWelcomePage($model,$view);
$loginview->welcomeAuthordash();