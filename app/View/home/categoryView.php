<?php
namespace App\View\categoryView;
session_start();
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
      top:78px;
      width:87%;
      left:0%;
    }
    #search-result
    {
      background-color: red;
      color:white;
      font-size: 15px;
    }
  </style>
</head>
<body>
<div id="wrapper">
  <div id="inner">
    <div id="header">
      <h1 id="title">Engineering Book Store </h1>
      <h1 style="background-color:red;color:white;"><?php echo $_SESSION['authorname']??$_SESSION['username']??"login ";?></h1>
      <nav> <a href="../../../public/assets/html/first.php"><button id="homebutton">HOME</button></a> 
       
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
    <dl id="browse">
    <dt>Full Category Lists</dt>
    <dd class="first"></dd>
    <?php
    include "../../Model/category/category.php";
     $category= category();
    foreach($category as $categorys)
    {
        $url="../../../app/Controller/category/categoryController.php?category=".$categorys;
        echo "<dd><a href='$url'>$categorys</a></dd>";
    }
     ?>
      
    </dl>
    <?php 
    require_once "../../../vendor/autoload.php";
   class categoryView
   {
    public function displayBook($product)
    {
    $i=0;
    $j=0;
    echo "<center><h1>Best Selling Book</h1></center>";
    foreach($product as $products)
    {
      $imagePath="../../../app/Model/upload/".$products["coverpage"];
      $title=$products["title"];
      $price=$products["price"];
      $url="../../../app/Controller/Home/indexController.php?id=".$product[$i]["bookid"];

        if($j%2==0)
        {
   echo" <div id='body'>
      <div class='inner'>
        <div class='leftbox'>";
          echo "<h3>".$title."</h3>";
          echo "<img src='$imagePath' width='93' height='95' alt='photo 1' class='left' />";
          echo "<p><b>Price:</b> <b>".$price."</b></p>";
         echo " <p class='readmore'><a href='$url'><button style='background-color:red;color:white;border:0px;'>BUY NOW</button></a></p>
          <div class='clear'></div>
        </div>";
        }
        else
        {
        echo "<div class='rightbox'>";
        echo "<h3>".$title." </h3>";
        echo "<img src='$imagePath' width='107' height='91' alt='photo 4' class='left' />";
        echo "<p><b>Price:</b> <b>".$price."</b> </p>";
        echo "<p class='readmore'><a href='$url'><button style='background-color:red;color:white;border:0px;'>BUY NOW</button></a></p>
          <div class='clear'></div>
        </div>
        <div class='clear'></div>
      </div><div class='clear br'></div>";
        }
        $i++;
        $j++;
    }

    
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
}
    }
  ?>
</body>
</html>