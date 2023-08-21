var title=document.getElementById("booktitles");
var titlefieldDisplayError=document.getElementById("btitle");
title.addEventListener("input",validateTitle);
function validateTitle()
{
    
    var titles=document.getElementById("btitle");
    var titleValue=title.value;
    console.log(titleValue.length);
    if(titleValue.length>=10&&titleValue.length<=50)
    {
        titles.style.color="green";
        titles.innerHTML="A Valid Title";
    }
    else
    {
        titles.style.color="red";
        titles.innerHTML="Not Valid Title";
    }

}

var description=document.getElementById("description");
description.addEventListener("input",validateDescription);
function validateDescription()
{
    console.log(document.getElementById("description").value);
    console.log(description.value);
    var titles=document.getElementById("desc");
    var titleValue=description.value;
    
    console.log(titleValue.length);
    if(titleValue.length<=0)
    {
        titles.style.color="red";
        titles.innerHTML="enter desc";
    }
    else if(titleValue.length<=30)
    {
        titles.style.color="orange";
        titles.innerHTML="The description should be greater than 30 characters";
    }
    else
    {
        titles.style.color="green";
        titles.innerHTML="Description is enough To publish Book";
    }
}

var bPrice=document.getElementById("bPrice");
bPrice.addEventListener("input",validatePrice);
function validatePrice()
{
    var price=document.getElementById("price");
    var priceValue=bPrice.value;
    if(priceValue<20)
    {
        price.style.color="red";
        price.innerHTML="Price should be greater Than 20";
    }
    else if(priceValue<=100)
    {
        price.style.color="orange";
        price.innerHTML="Fair Price ";
    }
    else
    {
        price.style.color="green";
        price.innerHTML="Valid Price";
    }
}
var bstock=document.getElementById("stock");
bstock.addEventListener("input",validateStock);
function validateStock()
{
    var stock=document.getElementById("bstock");
    var stockValue=bstock.value;
    console.log(stockValue);
    if(stockValue<=0&&stockValue<=1)
    {
        stock.style.color="red";
        stock.innerHTML="Stock should be greater Than one";
    }
    else
    {
        stock.style.color="green";
        stock.innerHTML="Valid Quantity";
    }
}
var descriptionErrorMsg=document.getElementById('desc');
var priceErrorMsg=document.getElementById('price');
var stockErrorMsg=document.getElementById('bstock');
var cp=document.getElementById("cp");
var coverpage=document.getElementById("coverImage");
function validateForm()
 {
    let coverimage=cp.files[0];
    if(title.value.length<=4)
    {
      titlefieldDisplayError.style.color='red';
      titlefieldDisplayError.innerHTML='enter a title';
      return false;
    }
    else if(description.value.length<=50)
    {
      descriptionErrorMsg.style.color='red';
      descriptionErrorMsg.innerHTML='enter description with minimum 50 characters';
      return false;
    }
    else if(bPrice.value.length<=0||price.value<=10)
    {
      priceErrorMsg.style.color='red';
      priceErrorMsg.innerHTML='enter a price greater than 10';
      return false;
    }
    else if(bstock.value.length<=0||bstock.value<=1)
    {
      stockErrorMsg.style.color='red';
      stockErrorMsg.innerHTML='enter a stock greater than 1';
      return false;
    }
    else if(!coverimage)
    {
        coverpage.style.color="red";
        coverpage.innerHTML="please upload a file";
        return false;
    }
 }
 
