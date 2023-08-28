<?php
 session_start();
 ?>
<html>
    <head>
        <title>Author</title>
        
          <link href="../../../public/assets/css/style.css" rel="stylesheet" type="text/css" />
<style>
    table
    {
        font-size: 20px;
    }
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
      top:78px;
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
    #welcomes
    {
        font-size: 20px;
        font-family: 'Times New Roman', Times, serif;
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
    <dd class="first"> <a href="../../Controller/UserDash/RecentOrder.php">
                Recent Order</a></dd>
    <dd style="font-size:16px;"> <a href="../../Controller/UserDash/EditProfile.php">
               Edit Profile  </a></dd>
                <dd style="font-size:16px;">   <a href="../../Controller/author/logout.php">Logout</a></dd>
                <dd style="font-size:16px;"><p style="margin-top:0px;font-weight:bold;padding:3px 10px;color:white;font-size:16px" onclick="myFunction()" id="become">Become User</p></dd>
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
<script src="../../../public/assets/js/Userdash/userdash.js">
  </script>

    </body>
</html>