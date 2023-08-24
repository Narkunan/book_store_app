<?php
namespace App\View\orders;
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
    #bookData
    {
        float: left;


    }
  </style>
</head>
<body>
<div id="wrapper">
  <div id="inner">
    <div id="header">
      <h1 id="title">Engineering Book Store</h1>
      <h1 style="background-color:red;color:white;"><?php echo $_SESSION['authorname']??$_SESSION['username']??"login ";?></h1>
      <nav> <a href="../../../public/assets/html/first.php"><button id="homebutton">Home</button></a> 
      <a href="../../Controller/AuthorRedirect.php"><button id="homebutton">Author Login</button></a> 
       
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
    <?php 
    //require "../../../vendor/autoload.php";
    
   class ordersView 
   {
    public function displayBook($quantity,$bid)
    {
      
        $src="../../Model/upload/".$_SESSION['img'];
    
        
   echo" <div id='body'>
      <div class='inner'>
        <div class='leftbox'>";
          echo "<img src='$src' width='200' height='150' alt='photo 1' class='left' />";
          echo "<div id='bookData'><h3 style='text-align:center;font-size:20px;'>".$_SESSION['title']."</h3><br>";
          $price=$_SESSION['price'];
          $_SESSION['quantity']=$quantity;
          $totalprice=$price*$quantity;
          $_SESSION['tprice']=$totalprice;
          $_SESSION['bid']=$bid;
          echo "<h3 style='text-align:center;color:black;font-size:20px;'> TOTAL PRICE :  ".$totalprice."<br></h3>
         <p class='readmore'></p><br><br><br>
         <a href='../../Controller/orders/orderConfirm.php'>
         <button style='background-color:red;color:white;border:0px;float:left; width:200px;'>Confirm Order</button>
         </a>
         </div><div class='clear'></div>
        </div>
        ";
     echo" <!-- end .inner -->
    
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
