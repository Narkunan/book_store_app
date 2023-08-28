<?php
namespace App\View\author;

?>
<html>
<head>
<title>Book Store</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
    form
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
      background-color: red;
      color:white;
      font-size: 15px;
    }
    #bookData
    {
        float: right;


    }
  </style>
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
        </h1><br><br><a href='../../../public/assets/html/author/login.php'>Login</a></td></tr></table>";
       echo "</center>
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
    <script src='../../../public/assets/js/home/homeScripts.js'>
      </script>";
        }
    }
    ?>

</body>
</html>
