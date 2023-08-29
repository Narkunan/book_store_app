<?php

if(isset($_COOKIE['PHPSESSID']))
{
    session_start();
    
    if($_SESSION["loggedUser"]=="user")
    {
        header("Location: ../View/UserDash/LoginView.php");
    }
    else  if($_SESSION["loggedUser"]=="author")
    {
        header("Location: ../View/authordash/Loginview.php");
    }
    else if($_SESSION['loggedUser']=="Dual")
    {
        header("Location: ../../public/assets/html/author/chooseRole.html");
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