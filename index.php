<?php
require "vendor/autoload.php";
use App\service\container;
session_start();
$request = $_GET['action']??" ";
$container = new container();
$value = array();

switch ($request) {
    
    case "home":
        header("Location: public/assets/html/first.php");
        break;

    case 'login':
        header("Location: public/assets/html/accounts/login.php");
        break;

    case 'register':
        header("Location: public/assets/html/accounts/register.php");
        break;

    case 'forget':
        header("Location: public/assets/html/accounts/forget.php");
        break;

    case 'loginuser':
        $loginuser = $container->get("login");
        $loginuser->inputData($_POST);
        $loginuser->LoginAuthorController();
        break;

    case "registeruser":
        
        $registerUser = $container->get("register");
        $registerUser->inputData($_POST);
        $registerUser->registerAuthorController();
        break;

    case "forgetuser":
        $forgetuser = $container->get("forget");
        $forgetuser->inputData($_POST);
        $forgetuser->forgetController();
        break;

    case "chooserole":
        header("Location: public/assets/html/accounts/chooserole.html");
        break;

    case "AuthorWelcome":
        $welcome = $container->get("AuthorWelcomePage");
        $welcome->welcomeAuthordash();
        break;

    case "deletebook":
        $deletebook = $container->get("deletebook");
        $deletebook->deletedBookController($_GET['id']);
        break;

    case "listbook":
        $listbook = $container->get("listbook");
        $listbook->listBookManager();
        break;

    case "salesreport":
        $salesreport = $container->get("salesreport");
        $salesreport->salesReportController();
        break;

    case "updatebook":
        $updatebook = $container->get("updatebook");
        $updatebook->inputData($_POST);
        $updatebook->updateBookController();
        break;

    case "publishbook":
          header("Location: app/view/authordash/PublishPlatform.php");
          break;

    case "createBook":
          $publishBook = $container->get("publishplatform");
          $publishBook->inputData($_POST);
          $publishBook->publishBookManager();
          break;

    case "editbook":
         $editbook = $container->get("editbook");
         $editbook->editBookController($_GET['id']);
         break;

    case "becomeuser":
          $becomeUser = $container->get("becomeuser");
          $becomeUser->becomeUserController();
          break;

    case "bookdetails":
         $bookdetails = $container->get("bookdetails");
         $bookdetails->findBook($_GET);
         break;

    case "checkout":
         $checkout = $container->get("checkout");
         $checkout->checkoutcontroller($_POST);
         break;

    case "category":
         $category = $container->get("category");
         $category->findBook($_GET);
         break;

    case "searchbook":
         $searchModel = $container->get("searchByTitle");
         $searchModel->findBook($_GET);
         break;

    case "recentorder":
         $recentorder = $container->get("recentorder");
         $recentorder->executeAction($value);
         break;

    case "editprofile":
         $editprofile = $container->get("editprofile");
         $editprofile->executeAction($value);
         break;

    case "updateprofile":
         $updateprofile = $container->get("updateprofile");
         $updateprofile->executeAction($_POST);
         break;

    case "becomeauthor":
          $becomeAuthor = $container->get("becomeauthor");
          $becomeAuthor->executeAction($value);
          break;

    case "orderconfirm":
          $orderconfirm = $container->get("orderconfirm");
          $orderconfirm->ordersConfirmController($_POST);
          break;

    case "userwelcomepage":
          header("Location: app/view/UserDash/LoginView.php");
          break;

    case "logout":
          header("Location: app/controller/accounts/logout.php");
          break;
    case "userredirect":
          header("Location: app/controller/UserRedirect.php");
          break;

    default :
          echo "error 404 page not found.php";
          break;         
}