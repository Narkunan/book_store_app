<?php

if(isset($_COOKIE['PHPSESSID']))
{
    session_start();
    
    if(isset($_SESSION['authorname']))
    {
        header("Location: ../View/author/LoginView.php");
    }
    else
    {
        header("Location: ../../public/assets/html/author/login.php?msg=Please Login As Author");
    }
}
else
{
    header("Location: ../../public/assets/html/author/login.php?msg=Please Login As Author");
}