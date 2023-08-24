<?php
namespace App\View\authordash;
require "../../../vendor/autoload.php";

?>
<html>
    <head>
        <title>Report</title>
    </head>
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
        </style>
<body>
   
<div id="wrapper">
  <div id="inner">
    <div id="header">
      <h1 id="title">Engineering Book Store</h1>
      <h1 style="background-color:red;color:white;"><?php echo $_SESSION['authorname']??"login ";?></h1>
      <nav> <a href="../../../public/assets/html/first.php"><button id="homebutton">Home</button></a> 
      <a href="../../Controller/UserRedirect.php"><button id="homebutton">Author Login</button></a> 
       
      <a href="../../../public/assets/html/user/login.php"><button id="homebutton">User Login</button></a>
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
  <dl id="browse">
    <dt>Options</dt>
    <dd class="first"><a href="../../View/author/LoginView.php">
                Author Home </a></dd>
    <dd style="font-size:16px;"> <a href="../../../public/assets/html/authordash/authordash.php">
                Publishing Book </a></dd> 
    <dd style="font-size:16px;"> <a href="../../Controller/authordash/PublishedBook.php">For Report</a> </dd>
    <dd style="font-size:16px;"> <a href="../../Controller/authordash/EditBook.php">Edit Book</a></dd>
    <dd style="font-size:16px;"> <a href="../../Controller/authordash/DeleteBook.php">Delete Book</a></dd>
    <dd style="font-size:16px;"> <a href="../../Controller/author/logout.php">logout</a></dd>
    </dl>
<br>
  <?php        
class EditBookView
{
    public function displayBook($books)
    {
        ?>
        <center>
<table>
    <h1 style="font-size:20px;">Published Books</h1>
    <th style="font-size:12px;">Title</th>

    <?php
    $i=0;
    foreach($books as $book)
    {
      echo "<tr>";
      echo "<td style='font-size:10px;'>".$book['title']."</td>";
      $url="../../Controller/authordash/EditSpecificBook.php?id=".$book['bookid'];
      echo "<td><a href=$url><button style='background-color:red;color:white;border:0px'>Edit Book</button></a></td>";
      echo "</tr>";
      $i++;
    }
    echo "</table>";
    ?>
    </center>
    <?php
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
}?>
    </body>
</html>