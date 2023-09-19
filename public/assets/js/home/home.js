function changeContent()
{
     console.log("from chnage content");
      var chnageButtn = document.getElementById("userlogin");
      var values = chnageButtn.value;
      console.log(values+"from chnage content");
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

