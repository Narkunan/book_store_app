<?php
namespace App\service;
use App\Model\accounts\ForgetModel;
use App\Model\accounts\LoginModel;
use App\Model\accounts\RegisterModel;
use App\Model\authordash\BecomeUserModel;
use App\Model\authordash\ListBookModel;
use App\Model\authordash\SalesReportModel;
use App\Model\authordash\WelcomePageModel;
use App\Model\Home\CategoryModel;
use App\Model\Home\bookdetailsModel;
use App\Model\Home\SearchByTitleModel;
use App\Model\orders\checkOut;
use App\Model\orders\ordersModel;
use App\Model\authordash\BookModel;
use App\Model\UserDash\BecomeAuthorModel;
use App\Model\UserDash\EditProfileModel;
use App\Model\UserDash\RecentOrderModel;
use App\Model\UserDash\UpdateProfileModel;
use Psr\Container\ContainerInterface;
class ModelContainer implements ContainerInterface
{
    public LoginModel $login; 
    public RegisterModel $register;
    public ForgetModel $forget;
    public WelcomePageModel $authorwelcomepage;
    public BecomeUserModel $becomeuser;
    public BookModel $bookmodel;
    public ListBookModel $listbook;
    public SalesReportModel $salesreport;
    public CategoryModel $category;
    public bookdetailsModel $bookdetails;
    public SearchByTitleModel $searchbytitle;
    public ordersModel $ordercontroller;
    public  $checkout;
    public BecomeAuthorModel $becomeauthor;
    public EditProfileModel $editprofile;
    public UpdateProfileModel $updateprofile;
    public RecentOrderModel $recentorder;

    public function get(string $name):mixed
    {
        if($name === "loginM")
        {
          
            $this->login = new LoginModel();
            return $this->login;
        }
        else if($name === "registerM")
        {
          $this->register = new RegisterModel();
          return $this->register;
        }
        else if($name === "forgetM")
        {
          $this->forget = new ForgetModel();
          return $this->forget;
        }
        else if($name === "AuthorWecomePageM")
        {
          $this->authorwelcomepage = new WelcomePageModel();
          return $this->authorwelcomepage;
        }
        else if($name === "becomeuserM")
        {
          $this->becomeuser = new BecomeUserModel();
          return $this->becomeuser;
        }
        else if($name === "bookM")
        {
          $this->bookmodel= new BookModel();
          return $this->bookmodel;
        }
        else if($name === "listbookM")
        {
          $this->listbook = new ListBookModel();
          return $this->listbook;
        }
        else if($name === "salesreportM")
        {
          $this->salesreport = new SalesReportModel();
          return $this->salesreport;
        }
        else if($name === "categoryM")
        {
          $this->category = new CategoryModel();
          return $this->category;
        }
        else if($name === "bookdetailsM")
        {
          $this->bookdetails =  new bookdetailsModel();
          return $this->bookdetails;
        }
        else if($name === "searchByTitleM")
        {
            $this->searchbytitle = new SearchByTitleModel();
            return $this->searchbytitle;
        }
        else if($name ===  "ordercontroM")
        {
             $this->ordercontroller = new ordersModel();
             return $this->ordercontroller;
        }
        else if($name === "becomeauthorM")
        {
              $this->becomeauthor = new BecomeAuthorModel();
              return $this->becomeauthor;
        }
        else if($name === "editprofileM")
        {
              $this->editprofile = new EditProfileModel();
              return $this->editprofile;
        }
        else if($name === "updateprofileM")
        {
             $this->updateprofile = new UpdateProfileModel();
             return $this->updateprofile;
        }
        else if($name === "recentorderM")
        {
              $this->recentorder = new RecentOrderModel();
              return $this->recentorder;
        }
        else
        {
          return null;
        }
    }
    public function has(string $name):bool
    {
        if($name === "loginM")
        {
            
            return true;
        }
        else if($name === "registerM")
        {
           return true;
        }
        else if($name === "forgetM")
        {
          return true;
        }
        else if($name === "AuthorWecomePageM")
        {
          return true;
        }
        else if($name === "becomeuserM")
        {
          return true;
        }
        else if($name === "deletebookM")
        {
          return true;
        }
        else if($name === "editbookM")
        {
         return true;
        }
        else if($name === "listbookM")
        {
          return true;
        }
        else if($name === "publishplatformM")
        {
          return true;
        }
        else if($name === "salesreportM")
        {
          return true;
        }
        else if($name === "updatebookM")
        {
          return true;
        }
        else if($name === "categoryM")
        {
          return true;
        }
        else if($name === "indexM")
        {
          return true;
        }
        else if($name === "searchByTitleM")
        {
            return true;
        }
        else if($name ===  "ordercontroM")
        {
             return true;
        }
        else if($name === "orderconfirmM")
        {
              return true;
        }
        else if($name === "becomeauthorM")
        {
              return true;
        }
        else if($name === "editprofileM")
        {
              return true;
        }
        else if($name === "recentorderM")
        {
              return true;
        }
        else 
        {
          return false;
        }

    }
}