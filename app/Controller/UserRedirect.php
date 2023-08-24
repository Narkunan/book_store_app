<?php

if(isset($_COOKIE['PHPSESSID']))
{
    session_start();
    
    if(isset($_SESSION['username'])&&empty($_SESSION['authorname']))
    {
        header("Location: ../View/user/LoginView.php");
    }
    else  if(isset($_SESSION['authorname'])&&empty($_SESSION['username']))
    {
        header("Location: ../../public/assets/html/user/login.php?msg=Please Log out As Author and login as user");
    }
    else
    {
        header("Location: ../../public/assets/html/user/login.php");
    }
}
else
{
    header("Location: ../../public/assets/html/user/login.php?msg=Please Login");
}