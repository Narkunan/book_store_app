var y=document.getElementById("passwordresult");
var x=document.getElementById("passwords");
x.addEventListener("input",myFunction);
function myFunction()
{
   
    var z=x.value;
    if(z.length<=0)
    {
        y.style.color="red";
        y.innerHtml="Enter the Password";
    }
    else if(z.length>=1&&z.length<=7)
    {  
        y.style.color="red";
        y.innerHTML=8-z.length+"   More letters left to fill";
    }
    else
    {  
        y.style.color="green";
        y.innerHTML="You are good to go";
    }

}
var showpassword=document.getElementById("showPassword");
showpassword.addEventListener("click",funShow);
function funShow()
{
var password=showpassword.value;
console.log(showpassword.unchecked+"from passwoed unchecked");
console.log(showpassword.checked+"from password chceked");
console.log(password);
if(showpassword.checked===true)
{
    console.log("from checked");
document.getElementById("showPasswords").innerHTML=x.value;
}
else
{
    document.getElementById("showPasswords").innerHTML="     ";
}
}
var securityQuestion = document.getElementById("securityQuestions");
function validateForm()
{
    if(x.value.length<8)
    {
         console.log("from else if");
         document.getElementById("passwordresult").style.color="red";
         document.getElementById("passwordresult").innerHTML="enter password";
         return false;
    }
    else if(securityQuestion.value.length<3)
    {   console.log(securityQuestion.value.length)
        document.getElementById("securityError").style.color="red";
        document.getElementById("securityError").innerHTML="please enter pet name";
        return false;
    }
}