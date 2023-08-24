<?php
namespace App\View\home;
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
        float: right;


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
    use App\View\home\displayInterface;
   class indexView implements displayInterface
   {
    public function displayBook($product):void
    {
       if($_SESSION['userlogin']==1)
       {
        $src="../../Model/upload/".$product->getCoverPage();
    
        $url=$product->getBookId();
   echo" <div id='body'>
      <div class='inner'>
        <div class='leftbox'>";
         $_SESSION['price']=$product->getBookPrice();
         $_SESSION['img']=$product->getCoverPage();
         $_SESSION['title']=$product->getBookTitle();
          echo "<img src='$src' width='250' height='150' alt='photo 1' class='left' />";
          echo "<div id='bookData'><h3 style='text-align:left;'>".$product->getBookTitle()."</h3><br>";
          echo "<h2>Description<br>".$product->getBookDescription()."</h2><br>";
          echo "<h2>Category<br>".$product->getBookCategory()."</h2><br>";
          echo "<h2>Sub Category<br>".$product->getBooksubcategory()."</h2><br>";
          echo "<h3 style='text-align:left;color:black;'>Author Name<br>   ".$product->getAuthorName(),"<br></h3><br>";
          echo "<h3 style='text-align:left;color:black;'>Price<br>".$product->getBookPrice()."<br></h3>
         <p class='readmore'></p><br><br><br>
         <form action='../../Controller/orders/orderController.php' method='POST'>
         <tr><td>Quantity<br><br></td></tr>

         <tr><td><select name='quantity'>
         <option value=1>1</option>
         <option value=2>2</option>
         <option value=3>3</option>
         <option value=4>4</option>
         </select><br><br></td></tr>
         <input type='hidden' value=$url name='bid'>
         <button type='submit' style='background-color:red;color:white;border:0px;text-align:center;'>BUY NOW</button></div><div class='clear'></div>
        </div>
        </form>";
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
       else
       {
        header("Location: ../../Controller/UserRedirect.php");
       }
     }
    }
  ?>
</body>
</html>
