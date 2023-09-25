<?php
namespace App\View\accounts;

?>
<html>
<head>
<title>Book Store</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../../public/assets/css/style.css" rel="stylesheet" type="text/css" />

</head>
<body>
<div id="wrapper">
  <div id="inner">
    <div id="header">
      <h1 id="title">Engineering Book Store</h1>
      <nav> <a href="../../../public/assets/html/first.php"><button id="homebutton">Home</button></a> 
       
            <a href="../../Controller/UserRedirect.php"><button id="homebutton">User Login</button></a>
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
      <!-- end nav -->
     <!-- end header -->  
    </dl>
   
<center>
    <?php 
    class forgetView
    {
        public function displayBook($pass)
        {
            echo  "<table>
            <tr><td><h1> your password is <strong>";
            echo "$pass
            <strong><br> </td></tr>
        <tr><td>please use this to login 
        </h1><br><br><a href='../../../public/assets/html/accounts/login.php'>Login</a></td></tr></table>";
       echo "</center>
           
        <div class='clear'></div>
        <div id='footer'>Engineering Book store Phone:044 567890 Email:engineering@bookstore.in</a> &nbsp;
          <div id='footnav'>  </div>
            
        </div>
         
      </div>
       
    </div>
     
    <script src='../../../public/assets/js/home/homeScripts.js'>
      </script>";
        }
    }
    ?>

</body>
</html>
