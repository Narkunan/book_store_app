<?php
 session_start();
 ?>
<html>
    <head>
        <title>Author</title>
        
          <link href="../../../public/assets/css/style.css" rel="stylesheet" type="text/css" />
    <style>
       #text
  {
    position: absolute;
    top:78px;
    width:87%;
    left:0%;
  }
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
            <center id="form">
                  <form action="../../Controller/home/SearchByTitle.php" method="get" autocomplete="off">
                    <div>
                      <input name="bookname" type="text" placeholder="Search your book"id="text" />
                     <br> <br>
                      <input type="submit" value="search" class="softright">
                    </div>
                  </form>
            </center>
            <br>
            
            <div id="search-result" style="text-align:left;"></div>
             <!-- end nav -->
     <!-- end header -->
    <dl id="browse">
    <dt>Options</dt>
    <dd class="first"> <a href="../../Controller/UserDash/RecentOrder.php">
                Recent Order</a></dd>
    <dd style="font-size:16px;"> <a href="../../Controller/UserDash/EditProfile.php">
               Edit Profile  </a></dd>
                <dd style="font-size:16px;">   <a href="../../Controller/accounts/logout.php">Logout</a></dd>
                <dd style="font-size:16px;"><p style="margin-top:0px;font-weight:bold;padding:3px 10px;color:white;font-size:16px" onclick="myFunction()" id="become">Become Author</p></dd>
                <dd style="font-size:16px;"><p style="margin-top:0px;font-weight:bold;padding:3px 10px;color:white;font-size:16px" onclick="authorRedirect()" id="redirect"></p>
    
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
         <!-- end body -->
<div class="clear"></div>
<div id="footer"> Engineering Book store Phone:044 567890 Email:engineering@bookstore.in &nbsp;
 <div id="footnav">  </div>
 <!-- end footnav -->
</div>
<!-- end footer -->
</div>
<!-- end inner -->
</div>
<!-- end wrapper -->
<script src="../../../public/assets/js/home/homeScripts.js">
</script>
<script src="../../../public/assets/js/Userdash/userdash.js">
  </script>

    </body>
</html>