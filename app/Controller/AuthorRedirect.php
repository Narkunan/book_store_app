<?php

if(isset($_COOKIE['PHPSESSID']))
{
    session_start();
    
    if(isset($_SESSION['authorname'])&&empty($_SESSION['username']))
    {
        header("Location: ../View/author/LoginView.php");
    }
    else if(isset($_SESSION['username'])&&empty($_SESSION['authorname']))
    {
        header("Location: ../../public/assets/html/author/login.php?msg=Please Log out As user and login as author");
    }
    else
    {
        header("Location: ../../public/assets/html/author/login.php");
    }
}
else
{
    header("Location: ../../public/assets/html/author/login.php?msg=Please Login");
}