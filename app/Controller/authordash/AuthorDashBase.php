<?php
namespace App\Controller\authordash;
require "../../../vendor/autoload.php";
use App\View\authordash\DisplayMessageAuthor;


abstract class AuthorDashBase
{
    protected $model;
    protected DisplayMessageAuthor $view;

    public function __construct($model)
    {
        $this->model = $model;
        $this->view =new DisplayMessageAuthor();
    }
}