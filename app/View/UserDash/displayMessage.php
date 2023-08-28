<?php
namespace App\View\Userdash;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
class DisplayMessage
{
    public function userMessage($msg,$loggedUser,$name)
    {
      $loader = new FilesystemLoader('../../view/display');
      $twig=new Environment($loader);
      $template=$twig->load('UserMessage.html.twig');
      echo $template->render(['data'=>$msg,'session'=>$loggedUser,'name'=>$name]);
    }
    public function editProfile($data,$loggedUser,$name)
    {
      
      $loader = new FilesystemLoader('../../view/UserDash');
      $twig=new Environment($loader);
      $template=$twig->load('EditProfileView.html.twig');
      echo $template->render(['data'=>$data,'session'=>$loggedUser,'name'=>$name]);
      
    }
    public function recentOrders($data,$loggedUser,$name)
    {
      $loader = new FilesystemLoader('../../view/UserDash');
      $twig=new Environment($loader);
      $template=$twig->load('RecentOrderView.html.twig');
      echo $template->render(['data'=>$data,'session'=>$loggedUser,'name'=>$name]);
    }

}