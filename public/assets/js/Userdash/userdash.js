function myFunction()
{
    let x= "Would you like to become Author";
    console.log("you are click myfun you would like to become author");
    if(window.confirm(x)==true)
    {
        console.log("clicked confirm");
        window.location.href = "../../../../../book_store/app/controller/UserDash/BecomeAuthor.php" ;
    }
    else
    {
        console.log("clicked cancel");
    }
}
function checkBecome()
{
    let some= document.getElementById("session").value;
    console.log(some);
    if(some=="Dual")
    {
        console.log(some);
        document.getElementById("become").style.display='none';
        document.getElementById("redirect").innerHTML="AuthorDash";

    }
}
checkBecome();
function authorRedirect()
{
    let x= "Would you like to Redirect To Author ";
    if(window.confirm(x)==true)
    {
        console.log("clicked confirm");
        window.location.href = "../../../../book_store/app/View/authordash/LoginView.php" ;
    }
    else
    {
        console.log("clicked cancel");
    }
}
