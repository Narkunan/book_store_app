<?php
namespace App\View\Userdash;
?>
<html>
    <head>
        <title>Report</title>
    </head>
    <link href="../../../public/assets/css/style.css" rel="stylesheet" type="text/css" />
    <style>
         nav {
    position: absolute;
    width:100%;
    background-color:red;
    color:white;
    text-align: center;
    }
    #homebutton
    {
      background-color: red;
      color:white;
      font-size: 20px;
      border: 0px;
    }
    #title
    {
      text-align: center;
      background-color: red;
      color: white;
      font-size: 30px;
      width:100%;
      font-family: serif;
    }
    .softright
    {
      background-color:red;
      color:white;
      top: auto;
      float: right;
      text-align: center;
      width: 15%;
      border:0px;
    }
    
    #text
    {
      position: absolute;
      top: 78px;
      width:87%;
      left:0%;
    }
    #search-result
    {
      background-color: red;
      color:white;
      font-size: 15px;
    }
    
  </style>
  
<body>
   
<div id="wrapper">
  <div id="inner">
    <div id="header">
      <h1 id="title">Engineering Book Store</h1>
      <h1 style="background-color:red;color:white;"><?php echo $_SESSION['username']??"login ";?></h1>
      <nav> <a href="../../../public/assets/html/first.php"><button id="homebutton">Home</button></a> 
      <a href="../../Controller/UserRedirect.php"><button id="homebutton">Author Login</button></a> 
       
      <a href="../../../public/assets/html/user/login.php"><button id="homebutton">User Login</button></a>
     </nav>
    <dd class="last"></dd>
  <center>
        <form action="../../../app/Controller/home/SearchByTitle.php" method="get" autocomplete="off">
          <div>
            <input name="bookname" type="text" placeholder="Search your book"id="text" />
           <br> <br>
            <input type="submit" value="search" class="softright">
          </div>
        </form>
  </center>
  <br>
  
  <div id="search-result" style="text-align:left;"></div>
  <dl id="browse">
    <dt>Options</dt>
    <dd class="first"><a href="../../Controller/UserDash/RecentOrder.php">
                Recent Order</a></dd>
    <dd style="font-size:16px;"> <a href="../../Controller/UserDash/EditProfile.php">
                Edit Profile</a></dd> 
    <dd style="font-size:16px;"> <a href="../../Controller/user/logout.php">logout</a></dd>
    </dl>
<br>
  <?php        
class EditProfileView
{
    public function displayProfile($books)
    {
        ?>
        <center>  
      <form action='../../Controller/UserDash/EditedProfileConfirm.php' method='post' autocomplete='off' onsubmit="return validateForm()">
      <table id='tables'>
      <tr><td> <label id="labels">User Name</label><br></td></tr>
               
               <tr><td><input type="text" name="name" placeholder="Author name" id="names" value="<?php echo $books[0]['user_name'];?>"><br></td></tr>
                
                <tr><td><div id="name"></div><br></td></tr>
                <tr><td><label id="labels"> E-mail</label><br></td></tr>
                
                <tr><td><input type="email" name="email" placeholder="E-mail address" value="<?php echo $books[0]['email'];?>" required><br></td></tr>

                <tr><td><label id="labels"> Address</label><br></td></tr>
                <tr><td><input type="text" name="address" placeholder="Enter your address" value="<?php echo $books[0]['address'];?>" id="address" required><br></td></tr>
                <tr><td><div id="addresserror"></div></td></tr>
                <tr><td><label id="labels"> Password</label><br></td></tr>
               
                <tr><td><input type="password" name="password" placeholder="enter password" value="<?php echo $books[0]['password'];?>"id="pass"><br></td></tr>
                
                <tr><td><div id="passwordresult"></div><br></td></tr>
                
                <tr><td><input type="checkbox" id="showPassword">Show Password<br></td></tr>
               
              
                <tr><td><div id="showPasswords"></div><br></td></tr>
      <tr><td><input type='submit' value='Update Profile' style='width:170px;'></td></tr>
      </form>
</table>
    </center>
    <?php
    echo" <!-- end .inner -->
    </div>
    <!-- end body -->
    <div class='clear'></div>
    <div id='footer'> Web design by <a href='http://www.freewebsitetemplates.com'>free website templates</a> &nbsp;
      <div id='footnav'> <a href='#'>Legal</a> | <a href='#'>Home</a> </div>
      <!-- end footnav -->
    </div>
    <!-- end footer -->
  </div>
  <!-- end inner -->
</div>
<!-- end wrapper -->
"
 ;
 echo "<script>
 var x=document.getElementById('pass');
x.addEventListener('input',myFunction);
function myFunction()
{
    var y=document.getElementById('passwordresult');
    var z=x.value;

    if(z.length<=0)
    {
        y.style.color='red';
        y.innerHtml='Enter the Password';
    }
    else if(z.length>=1&&z.length<=7)
    {  
        y.style.color='red';
        y.innerHTML=8-z.length+'   More letters left to fill';
    }
    else
    {  
        y.style.color='green';
        y.innerHTML='You are good to go';
    }

}
var names=document.getElementById('names');
names.addEventListener('input',nameValidate);
function nameValidate()
{
    var nameValue=names.value;
    
    var display=document.getElementById('name');
    if(nameValue.length<=0)
    {
        display.style.color='red';
        display.innerHTML='enter name';
    }
    else
    {
        display.style.color='green';
        display.innerHTML='Nice Name';
    }
}

function validateForm()
{

    console.log('from validate function');
    console.log(x.value.length);
    console.log(x.value);
    let length=x.value.length;
    if(names.value.length==0)
    { 
        console.log('hiii from validateForm');
        document.getElementById('name').style.color='red';
        document.getElementById('name').innerHTML='please enter name';
        return false;
    }
    else if(length<8)
    {
         console.log('from else if');
         document.getElementById('passwordresult').style.color='red';
         document.getElementById('passwordresult').innerHTML='enter password';
         return false;
    }
    else
    {
        return true;
    }

}


var showpassword=document.getElementById('showPassword');
showpassword.addEventListener('click',funShow);
function funShow()
{
var password=showpassword.value;
console.log(showpassword.unchecked+'from passwoed unchecked');
console.log(showpassword.checked+'from password chceked');
console.log(password);
if(showpassword.checked===true)
{
    console.log('from checked');
document.getElementById('showPasswords').innerHTML=x.value;
}
else
{
    document.getElementById('showPasswords').innerHTML='     ';
}
}</script>";
    }
}?>

<script src="../../../public/assets/js/home/homeScripts.js">
  </script>
 
    </body>
</html>