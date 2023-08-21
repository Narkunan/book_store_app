<?php
namespace App\Controller\home;
require "../../../vendor/autoload.php";
use App\Model\Home\HomeModel;
use App\View\home\IndexView;
/**
 * indexController is for Display book in home page.
 */

class indexController
{
    private $Homemodel;
    
    private $homeview;

    /**
     * initializes the loginmodel object
     * 
     * and homeviewobject.
     *
     * @param HomeModel $loginmodel
     * @param IndexView $homeview
     */
    public function __construct($loginmodel,$homeview)
    {
      $this->Homemodel=$loginmodel;
      $this->homeview=$homeview;
    }

    /**
     * By using bookid display all details of book.
     *
     * @return void
     */
    public function HomeController()
    {
       $this->Homemodel->setBookId($_GET["id"]);
       if($this->Homemodel->getBookdata())
       {
       $this->homeview->displayBook($this->Homemodel);
       }
       else
       {
         echo "<h1>Nothing to Fetch or No Book Found</h1>";
       }
       
    }
}
$homemodel=new HomeModel();
$homeview=new IndexView();
$indexController=new indexController($homemodel,$homeview);
$indexController->HomeController();
