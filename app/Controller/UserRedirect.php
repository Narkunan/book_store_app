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
        header("Location: accounts/AuthorWelcomePage.php");
    }
    else if($_SESSION['loggedUser']=="Dual")
    {
        header("Location: ../../public/assets/html/accounts/chooseRole.html");
    }
    else
    {
        header("Location: ../../public/assets/html/accounts/login.php");
    }
}
else
{
    header("Location: ../../public/assets/html/accounts/login.php?msg=Please Login");
}