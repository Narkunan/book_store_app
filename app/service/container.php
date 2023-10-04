<?php
namespace App\service;

use App\Controller\authordash\AuthorWelcomePage;
use App\Controller\accounts\Forget;
use App\Controller\authordash\DeleteBook;
use App\Controller\authordash\EditBook;
use App\Controller\authordash\ListBook;
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
use App\Controller\UserDash\UpdateProfile;
use App\Model\authordash\BecomeUserModel;
use App\Model\authordash\WelcomePageModel;
use Psr\Container\ContainerInterface;
use App\Controller\accounts\LoginUser;
use App\Controller\accounts\RegisterUser;
use App\Controller\authordash\BecomeUser;
use App\Model\accounts\ForgetModel;
use App\Model\accounts\LoginModel;
use App\Model\accounts\RegisterModel;
use App\Model\authordash\BookModel;
use App\Model\authordash\ListBookModel;
use App\Model\authordash\SalesReportModel;
use App\Model\Home\bookdetailsModel;
use App\Model\Home\CategoryModel;
use App\Model\Home\SearchByTitleModel;
use App\Model\orders\ordersModel;
use App\Model\UserDash\BecomeAuthorModel;
use App\Model\UserDash\EditProfileModel;
use App\Model\UserDash\RecentOrderModel;
use App\Model\UserDash\UpdateProfileModel;
use App\Controller\home\Firsts;
use App\Controller\accounts\Forgetform;
use App\Controller\accounts\Loginform;
use App\Controller\accounts\Registerform;
use App\Controller\accounts\chooseRole;
use App\Controller\UserRedirect;
use App\Controller\accounts\Logout;
use App\Controller\authordash\CreateBookForm;
use App\Controller\UserDash\WelcomeUser;
class Container implements ContainerInterface {

    protected array $serviceByClassName = [];
    public function __construct() {
        $this->serviceByClassName[LoginModel::class]=new LoginModel();
        $this->serviceByClassName[RegisterModel::class] = new RegisterModel();
        $this->serviceByClassName[ForgetModel::class] = new ForgetModel();
        $this->serviceByClassName[WelcomePageModel::class] = new WelcomePageModel();
        $this->serviceByClassName[BecomeUserModel::class] =  new BecomeUserModel();
        $this->serviceByClassName[BookModel::class] = new BookModel();
        $this->serviceByClassName[ListBookModel::class] = new ListBookModel();
        $this->serviceByClassName[SalesReportModel::class] = new SalesReportModel();
        $this->serviceByClassName[CategoryModel::class] = new CategoryModel();
        $this->serviceByClassName[bookdetailsModel::class] = new bookdetailsModel();
        $this->serviceByClassName[SearchByTitleModel::class] = new SearchByTitleModel();
        $this->serviceByClassName[ordersModel::class] = new ordersModel();
        $this->serviceByClassName[BecomeAuthorModel::class] = new BecomeAuthorModel();
        $this->serviceByClassName[EditProfileModel::class] = new EditProfileModel();
        $this->serviceByClassName[UpdateProfileModel::class] = new UpdateProfileModel();
        $this->serviceByClassName[RecentOrderModel::class] = new RecentOrderModel();
        
        $this->serviceByClassName[Forgetform::class] = new Forgetform();
        $this->serviceByClassName[Loginform::class] = new Loginform();
        $this->serviceByClassName[Registerform::class] = new Registerform();
        $this->serviceByClassName[Logout::class] = new Logout();
        $this->serviceByClassName[CreateBookForm::class] =  new CreateBookForm();
        $this->serviceByClassName[chooseRole::class] = new chooseRole();
        $this->serviceByClassName[UserRedirect::class] = new UserRedirect();
        $this->serviceByClassName[WelcomeUser::class] =  new WelcomeUser();

        $this->serviceByClassName[LoginUser::class] = new LoginUser(
            $this->serviceByClassName[LoginModel::class]
        );
        $this->serviceByClassName[RegisterUser::class] = new RegisterUser(
            $this->serviceByClassName[RegisterModel::class]
        );
        $this->serviceByClassName[Forget::class] = new Forget(
            $this->serviceByClassName[ForgetModel::class]
        );
        $this->serviceByClassName[AuthorWelcomePage::class] = new AuthorWelcomePage(
            $this->serviceByClassName[WelcomePageModel::class]
        );
        $this->serviceByClassName[BecomeUser::class] = new BecomeUser(
            $this->serviceByClassName[BecomeUserModel::class]
        );
        $this->serviceByClassName[DeleteBook::class] = new DeleteBook(
           $this->serviceByClassName[BookModel::class]
        );
        $this->serviceByClassName[EditBook::class] = new EditBook(
            $this->serviceByClassName[BookModel::class]
        );
        $this->serviceByClassName[ListBook::class] = new ListBook(
            $this->serviceByClassName[ListBookModel::class]
        );
        $this->serviceByClassName[publishPlatformController::class] = new publishPlatformController(
            $this->serviceByClassName[BookModel::class]
        );
        $this->serviceByClassName[SalesReport::class] = new SalesReport(
            $this->serviceByClassName[SalesReportModel::class]
        );
        $this->serviceByClassName[UpdateBook::class] = new UpdateBook(
            $this->serviceByClassName[BookModel::class]
        );
        $this->serviceByClassName[categoryController::class]= new categoryController(
            $this->serviceByClassName[CategoryModel::class]
        );
        $this->serviceByClassName[bookdetails::class] = new bookdetails(
            $this->serviceByClassName[bookdetailsModel::class]
        );
        $this->serviceByClassName[SearchByTitle::class] = new SearchByTitle(
            $this->serviceByClassName[SearchByTitleModel::class]
        );
        $this->serviceByClassName[checkout::class] = new checkout(
            $this->serviceByClassName[CategoryModel::class]
        );
        $this->serviceByClassName[OrderConfirm::class] = new OrderConfirm(
            $this->serviceByClassName[ordersModel::class]
        );
        $this->serviceByClassName[BecomeAuthor::class] = new BecomeAuthor(
              $this->serviceByClassName[BecomeAuthorModel::class]
        );
        $this->serviceByClassName[editprofile::class] = new editprofile(
              $this->serviceByClassName[EditProfileModel::class]
        );
        $this->serviceByClassName[UpdateProfile::class] = new UpdateProfile(
            $this->serviceByClassName[UpdateProfileModel::class]
        );
        $this->serviceByClassName[RecentOrder::class] = new RecentOrder(
              $this->serviceByClassName[RecentOrderModel::class]
        );
        $this->serviceByClassName[Firsts::class] = new Firsts();

  }

  public function get(string $id): mixed {
       
    return $this->serviceByClassName[$id] ?? NULL;
  }

  public function has(string $id): bool {
    return isset($this->serviceByClassName[$id])??false;
  }

}
