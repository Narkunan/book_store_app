<?php
namespace App\View\authordash;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
class DisplayMessageAuthor
{
   public function displayAuthorMessage($msg,$loggedUser,$name)
   {
      $loader = new FilesystemLoader('../../view/display');
      $twig=new Environment($loader);
      $template=$twig->load('AuthorMessage.html.twig');
      echo $template->render(['data'=>$msg,'session'=>$loggedUser,'name'=>$name]);
   }
   public function displayEditBookView($book,$loggedUser,$name)
   {
      $loader = new FilesystemLoader('../../view/authordash');
      $twig=new Environment($loader);
      $template=$twig->load('EditBookView.html.twig');
      echo $template->render(['data'=>$book,'session'=>$loggedUser,'name'=>$name]);
   }
   public function displayEditSpecificBook($book,$loggedUser,$name)
   {
      
      $loader = new FilesystemLoader('../../view/authordash');
      $twig=new Environment($loader);
      $template=$twig->load('EditSpecificBookView.html.twig');
      echo $template->render(['data'=>$book,'session'=>$loggedUser,'name'=>$name]);
   }
   public function deleteBook($book,$loggedUser,$name)
   {
      
      $loader = new FilesystemLoader('../../view/authordash');
      $twig=new Environment($loader);
      $template=$twig->load('DeleteBookView.html.twig');
      echo $template->render(['data'=>$book,'session'=>$loggedUser,'name'=>$name]);
   }
   public function publishedBook($book,$loggedUser,$name)
   {
      $loader = new FilesystemLoader('../../view/authordash');
      $twig=new Environment($loader);
      $template=$twig->load('PublishedBookView.html.twig');
      echo $template->render(['data'=>$book,'session'=>$loggedUser,'name'=>$name]);
   }

}


