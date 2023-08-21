<?php
namespace App\View\home;
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
      <nav> <a href="../../../public/assets/html/firsttwo.php"><button id="homebutton">Home</button></a> 
      <a href="../../Controller/AuthorRedirect.php"><button id="homebutton">Author Login</button></a> 
       
      <a href="../../../public/assets/html/user/login.html"><button id="homebutton">User Login</button></a>
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
    <?php 
    //require "../../../vendor/autoload.php";
    use App\View\home\displayInterface;
   class indexView implements displayInterface
   {
    public function displayBook($product):void
    {
    
        $src="../../Model/upload/".$product->getCoverPage();
    

   echo" <div id='body'>
      <div class='inner'>
        <div class='leftbox'>";
         
          echo "<img src='$src' width='250' height='250' alt='photo 1' class='left' />";
          echo "<div id='bookData'><h3>".$product->getBookTitle()."</h3><br>";
          echo "<h2>Description<br>".$product->getBookDescription()."</h2><br>";
          echo "<h2>Category<br>".$product->getBookCategory()."</h2><br>";
          echo "<h2>Sub Category<br>".$product->getBooksubcategory()."</h2><br>";
          echo "<n3>Author Name<br> </h3>  ".$product->getAuthorName(),"<br>";
          echo "<p><b>Price:</b> <b>".$product->getBookPrice()."</b></p>
         <p class='readmore'></p>
        
         <a href='#'><button style='background-color:red;color:white;border-radius:0px;'>BUY <b>NOW</b></button></a></div><div class='clear'></div>
        </div>";
     echo" <!-- end .inner -->
    </div>
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
  //echo"<h1> TITLE : ".$product->getBookTitle()."</h1><br><br>";
        //echo "<h1> BOOK CATEGORY :".$product->getBookCategory()."</h1><br><br>";
       // echo "<h1> BOOK SUB CATEGORY :".$product->."</h1><br><br>";
        //$src="../../Model/upload/".$product->getCoverPage();
        //echo "<img src='$src'><br>"
        //echo "<h3>Book Description :".$product->getBookDescription()."</h3>";
        //echo "<h2>PRICE :".$product->getBookPrice()."</h2>";

     }
    }
  ?>
</body>
</html>
