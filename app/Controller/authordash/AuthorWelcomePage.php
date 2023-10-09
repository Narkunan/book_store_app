<?php
namespace App\Controller\authordash;
use App\Controller\authordash\AuthorDashBase;
use App\Model\authordash\AuthordashDTO;
use App\Model\authordash\WelcomePageModel;
use App\View\ViewDTO;
/**
 * Author Welcome Page is responsible for 
 * 
 * for showing things like how many they have published
 * 
 * by category and also number of book.
 * 
 */
class AuthorWelcomePage extends AuthorDashBase implements DisplayDataI
{
    private WelcomePageModel $model;
    public function __construct(WelcomePageModel $model)
    {
        $this->model = $model;

    }
    public function welcomeAuthordash(array $value):ViewDTO
    {
         $dto = new AuthordashDTO(); 
         $dto->setAuthorid($_SESSION['Userid']);
         echo $_SESSION['Userid'];
         $returnvalue = $this->model->fetchBookByCategory($dto);
         if($returnvalue)
         {
               $this->data =[
                "data"=>$dto->getBook()
               ];
               return $this->displayBook();    
         }
         else
         {  
             $this->data =[
                "data"=>"start your journey by publishing books"
             ];
              return $this->displayMesage();
         }
    }
    public function displayBook():ViewDTO
    {
        return new ViewDTO(
            "app/view/authordash","welcome.html.twig",$this->data
       );
    }
}
