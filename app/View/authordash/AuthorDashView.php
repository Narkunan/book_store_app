<?php
namespace App\View\authordash;
use App\Controller\SessionExtension;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
/**
 * displaymessageauthor will
 * 
 * handle all view related for authordash
 */
class AuthorDashView
{
   private Environment $twig;
   private $template;
   public function __construct()
   {
      $loader = new FilesystemLoader('app/view/authordash');
      $this->twig=new Environment($loader);
      $this->twig->addExtension(new SessionExtension());
   }
   /**
    * displayAuthorMessage will displayMessages 
    *
    * to the author
    *
    * @param string $msg
    * @param string $loggedUser
    * @param string $name
    * @return void
    */
   public function displayAuthorMessage(string $msg):void
   {
      
      $this->template=$this->twig->load('AuthorMessage.html.twig');
      echo $this->template->render(['data'=>$msg]);
   }
   /**
    * displayEditBookView will display books to edit
    *
    *
    * @param array $book
    * @param string $loggedUser
    * @param string  $name
    * @return void
    */
   public function displayEditBookView(array $book):void
   {
      
      $this->template=$this->twig->load('ListBook.html.twig');
      echo $this->template->render(['data'=>$book]);
   }
   /**
    * displayEditSpecificBook will display
    * 
    * user choosen book data
    *
    * @param array $book
    * @param string $loggedUser
    * @param string  $name
    * @return void
    */
   public function displayEditSpecificBook(array $book):void
   {
      
      $this->template=$this->twig->load('EditBookView.html.twig');
      echo $this->template->render(['data'=>$book]);
   }
   
   /**
    * publishBook will display the report of
    *
    * published Books
    *
    * @param array $book
    * @param string $loggedUser
    * @param string $name
    * @return void
    */
   public function salesReport(array $book):void
   {
   
      $this->template=$this->twig->load('SalesReportView.html.twig');
      echo $this->template->render(['data'=>$book]);
   }
   /**
    * WelcomePage function will redirect to welcome page view
    * 
    * which shows no of books published by category.
    *
    * @param array $book
    * @param string $loggedUser
    * @param string $name
    * @return void
    */
   public function welcomePage(array $book):void
   {
      $this->template=$this->twig->load("welcome.html.twig");
      echo $this->template->render(['data'=>$book]);
   }

}


