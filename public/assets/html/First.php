<?php
require "../../../vendor/autoload.php";
use App\Model\Home\IndexModel;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use App\Model\Home\category;
session_start();
class home
{
    public function displayBook($loggedUser,$name)
    {
        $loader = new FilesystemLoader('../html');
        $twig=new Environment($loader);
        $template=$twig->load('home.html.twig');
        $cate= new category();
        $categorys = $cate->category();
        $IndexModel=new IndexModel();
        $IndexModel->FetchBook();
        $product=$IndexModel->getFetchBook();
        echo $template->render(['session'=>$loggedUser,'name'=>$name,'category'=>$categorys,'book'=>$product]);
    
    }
}
$home =new home();
$loggeduser = $_SESSION['loggedUser']??" login please";
$name = $_SESSION['UserName']??" login please";
$home->displayBook($loggeduser,$name);
      
    