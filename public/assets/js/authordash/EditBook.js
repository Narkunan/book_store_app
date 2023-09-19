var titlefield=document.getElementById('booktitles');
var titlefieldDisplayError=document.getElementById('btitle');
 var description=document.getElementById('description');
 var descriptionErrorMsg=document.getElementById('desc');
 var price=document.getElementById('bPrice');
 var priceErrorMsg=document.getElementById('price');
 var stock=document.getElementById('stock');
 var stockErrorMsg=document.getElementById('bstock');
 titlefield.addEventListener('input',validateName);
 function validateName()
 {
  var titles=document.getElementById('btitle');
  var titleValue=titlefield.value;
  console.log(titleValue.length);
  if(titleValue.length>=10&&titleValue.length<=50)
  {
      titles.style.color='green';
      titles.innerHTML='A Valid Title';
  }
  else
  {
      titles.style.color='red';
      titles.innerHTML='Not Valid Title';
  }
 }
 function validateForm()
 {
    if(titlefield.value.length<=0)
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
    else if(price.value.length<=0||price.value<=10)
    {
      priceErrorMsg.style.color='red';
      priceErrorMsg.innerHTML='enter a price greater than 10';
      return false;
    }
    else if(stock.value.length<=0||stock.value<=1)
    {
      stockErrorMsg.style.color='red';
      stockErrorMsg.innerHTML='enter a stock greater than 1';
      return false;
    }
 }
 
