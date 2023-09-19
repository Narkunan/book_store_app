<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Forget Password</title>
<link href="../../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
  <div id="inner">
    <div id="header">
      <h1 id="title">Engineering Book Store</h1>
      <nav> <a href="../first.php"><button id="homebutton">Home</button></a> 
      <a href="../../../../app/Controller/UserRedirect.php"><button id="homebutton">Author Login</button></a> 
      </nav>
    <dd class="last"></dd>
  <br>
       
        <center>
            <br>
            <br>
            <br>
           
            <br><br><br>
            <form action="../../../../index.php?action=forgetuser" method="post" autocomplete="off" onsubmit="return validateForm()">
            <table>
            <tr><td><?php
                session_start();
                $msg=$_SESSION['msg']??" ";
                unset($_SESSION['msg']);
                echo "<div id='msg'>".$msg."</div>";
                
                ?><br></tr></td>
               <tr><td>
               <label >Enter the email address that associated with Account</label>
<br></td></tr>
           <tr><td> <input type="email" name="email" placeholder="enter email address" required>
                <br>
                </td></tr>
           <tr><td><label> Which is your Favourite Pet?</label></td></tr>
          <tr><td><input type="text" name = "securityquestion" id="securityQuestions"><br></td></tr>
           <tr><td><div id="securityError"></div><br></td></tr>
           <tr><td><label>Enter new Password</label></td></tr>
           <tr><td><input type="password" name ="password" id="passwords"><br></td></tr>
                <tr><td> <div id="passwordresult"></div><br></td></tr>
                <tr><td>
                <input type="checkbox" id="showPassword">Show Password
                <br><br></td></tr>
                <tr><td>
                <div id="showPasswords"></div>
                <br>
                <br>
                <input type="submit" name="submit">
                <br>
                <br>
</table>
            </form>
        </center>
        <div class='clear'></div>
        <footer > Engineering Book store Phone:044 567890 Email:engineering@bookstore.in</footer>
  
            
        </div>
    
        
    </div>
    
  </div>
  
</div>
<script src="../../js/accounts/forgetScript.js"></script>
    </body>
</html>