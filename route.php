<?php

use App\service\Container;
use App\Controller\accounts\LoginUser;
use App\Controller\authordash\ListBook;
use App\Controller\authordash\SalesReport;
use App\Controller\orders\OrderConfirm;
use App\Controller\accounts\RegisterUser;
use App\Controller\accounts\Forget;
use App\Controller\authordash\AuthorWelcomePage;
use App\Controller\authordash\BecomeUser;
use App\Controller\authordash\DeleteBook;
use App\Controller\authordash\EditBook;
use App\Controller\authordash\publishPlatformController;
use App\Controller\authordash\UpdateBook;
use App\Controller\home\bookdetails;
use App\Controller\home\categoryController;
use App\Controller\home\SearchByTitle;
use App\Controller\orders\checkout;
use App\Controller\UserDash\BecomeAuthor;
use App\Controller\UserDash\editprofile;
use App\Controller\UserDash\RecentOrder;
use App\Controller\UserDash\UpdateProfile;
use App\Controller\accounts\Forgetform;
use App\Controller\accounts\Loginform;
use App\Controller\accounts\Registerform;
use App\Controller\accounts\chooseRole;
use App\Controller\UserRedirect;
use App\Controller\accounts\Logout;
use App\Controller\authordash\CreateBookForm;
use App\Controller\home\Firsts;
use App\Controller\UserDash\WelcomeUser;

$value = array();

$container = new Container();

$routes = new routes();

$values=[
    "/"=>[
        Firsts::class,"displayBook",$value
    ],
    "/login"=>[
        LoginUser::class,"inputData",$_POST
    ],
    "/register"=>[
        RegisterUser::class,"inputData",$_POST
    ],
    "/forget"=>[
        Forget::class,"inputData",$_POST
    ],
    "/welcomeauthor"=>[
        AuthorWelcomePage::class,"welcomeAuthordash",$_POST
    ],
    "/deletebook"=>[
        DeleteBook::class,"deleteBookController",$_GET
    ],
    "/listbook"=>[
        ListBook::class,"listBookManager",$value
    ],
    "/salesreport"=>[
        SalesReport::class,"salesReportController",$value
    ],
    "/updatebook"=>[
        UpdateBook::class,"updateBookController",$_POST
    ],
    "/publishbook"=>[
        publishPlatformController::class,"publishBook",$_POST
    ],
    "/editbook"=>[
        EditBook::class,"editBookController",$_GET
    ],
    "/becomeuser"=>[
        BecomeUser::class,"becomeUserController",$value
    ],
    "/bookdetails"=>[
        bookdetails::class,"findBook",$_GET
    ],
    "/checkout"=>[
        checkout::class,"checkoutcontroller",$_POST
    ],
    "/category"=>[
        categoryController::class,"findBook",$_GET
    ],
    "/searchbook"=>[
        SearchByTitle::class,"findBook",$_GET
    ],
    "/recentorder"=>[
        RecentOrder::class,"executeAction",$value
    ],
    "/editprofile"=>[
        editprofile::class,"executeAction",$value
    ],
    "/updateprofile"=>[
        UpdateProfile::class,"executeAction",$_POST
    ],
    "/becomeauthor"=>[
        BecomeAuthor::class,"executeAction",$value
    ],
    "/orderconfirm"=>[
        OrderConfirm::class,"ordersConfirmController",$_POST
    ],
    "/loginform"=>[
        Loginform::class,"loginFormController",$value
    ],
    "/registerform"=>[
        Registerform::class,"registerFormController",$value
    ],
    "/forgetform"=>[
        Forgetform::class,"forgetFormController",$value
    ],
    "/logout"=>[
        Logout::class,"logoutController",$value
    ],
    "/userredirect"=>[
        UserRedirect::class,"userRedirectController",$value
    ],
    "/chooserole"=>[
        chooseRole::class,"chooseRoleController",$value
    ],
    "/createbookform"=>[
        CreateBookForm::class,"createBookFormController",$value
    ],
    "/userwelcome"=>[
        WelcomeUser::class,"welcomeUserController",$value
    ]

];

foreach($values as $key=>$value)
{
    $controller = $container->get($value[0]);
    $routes->addRoute(new Route($key,$controller,$value[1],$value[2]));
} 


return $routes;