function changeContent()
{
     console.log("from chnage content");
      var chnageButtn = document.getElementById("userlogin");
      var values = chnageButtn.value;
      console.log(values+"from chnage content");
      console.log(values == " ");
      console.log(values=="login");
    if(values != "login")
      {
        document.getElementById("homebuttons").innerHTML = "DashBoard"; 
      }
      //else if(values=="login")
      //{
        //document.getElementById("homebuttons").innerHTML = "userLogin";
      //}
      else
      {
        document.getElementById("homebuttons").innerHTML = "Login";
      }

}



changeContent();

