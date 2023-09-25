<?php
namespace App\Controller\authordash;
use App\Controller\authordash\AuthorDashBase;
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
    public function welcomeAuthordash()
    {
         $this->AuthorDashDTO->setAuthorid($_SESSION['Userid']);
         echo $_SESSION['Userid'];
         $returnvalue = $this->model->fetchBookByCategory($this->AuthorDashDTO);
         if($returnvalue)
         {
               $book= $this->AuthorDashDTO->getBook();
               $this->logguser = $_SESSION['loggedUser'];
               $this->name = $_SESSION['UserName'];
               
               $this->view->welcomePage($book,$this->loggedUser,$this->name);
         }
         else
         {
             $this->msg = "start your journey by publishing books";
             $this->loggeduser = $_SESSION['loggedUser'];
             $this->name = $_SESSION['UserName'];
             $this->view->displayAuthorMessage($this->msg,$this->loggedUser,$this->name);
         }
    }
}
