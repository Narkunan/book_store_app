<?php
/**
 * importing required files;
 */
require "router/route.php";
require "router/routes.php";
require "vendor/autoload.php";

use App\Controller\SessionExtension;
use App\View\ViewRenderer;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

/**
 * starting the session
 */
session_start();

$routes = require "route.php";

$routes = $routes->getRoutes();

$urlPath = $_SERVER["PATH_INFO"]??$_SERVER['REQUEST_URI'];

if (array_key_exists($urlPath,$routes)) {

    $route = $routes[$urlPath];
    $controller = $route->getClassname();
    $action = $route->getMethod();
    $view = $controller->$action($route->getRequest_Method());
    $loader = new FilesystemLoader($view->directory);
    $twig=new Environment($loader);
    $twig->addExtension(new SessionExtension());
    $viewrenderer = new ViewRenderer($twig);
    $viewrenderer->render($view);

  } else {

   echo "<h1 style='font-size:200px;color:red;'>error 404 not found</h1>";
  }
  


