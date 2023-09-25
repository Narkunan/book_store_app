<?php
namespace App\service;
use App\Controller\authordash\AuthorWelcomePage;
use App\Controller\accounts\Forget;
use App\Controller\accounts\LoginUser;
use App\Controller\accounts\RegisterUser;
use App\Controller\authordash\BecomeUser;
use App\Controller\authordash\DeleteBook;
use App\Controller\authordash\EditBook;
use App\Controller\authordash\publishPlatformController;
use App\Controller\authordash\SalesReport;
use App\Controller\authordash\UpdateBook;
use App\Controller\home\bookdetails;
use App\Controller\home\categoryController;
use App\Controller\home\SearchByTitle;
use App\Controller\orders\checkout;
use App\Controller\orders\OrderConfirm;
use App\Controller\UserDash\BecomeAuthor;
use App\Controller\UserDash\editprofile;
use App\Controller\UserDash\RecentOrder;
use App\Controller\authordash\ListBook;
use App\Controller\UserDash\UpdateProfile;
use Psr\Container\ContainerInterface;
use App\service\ModelContainer;
use App\service\DTOcontainer;
class container implements ContainerInterface
{
    public LoginUser $login; 
    public RegisterUser $register;
    public Forget $forget; 
    public AuthorWelcomePage $authorwelcomepage;
    public BecomeUser $becomeuser;
    public DeleteBook $deletebook;
     public ListBook $listbook;
    public publishPlatformController $publishplatform;
    public SalesReport $salesreport;
    public UpdateBook $updatebook;
    public categoryController $category;
    public bookdetails $bookdetails;
    public SearchByTitle $searchbytitle;
    public $ordercontroller;
    public OrderConfirm $orderconfirm;
    public BecomeAuthor $becomeauthor;
    public editprofile $editprofile;
    public UpdateProfile $updateprofile;
    public RecentOrder $recentorder;
    public ModelContainer $modelcontainer;
    public DTOcontainer $Dtocontainer;
    public function __construct()
    {
        $this->modelcontainer = new ModelContainer();
        $this->Dtocontainer = new DTOcontainer();
    }

    public function get(string $name):mixed
    {

           if($name === "login")
           {   
               $this->login = new LoginUser($this->modelcontainer->get("loginM"),$this->Dtocontainer->get("accounts"));
               return $this->login;
           }
           else if($name === "register")
           {
             $this->register = new RegisterUser($this->modelcontainer->get("registerM"),$this->Dtocontainer->get("accounts"));
             return $this->register;
           }
           else if($name === "forget")
           {
             $this->forget = new Forget($this->modelcontainer->get("forgetM"),$this->Dtocontainer->get("accounts"));
             return $this->forget;
           }
           else if($name === "AuthorWelcomePage")
           {
             $this->authorwelcomepage = new AuthorWelcomePage($this->modelcontainer->get("AuthorWecomePageM"),$this->Dtocontainer->get("author"));
             return $this->authorwelcomepage;
           }
           else if($name === "becomeuser")
           {
             $this->becomeuser = new BecomeUser($this->modelcontainer->get("becomeuserM"),$this->Dtocontainer->get("author"));
             return $this->becomeuser;
           }
           else if($name === "deletebook")
           {
             $this->deletebook = new DeleteBook($this->modelcontainer->get("bookM"),$this->Dtocontainer->get("author"));
             return $this->deletebook;
           }
           else if($name === "editbook")
           {
             $this->editbook = new EditBook($this->modelcontainer->get("bookM"),$this->Dtocontainer->get("author"));
             return $this->editbook;
           }
           else if($name === "listbook")
           {
             $this->listbook = new listbook($this->modelcontainer->get("listbookM"),$this->Dtocontainer->get("author"));
             return $this->listbook;
           }
           else if($name === "publishplatform")
           {
             $this->publishplatform = new publishPlatformController($this->modelcontainer->get("bookM"),$this->Dtocontainer->get("author"));
             return $this->publishplatform;
           }
           else if($name === "salesreport")
           {
             $this->salesreport = new SalesReport($this->modelcontainer->get("salesreportM"),$this->Dtocontainer->get("author"));
             return $this->salesreport;
           }
           else if($name === "updatebook")
           {
             $this->updatebook = new UpdateBook($this->modelcontainer->get("bookM"),$this->Dtocontainer->get("author"));
             return $this->updatebook;
           }
           else if($name === "category")
           {
             $this->category = new categoryController($this->modelcontainer->get("categoryM"),$this->Dtocontainer->get("home"));
             return $this->category;
           }
           else if($name === "bookdetails")
           {
             $this->index =  new bookdetails($this->modelcontainer->get("bookdetailsM"),$this->Dtocontainer->get("home"));
             return $this->index;
           }
           else if($name === "searchByTitle")
           {
               $this->searchbytitle = new SearchByTitle($this->modelcontainer->get("searchByTitleM"),$this->Dtocontainer->get("home"));
               return $this->searchbytitle;
           }
           else if($name ===  "checkout")
           {
                $this->ordercontroller = new checkout($this->modelcontainer->get("categoryM"),$this->Dtocontainer->get("order"));
                return $this->ordercontroller;
           }
           else if($name === "orderconfirm")
           {
                 $this->orderconfirm =  new OrderConfirm($this->modelcontainer->get("ordercontroM"),$this->Dtocontainer->get("order"));
                 return $this->orderconfirm;
           }
           else if($name === "becomeauthor")
           {
                 $this->becomeauthor = new BecomeAuthor($this->modelcontainer->get("becomeauthorM"),$this->Dtocontainer->get("user"));
                 return $this->becomeauthor;
           }
           else if($name === "editprofile")
           {
                 $this->editprofile = new editprofile($this->modelcontainer->get("editprofileM"),$this->Dtocontainer->get("user"));
                 return $this->editprofile;
           }
           else if($name === "updateprofile")
           {
                 $this->updateprofile = new UpdateProfile($this->modelcontainer->get("updateprofileM"),$this->Dtocontainer->get("user"));
                 return $this->updateprofile;
           }
           else if($name === "recentorder")
           {     
                 $this->recentorder = new RecentOrder($this->modelcontainer->get("recentorderM"),$this->Dtocontainer->get("user"));
                 return $this->recentorder;
           }
           else
           {
             return null;
           }

    }
    public function has($name):bool
    {
           if($name === "login")
           {
               
               return true;
           }
           else if($name === "register")
           {
              return true;
           }
           else if($name === "forget")
           {
             return true;
           }
           else if($name === "AuthorWecomePage")
           {
             return true;
           }
           else if($name === "becomeuser")
           {
             return true;
           }
           else if($name === "deletebook")
           {
             return true;
           }
           else if($name === "editbook")
           {
            return true;
           }
           else if($name === "listbook")
           {
             return true;
           }
           else if($name === "publishplatform")
           {
             return true;
           }
           else if($name === "salesreport")
           {
             return true;
           }
           else if($name === "updatebook")
           {
             return true;
           }
           else if($name === "category")
           {
             return true;
           }
           else if($name === "index")
           {
             return true;
           }
           else if($name === "searchByTitle")
           {
               return true;
           }
           else if($name ===  "ordercontro")
           {
                return true;
           }
           else if($name === "orderconfirm")
           {
                 return true;
           }
           else if($name === "becomeauthor")
           {
                 return true;
           }
           else if($name === "editprofile")
           {
                 return true;
           }
           else if($name === "recentorder")
           {
                 return true;
           }
           else 
           {
             return false;
           }

    }

}