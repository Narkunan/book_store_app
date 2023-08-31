<?php
namespace App\View\home;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use App\Model\Home\category;

/**
 * displayHome class Will handle View 
 * 
 * related to Home Page.
 */
class displayHome
{
    /**
     * this will display by title or book id
     *
     * @param string $loggedUser
     * @param string $name
     * @param array $categorys
     * @param array $book
     * @return void
     */
    public function displayBook(string $loggedUser,string $name,array $categorys,array $book)
    {
        $loader = new FilesystemLoader('../../view/home');
        $twig=new Environment($loader);
        $template=$twig->load('SearchByTitleView.html.twig');
        echo $template->render(['session'=>$loggedUser,'name'=>$name,'category'=>$categorys,'book'=>$book]);
    }
    /**
     * displayMessage will display 
     * message to user like book not found.
     *
     * @param string $msg
     * @param string $loggedUser
     * @param string $name
     * @param array $categorys
     * @return void
     */
    public function displayMessage(string $msg,string $loggedUser,string $name,array $categorys)
    {
        $loader = new FilesystemLoader('../../view/home');
        $twig=new Environment($loader);
        $template=$twig->load('HomeDisplayMessage.html.twig');
        echo $template->render(['data'=>$msg,'session'=>$loggedUser,'name'=>$name,'category'=>$categorys]);
    }
    /**
     * displaySelectedBook Will display
     * 
     * all the details about selectedBook
     *
     * @param array $book
     * @param string $loggedUser
     * @param string  $name
     * @return void
     */
    public function displaySelectedBook(array $book,string $loggedUser,string $name)
    {
        $loader = new FilesystemLoader('../../view/home');
        $twig=new Environment($loader);
        $template=$twig->load('indexView.html.twig');
        echo $template->render(['data'=>$book,'session'=>$loggedUser ,'name'=>$name]);
    }
    /**
     * displayMessages will display message on the home
     * page.
     *
     * @param string $msg
     * @param string $loggedUser
     * @param string $name
     * @return void
     */
    public function displayMessages(string $msg,string $loggedUser,string $name)
    {
        $category = new category();
        $categorys = $category->category();
        $loader = new FilesystemLoader('../../view/home');
        $twig=new Environment($loader);
        $template=$twig->load('HomeDisplayMessage.html.twig');
        echo $template->render(['data'=>$msg,'session'=>$loggedUser,'name'=>$name,'category'=>$categorys]);   
    }
}
