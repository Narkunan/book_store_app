<?php
namespace App\Controller\accounts;

use App\View\ViewDTO;

/**
 * logout Page is responsible for 
 * 
 * logout user by unsetting session variable
 * 
 * and destroy the session.
 */

 class Logout
 {
    public function logoutController(array $value)
    {

        //session_start();
        session_unset();
        session_destroy();
        setcookie(session_name(),"",time()-3600,"/");
        $data =[];
        header("Location: /");
        
    }
 }





