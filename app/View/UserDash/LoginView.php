<?php
 session_start();
 ?>
<html>
    <head>
        <title>Author</title>
        
          <link href="../../../public/assets/css/style.css" rel="stylesheet" type="text/css" />
    <style>
      </style>
    </head>
    <body>
    <div id="wrapper">
            <div id="inner">
              <div id="header">
                <h1 id="title">Engineering Book Store </h1>
                <h1 style="background-color:red;color:white;"><?php echo $_SESSION['UserName']??"login ";?></h1>
                <nav> <a href="../../../public/assets/html/first.php"><button id="homebutton">Home</button></a> 
                 
                <a href="../../Controller/UserRedirect.php"><button style="background-color:red;border:0px;color:white;font-size:20px;" id="homebuttons">User Login</button></a>
               </nav>
              <dd class="last"></dd>
            <br>
            <br>
            <br>
            
            
    <dl id="browse">
    <dt>Options</dt>
    <dd class="first"> <a href="../../../index.php?action=recentorder">
                Recent Order</a></dd>
    <dd id="option"> <a href="../../../index.php?action=editprofile">
               Edit Profile  </a></dd>
                <dd id="option">   <a href="../../../index.php?action=logout">Logout</a></dd>
                <dd id="option"><p onclick="myFunction()" id="become">Become Author</p></dd>
                <dd id="option"><p onclick="authorRedirect()" id="redirect"></p>
    
                <input type='hidden' id='session' value='<?php echo $_SESSION['loggedUser']; ?>'>
                
    
    </dl>

        
        <center>
           
            <table">
                <tr><td>
            <h1 id="welcomes"> welcome <?php echo $_SESSION["UserName"] ?> for User dash</h1><br><br><br></td></tr>
           
            <tr><td><h1 id="welcomes"></h1><br><br><br></td></tr>
           
           <tr><td> <h1 id="welcomes"></h1><br><br><br></td></tr>
         </table>
         </center>
         <input type="hidden" id="userlogin" value="<?php echo $_SESSION['UserName'];?>">
             
<div class="clear"></div>
<div id="footer"> Engineering Book store Phone:044 567890 Email:engineering@bookstore.in &nbsp;
 <div id="footnav">  </div>
   
</div>
 
</div>
 
</div>
 
<script src="../../../public/assets/js/home/home.js">
</script>
<script src="../../../public/assets/js/Userdash/userdash.js">
  </script>

    </body>
</html>