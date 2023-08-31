<?php
namespace App\View\authordash;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
/**
 * displaymessageauthor will
 * 
 * handle all view related for authordash
 */
class DisplayMessageAuthor
{
   private Environment $twig;

   private $template;
   public function __construct()
   {
      $loader = new FilesystemLoader('../../view/authordash');
      $this->twig=new Environment($loader);
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
   public function displayAuthorMessage(string $msg,string $loggedUser,string $name)
   {
      
      $this->template=$this->twig->load('AuthorMessage.html.twig');
      echo $this->template->render(['data'=>$msg,'session'=>$loggedUser,'name'=>$name]);
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
   public function displayEditBookView(array $book,string $loggedUser,string $name)
   {
      
      $this->template=$this->twig->load('EditBookView.html.twig');
      echo $this->template->render(['data'=>$book,'session'=>$loggedUser,'name'=>$name]);
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
   public function displayEditSpecificBook(array $book,string $loggedUser,string $name)
   {
      
      $this->template=$this->twig->load('EditSpecificBookView.html.twig');
      echo $this->template->render(['data'=>$book,'session'=>$loggedUser,'name'=>$name]);
   }
   /**
    * deleteBook will display
    *
    * books can delete
    *
    * @param array $book
    * @param string $loggedUser
    * @param string $name
    * @return void
    */
   public function deleteBook(array $book,string $loggedUser,string $name)
   {
      
      $this->template=$this->twig->load('DeleteBookView.html.twig');
      echo $this->template->render(['data'=>$book,'session'=>$loggedUser,'name'=>$name]);
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
   public function publishedBook(array $book,string $loggedUser,string $name)
   {
   
      $this->template=$this->twig->load('PublishedBookView.html.twig');
      echo $this->template->render(['data'=>$book,'session'=>$loggedUser,'name'=>$name]);
   }

}


