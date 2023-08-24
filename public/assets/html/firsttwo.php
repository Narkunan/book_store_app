<?php
session_start();
?>
<html>
<head>
<title>Book Store</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
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
      position:absolute;
      top:80px;
      width:87%;
      left:0%;
    }
    #search-result
    {
      background-color: red;
      color:white;
      font-size: 15px;
      text-align: left;
    }
  </style>
</head>
<body>
<header style="background-color:red;color:white;">
      <h1 id="title">Engineering Book Store</h1>
     <h2> <?php echo $_SESSION['authorname']??"Please login";?></h2>
     
      <nav> <a href="firsttwo.php"><button id="homebutton">Home</button></a> 
      <a href="../../../app/Controller/AuthorRedirect.php"><button id="homebutton">Author Login</button></a> 
       
      <a href="user/login.html"><button id="homebutton">User Login</button></a>
      
      </nav>
      
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
  
  <div id="search-result"></div>
  </header>
      <!-- end nav -->
     <!-- end header -->
     <div id="category">
      <ul id="tablecategory">
    <?php
    include "../../../app/Model/category/category.php";
     $category= category();
    foreach($category as $categorys)
    {
        $url="../../../app/Controller/category/categoryController.php?category=".$categorys;
        echo "<li><a class='text-link' href='$url'>$categorys</a></li><hr>";
    }
     ?>
      </ul>  
  </div>
  
    <?php 
    require "../../../vendor/autoload.php";
    use App\Model\Home\IndexModel;
    $IndexModel=new IndexModel();
    $IndexModel->FetchBook();
    $product=$IndexModel->getFetchBook();
    $i=0;
    $j=0;
    echo "<h1 style='font-size:20px;'>Best Selling Book</h1><br><br>";
    foreach($product as $products)
    {
      $imagePath="../../../app/Model/upload/".$products["coverpage"];
      $title=$products["title"];
      $price=$products["price"];
      $url="../../../app/Controller/Home/indexController.php?id=".$product[$i]["bookid"];

       if($j%2==0){
          echo "<div id='leftboxx'>";
         
          echo "<img src='$imagePath' width='93' height='95' alt='photo 1' class='left'/>";
          echo "<b>".$title."</b>";
          echo "<p><b>Price:</b> <b>".$price."</b></p>";
         echo " <p><a href='$url'><button style='background-color:red;color:white;border:0px;'>BUY NOW</button></a></p>
         </div>";
       }
       else
       {
        echo "<div id='leftboxx'>";
         
          echo "<img src='$imagePath' width='93' height='95' alt='photo 1' class='right'/>";
          echo "<div id='imagealig'><b>".$title."</b>";
          echo "<p><b>Price:</b> <b>".$price."</b></p>";
         echo " <p><a href='$url'><button style='background-color:red;color:white;border:0px;'>BUY NOW</button></a></p>
         </div></div><br><hr>";
       }
        $i++;
        $j++;

    }
    
    ?>
  </div> 
<script src="../js/home/homeScripts.js">
  </script>

</body>
</html>
