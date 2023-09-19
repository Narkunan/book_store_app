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
function changeContent()
{
     console.log("from chnage content");
      var chnageButtn = document.getElementById("userlogin");
      var values = chnageButtn.value;
      console.log(values == " ");
      if(values != " ")
      {
        document.getElementById("homebuttons").innerHTML = "DashBoard"; 
      }
      else
      {
        document.getElementById("homebuttons").innerHTML = "userLogin";
      }

}



changeContent();

