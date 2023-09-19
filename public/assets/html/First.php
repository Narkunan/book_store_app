<?php
require "../../../vendor/autoload.php";
session_start();
use App\Model\Home\HomeDTO;
use App\Model\Home\IndexModel;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use App\Model\Home\category;
class first 
{
    private $homeDTo;
    private $indexmodel;
    private $category;
    public function __construct()
    {
        $this->category= new category();
        $this->indexmodel=new IndexModel();
        $this->homeDTo = new HomeDTO();
    }
    public function displayBook()
    {
        $loggeduser = $_SESSION['loggedUser']??"login";
        $name = $_SESSION['UserName']??"login";
        $loader = new FilesystemLoader('../html');
        $twig=new Environment($loader);
        $template=$twig->load('home.html.twig');
        $categorys = $this->category->category(); 
        $this->indexmodel->fetchBook($this->homeDTo);
        $product=$this->homeDTo->getFetchBook();
        echo $template->render(['session'=>$loggeduser,'name'=>$name,'category'=>$categorys,'book'=>$product]);
    
    }
    
}
$home =new first();
        $home->displayBook();


      
    