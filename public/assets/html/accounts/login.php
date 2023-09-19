<html>
    <head>
        <title>
            login Author
        </title>
        <link href="../../css/style.css" rel="stylesheet" type="text/css" />


    </head>
    <body>
        <div id="wrapper">
            <div id="inner">
              <div id="header">
                <h1 id="title">Engineering Book Store</h1>
                <nav> <a href="../first.php"><button id="homebutton">Home</button></a> 
                 
                <a href="../../../../app/Controller/UserRedirect.php"><button id="homebuttons">User Login</button></a>
               </nav>
              <dd class="last"></dd>
           
            <br>
          <div>
        <center id="login">
          <table>
            
            <form action="../../../../index.php?action=loginuser" method="POST" autocomplete="off" onsubmit="return validateForm()">
                <br>
                <tr><td><?php
                session_start();
                $msg=$_SESSION['msg']??" ";
                unset($_SESSION['msg']);
                echo "<div id='msg'>".$msg."</div>";
                ?><br><td></tr></td>
                <tr><td><label>Email</label><br></tr></td>
                
                <tr><td><input type="email" name="email" placeholder="E-mail" id="email"  required><br></td></tr>
                <tr><td><div id="result"></div><br></td></tr>
                
                <tr><td><label>Password</label><br></td></tr>
                
                <tr><td><input type="password" name="password" placeholder="password" minlength="8" id="passwords"><br></td></tr>
                <tr><td>
                <div id="passwordresult"></div><br></td></tr>
                <tr><td>
                <input type="checkbox" id="showPassword">Show Password
                <br></td></tr>
                <tr><td>
                <div id="showPasswords"></div>
                <br></tr></td>
                <tr><td><input type="submit" name="submit" placeholder="Login"><br></td></tr>
            </form>
            <tr><td>
            <a href="forget.php">Forget Password</a></td></tr>
            <tr><td>
            Don't have create a new one <a href="register.php">create</a></td></tr>
  </table>
        </center>
        </div>
            
    </div>
    
    <div class="clear"></div>
    <div id="footer">Engineering Book store Phone:044 567890 Email:engineering@bookstore.in</a> &nbsp;
      <div id="footnav">  </div>
        
    </div>
     
  </div>
   
</div>
 

        <script src="../../js/accounts/loginScript.js"></script>
    </body>
</html>