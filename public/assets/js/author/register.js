var x=document.getElementById("pass");
var role=document.getElementById("roles");
var displayRoleError = document.getElementById("role");
x.addEventListener("input",myFunction);
function myFunction()
{
    var y=document.getElementById("passwordresult");
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
var names=document.getElementById("names");
names.addEventListener("input",nameValidate);
function nameValidate()
{
    var nameValue=names.value;
    
    var display=document.getElementById("name");
    if(nameValue.length<=0)
    {
        display.style.color="red";
        display.innerHTML="enter name";
    }
    else
    {
        display.style.color="green";
        display.innerHTML="Nice Name";
    }
}

function validateForm()
{
    console.log(role.value);
    let length=x.value.length;
    if(names.value.length==0)
    { 
        console.log("hiii from validateForm");
        document.getElementById("name").style.color="red";
        document.getElementById("name").innerHTML="please enter name";
        return false;
    }
    else if(length<8)
    {
         console.log("from else if");
         document.getElementById("passwordresult").style.color="red";
         document.getElementById("passwordresult").innerHTML="enter password";
         return false;
    }
    else if(role.value==="0")
    {
         displayRoleError.style.color="red";
         displayRoleError.innerHTML="please select role";
         return false;
    }
    else
    {
        return true;
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