<?php
namespace App\Controller;
error_reporting(0);
use App\View\ViewDTO;

class UserRedirect
{
    public function userRedirectController(array $value):ViewDTO
    {

            //session_start();
    
            if($_SESSION["loggedUser"]=="user")
            {
                echo "user";
                header("Location: /userwelcome");
            }
            else  if($_SESSION["loggedUser"]=="author")
            {
                 echo "author";
                 header("Location: /welcomeauthor");
            }   
            else if($_SESSION['loggedUser']=="Dual")
            {
                echo "dual";
                //header("Location: ../../public/assets/html/accounts/chooseRole.html");
                $data = [];
                return new ViewDTO(
                "app/View/accounts","chooseRole.html.twig",$data
                 );
            }
        else
        {
            echo "please login";
            //header("Location: ../../public/assets/html/accounts/login.php");
            $data=[];
            return new ViewDTO(
             "app/view/accounts","login.html.twig",$data
            );
        }

    }
}