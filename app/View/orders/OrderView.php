<?php
namespace App\View\orders;
use App\Model\Home\category;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
/**
 * displayOrder will display total price 
 * and similarBooks
 */
class OrderView
{
    /**
     * displayOrder will display 
     * 
     * details like total price title
     * 
     * and similarBook 
     *
     *
     * @param string $loggedUser
     * @param string $name
     * @param array $book
     * @param array $similarBooks
     * @return void
     */
    public function displayOrders(string $loggedUser,string $name,array $book,float $totalPrice, array $similarBooks)
    {
        $loader = new FilesystemLoader('app/view/orders');
        $twig=new Environment($loader);
        $template=$twig->load('ordersView.html.twig');
        $bid = $book['bid'];
        $title = $book['btitle'];
        $source = $book['imagesource'];
        $quantity=$book['quantity'];
        $cat =new category();
        $categorys = $cat->category();
        echo $template->render(
            ['session'=>$loggedUser,'name'=>$name,'title'=>$title,
            'bid'=>$bid,'source'=>$source,'price'=>$totalPrice,'category'=>$categorys,'similar'=>$similarBooks,
        'quantity'=>$quantity]);

    }
}