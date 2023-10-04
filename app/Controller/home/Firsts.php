<?php
namespace App\Controller\home;
use App\Model\Home\HomeDTO;
use App\Model\Home\IndexModel;
use App\View\ViewDTO;
use App\Model\Home\category;
class Firsts 
{
    //private $homeDTo;
    private $indexmodel;
    private $category;
    public function __construct()
    {
        $this->category= new category();
        $this->indexmodel=new IndexModel();
        //$this->homeDTo = new HomeDTO();
    }
    public function displayBook(array $value)
    {
        //$loggeduser = $_SESSION['loggedUser']??"login";
        //$name = $_SESSION['UserName']??"login";
        $homeDto = new HomeDTO();
        //$loader = new FilesystemLoader('public/assets/html');
        //$twig=new Environment($loader);
        //$template=$twig->load('home.html.twig');
        $categorys = $this->category->category(); 
        $this->indexmodel->fetchBook($homeDto);
        $product=$homeDto->getFetchBook();
        $data=[
            "category"=>$categorys,
            "book"=>$product
        ];
        //echo $template->render(['session'=>$loggeduser,'name'=>$name,'category'=>$categorys,'book'=>$product]);
        return new ViewDTO(
            "app/view/home","SearchByTitleView.html.twig",$data
        );
    }
    
}



      
    