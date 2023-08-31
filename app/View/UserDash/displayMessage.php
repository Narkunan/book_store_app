<?php
namespace App\View\Userdash;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
/**
 * displayMessage will display user realted stuffs
 * 
 */
class DisplayMessage
{
    /**
     * userMessage will responsible for display message to the user
     *
     * @param string $msg
     * @param string $loggedUser
     * @param string $name
     * @return void
     */
    public function userMessage(string $msg,string $loggedUser,string $name)
    {
      $loader = new FilesystemLoader('../../view/UserDash');
      $twig=new Environment($loader);
      $template=$twig->load('UserMessage.html.twig');
      echo $template->render(['data'=>$msg,'session'=>$loggedUser,'name'=>$name]);
    }
    /**
     * editprofile will display user data.
     *
     * @param array $data
     * @param string $loggedUser
     * @param string $name
     * @return void
     */
    public function editProfile(array $data,string $loggedUser,string $name)
    {
      
      $loader = new FilesystemLoader('../../view/UserDash');
      $twig=new Environment($loader);
      $template=$twig->load('EditProfileView.html.twig');
      echo $template->render(['data'=>$data,'session'=>$loggedUser,'name'=>$name]);
      
    }
    /**
     * recentorders will display recent orders
     *
     * @param array $data
     * @param string $loggedUser
     * @param string $name
     * @return void
     */
    public function recentOrders(array $data,string $loggedUser,string $name)
    {
      $loader = new FilesystemLoader('../../view/UserDash');
      $twig=new Environment($loader);
      $template=$twig->load('RecentOrderView.html.twig');
      echo $template->render(['data'=>$data,'session'=>$loggedUser,'name'=>$name]);
    }

}