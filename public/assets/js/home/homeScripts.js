var textfield=document.getElementById("text");
textfield.addEventListener("input",myfunn);
var xhttp,result,input,suggestion,inputValue;
function myfunn()
{
    var textlength=textfield.value;
    if(textlength.length>3)
    {
    input=textfield.value;
    console.log(textfield.value);
     result=document.getElementById("search-result");
     xhttp=new XMLHttpRequest();
     xhttp.open("GET","../../../../../book_store/app/Model/ajax/ajaxHome.php?title="+input,true);
     xhttp.send();
     xhttp.onreadystatechange=myFunRequest;
    }
}

function myFunRequest()
{
   
   if(xhttp.status=200 && xhttp.readyState==4)
   {
    
    console.log("inside connection check");
    result.innerHTML=xhttp.responseText;
    console.log(xhttp.responseText+"response texr");
    suggestion=result.querySelectorAll("#match");
    for(let i=0;i<suggestion.length;i++)
    {
        suggestion[i].addEventListener("click",clickfun);
    }
   }

}

function clickfun()
{
    for(let i=0;i<suggestion.length;i++)
    {
       inputValue=suggestion[i].textContent;
       document.getElementById("text").value=inputValue;
    }
    result.innerHTML="";
}
