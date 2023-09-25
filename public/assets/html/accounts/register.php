<html>
    <head>
        <title>Register</title>
        <link href="../../css/style.css" rel="stylesheet" type="text/css" />

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
            <br>
          

        <center id="register">
        <br><br>
          <table>
            <form action="../../../../index.php?action=registeruser" method="POST" autocomplete="off" onsubmit="return validateForm()" >
                <tr><td><?php
                session_start();
                $msg=$_SESSION['msg']??" ";
                unset($_SESSION['msg']);
                echo "<div id='msg'>".$msg."</div>";
                ?><br><td></tr></td>
               <tr><td> <label id="labels">Name</label><br></td></tr>
               
               <tr><td><input type="text" name="name" placeholder="Name" id="names"><br></td></tr>
                
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
                <tr><td><label>Which is your favourite pet?</label><br></td></tr>
                <tr><td><input type="text" name = "securityQuestion" id="securityquestions"><br></td></tr>
                <tr><td><div id="securityError"></div><br><td></td> 
          
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
       
</div>
    
<div class="clear"></div>
<div id="footer">Engineering Book store Phone:044 567890 Email:engineering@bookstore.in</a> &nbsp;
 <div id="footnav"></div>
   
</div>
 
</div>
 
</div>
 
</script>

        <script src="../../js/accounts/register.js"></script>
        
    </body>
</html>


