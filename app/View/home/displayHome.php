<?php
namespace App\View\home;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use App\Model\category\category;
class displayHome
{
    public function displayBook($loggedUser,$name,$categorys,$book)
    {
        $loader = new FilesystemLoader('../../view/home');
        $twig=new Environment($loader);
        $template=$twig->load('SearchByTitleView.html.twig');
        echo $template->render(['session'=>$loggedUser,'name'=>$name,'category'=>$categorys,'book'=>$book]);
    }
    public function displayMessage($msg,$loggedUser,$name,$categorys)
    {
        $loader = new FilesystemLoader('../../view/display');
        $twig=new Environment($loader);
        $template=$twig->load('HomeDisplayMessage.html.twig');
        echo $template->render(['data'=>$msg,'session'=>$loggedUser,'name'=>$name,'category'=>$categorys]);
    }
    public function displaySelectedBook($book,$loggedUser,$name)
    {
        $loader = new FilesystemLoader('../../view/home');
        $twig=new Environment($loader);
        $template=$twig->load('indexView.html.twig');
        echo $template->render(['data'=>$book,'session'=>$loggedUser ,'name'=>$name]);
    }
    public function displayMessages($msg,$loggedUser,$name)
    {
        $category = new category();
        $categorys = $category->category();
        $loader = new FilesystemLoader('../../view/display');
        $twig=new Environment($loader);
        $template=$twig->load('HomeDisplayMessage.html.twig');
        echo $template->render(['data'=>$msg,'session'=>$loggedUser,'name'=>$name,'category'=>$categorys]);   
    }
}