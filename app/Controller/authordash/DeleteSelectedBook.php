<?php
namespace App\Controller\authordash;
require "../../../vendor/autoload.php";
use App\Model\authordash\DeleteSelectedBookModel;
use App\View\authordash\BookPublishConfirm;

class DeleteSelectedBook
{
   private DeleteSelectedBookModel $deleteselectedbookmodel;

   private BookPublishConfirm $bookpublishConfirm;
   public function __construct($deleteSelectedBookModel,$bookpublishConfirm)
   {
     $this->deleteselectedbookmodel=$deleteSelectedBookModel;
     $this->bookpublishConfirm=$bookpublishConfirm;
   }
   public function deletedSelectedBookController()
   {
     $this->deleteselectedbookmodel->setBookid($_GET['id']);
     $coverimg=$this->deleteselectedbookmodel->deleteBookCoverPage();
     if($coverimg)
     {
      $path="../../Model/upload/".$this->deleteselectedbookmodel->getCoverPage();
       if(file_exists($path))
       {
        echo "file exists";
         unlink($path);
       }
      
     }
     $reult=$this->deleteselectedbookmodel->deleteBook();
     if($reult)
     {
        $this->bookpublishConfirm->displayBook("your Most Recent Request For Delete Book Was Accomplished");
     }
     else
     {
        echo "<h1>encountred Problem With Deleting Book ";
     }
   }
}
$deleteSelectedBookModel = new DeleteSelectedBookModel();
$bookpublishConfirm= new BookPublishConfirm();
$DeleteSelectedBook= new DeleteSelectedBook($deleteSelectedBookModel,$bookpublishConfirm);
$DeleteSelectedBook->deletedSelectedBookController();