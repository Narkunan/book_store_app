var x=document.getElementById("become");
x.addEventListener("click",myfun);
function myfun()
{
    let x= "Would you like to become user";
    console.log("from my function");
    if(window.confirm(x)==true)
    {
        console.log("clicked confirm");
        window.location.href = "../../../../../book_store/app/controller/authordash/BecomeUser.php" ;
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
    console.log(some=="Dual");
    console.log("from checkbecome");
    if(some=="Dual")
    {
        console.log(some);
        document.getElementById("become").style.display='none';
        document.getElementById("redirect").innerHTML="UserDash";
    }
}
checkBecome();
function userRedirect()
{
    let x= "Would you like to Redirect To User ";
    console.log("meant to be user redirect");
    if(window.confirm(x)==true)
    {
        console.log("clicked confirm");
        window.location.href = "../../../../book_store/app/View/userdash/LoginView.php" ;
    }
    else
    {
        console.log("clicked cancel");
    }
}
