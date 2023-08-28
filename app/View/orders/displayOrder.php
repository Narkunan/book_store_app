<?php
namespace App\View\orders;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
class displayOrder
{
    public function displayOrders($loggedUser,$name,$book)
    {
        $loader = new FilesystemLoader('../../view/orders');
        $twig=new Environment($loader);
        $template=$twig->load('ordersView.html.twig');
        $quantity = $book['quantity'];
        $price = $book['bprice'];
        $bid = $book['bid'];
        $title = $book['btitle'];
        $source = $book['imagesource'];
        echo $template->render(
            ['session'=>$loggedUser,'name'=>$name,'title'=>$title,
            'bid'=>$bid,'source'=>$source,'quantity'=>$quantity,'price'=>$price]);

    }
}