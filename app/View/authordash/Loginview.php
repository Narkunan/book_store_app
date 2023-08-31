<?php
 session_start();
 
 ?>
<html>
    <head>
        <title>Author</title>
        
          <link href="../../../public/assets/css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
    <div id="wrapper">
            <div id="inner">
              <div id="header">
                <h1 id="title">Engineering Book Store </h1>
                <h1 style="background-color:red;color:white;"><?php echo $_SESSION['UserName']??"login ";?></h1>
                <nav> <a href="../../../public/assets/html/first.php"><button id="homebutton">Home</button></a> 
                 
                <a href="../../Controller/UserRedirect.php"><button id="homebutton">User Login</button></a>
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
    <dd class="first"> <a href="../../view/authordash/LoginView.php">
                Author Home </a></dd>
    <dd style="font-size:16px;"> <a href="../../view/authordash/authordash.php">
                Publishing Book </a></dd>
                <dd style="font-size:16px;">   <a href="../../Controller/authordash/PublishedBook.php">For Report</a></dd>
                <dd style="font-size:16px;"> <a href="../../Controller/authordash/EditBook.php">Edit Book</a></dd>
                <dd style="font-size:16px;"> <a href="../../Controller/authordash/DeleteBook.php">Delete Book</a></dd>
                <dd style="font-size:16px;"> <a href="../../Controller/accounts/logout.php">logout</a></dd>
                <dd style="font-size:16px;"><p style="margin-top:0px;font-weight:bold;padding:3px 10px;color:white;font-size:16px" onclick="myFunction()" id="become">Become User</p></dd>
                <dd style="font-size:16px;"><p style="margin-top:0px;font-weight:bold;padding:3px 10px;color:white;font-size:16px" onclick="userRedirect()" id="redirect"></p></dd>
              </dl>
    
    
        
        <center>
           
            <table">
                <tr><td>
                  
            <h1 id="welcomes"> welcome <?php echo $_SESSION["UserName"] ?> for author dash</h1><br><br><br></td></tr>
           
            <tr><td><h1 id="welcomes"></h1><br><br><br></td></tr>
           
           <tr><td> <h1 id="welcomes"></h1><br><br><br></td></tr>
           <input type='hidden' id='session' value='<?php echo $_SESSION['loggedUser']; ?>'>
         </table>
         </center>
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
<script src="../../../public/assets/js/home/homeScripts.js">
</script>
<script src="../../../public/assets/js/authordash/authordash.js">
  </script>

    </body>
</html>