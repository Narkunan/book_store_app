<html>
    <head>
        <title>Register</title>
        <link href="../../css/style.css" rel="stylesheet" type="text/css" />
<style>
    #names
    {
        padding: auto;
        
    }
   #register
   {
         
        background-color: white;
        color:black;
        border: 3px;
        font-size: 15px;
    }
   nav 
   {
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
    #form
    {
      background-color: red;
      color:white;
    }
    #text
    {
      position: absolute;
      top:0.7in;
      width:87%;
      left:0%;
    }
    #search-result
    {
      text-align: left;
      background-color: red;
      color:white;
      font-size: 15px;
    }
    label
    {
        font-size: 15px;
    }
  </style>

    </head>
    <body>
        <div id="wrapper">
            <div id="inner">
              <div id="header">
                <h1 id="title">Engineering Book Store</h1>
                <nav> <a href="../first.php"><button id="homebutton">Home</button></a>  
                <a href="../../../../app/Controller/UserRedirect.php"><button id="homebutton">User Login</button></a>
               </nav>
              <dd class="last"></dd>
            <center id="form">
                  <form action="../../../../app/Controller/home/SearchByTitle.php" method="get" autocomplete="off">
                    <div>
                      <input name="bookname" type="text" placeholder="Search your book"id="text" />
                     <br> <br>
                      <input type="submit" value="search" class="softright">
                    </div>
                  </form>
            </center>
            <br>
            
            <div id="search-result"></div>
            <br>
          

        <center id="register">
        
          <table>
            <form action="../../../../../book_store/app/Controller/author/register.php" method="POST" autocomplete="off" onsubmit="return validateForm()" >
                <tr><td><?php
                $msg=$_GET['msg']??" ";
                echo "<div id='msg' style='color:red;font-size:15px;'>".$msg."</div>";
                ?><br><td></tr></td>
               <tr><td> <label id="labels">Name</label><br></td></tr>
               
               <tr><td><input type="text" name="name" placeholder="Author name" id="names"><br></td></tr>
                
                <tr><td><div id="name"></div><br></td></tr>
                <tr><td><label id="labels">Select Role</label>
                <tr><td><select id = "roles" name = "UserRole">
                  <option value = "0"> Select Role </option>
                  <option value = "1"> Author </option>
                  <option value = "2"> User </option> 
                 </select>
                 <br></td></tr>
                 <tr><td><div id= "role"></div><br></td></tr>
                <tr><td><label id="labels"> E-mail</label><br></td></tr>
                
                <tr><td><input type="email" name="email" placeholder="E-mail address" required><br></td></tr>
          
                <tr><td><label id="labels"> Password</label><br></td></tr>
               
                <tr><td><input type="password" name="password" placeholder="enter password" id="pass"><br></td></tr>
                
                <tr><td><div id="passwordresult"></div><br></td></tr>
                
                <tr><td><input type="checkbox" id="showPassword">Show Password<br></td></tr>
               
              
                <tr><td><div id="showPasswords"></div><br></td></tr>
                
                <tr><td><input type="submit" name="create acoount" value="create account"></td></tr>
            </form>
            <tr><td>Already have account please <a href="login.php">login</a></td></tr>
            </table>
        </center>
    </div>
    <!-- end .inner -->
</div>
<!-- end body -->
<div class="clear"></div>
<div id="footer"> Engineering <a href="http://www.freewebsitetemplates.com">BookStore</a> &nbsp;
 <div id="footnav"> <a href="#">Legal</a> | <a href="../firsttwo.php">Home</a> </div>
 <!-- end footnav -->
</div>
<!-- end footer -->
</div>
<!-- end inner -->
</div>
<!-- end wrapper -->
<script src="../../js/home/homeScripts.js">
</script>

        <script src="../../js/author/register.js"></script>
        
    </body>
</html>


