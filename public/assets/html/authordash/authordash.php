<html>
    <head>
        <title>AUTHORDASH</title>
        <link href="../../css/style.css" rel="stylesheet" type="text/css" />
<style>
   #forget
   {    
        background-color: white;
        color:black;
        border: 3px;
        font-size: 20px;
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
      top:0.7in;
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
    #welcome
    {
        font-size: 20px;
    }
    label
    {
        font-size: 15px;
    }
    #descriptions
    {
       width: 200px;
       height: 50px;
    }
  </style>

    </head>
    <body>
    <div id="wrapper">
  <div id="inner">
    <div id="header">
      <h1 id="title">Engineering Book Store <?php echo $_SESSION['authorname']??" ";?></h1>
      <nav> <a href="../firsttwo.php"><button id="homebutton">Home</button></a> 
      <a href="../../../../app/Controller/AuthorRedirect.php"><button id="homebutton">Author Login</button></a> 
      
      <a href="../user/login.html"><button id="homebutton">User Login</button></a>
      </nav>
    <dd class="last"></dd>
  <center id="form">
        <form action="../../../../app/Controller/home/SearchByTitle.php" method="get" autocomplete="off">
          <div>
            <input name="bookname" type="text" placeholder="Search your book"id="text" />
           <br> <br>
            <input type="submit" value="search" class="softright">
          </div>
        </form>
  </center>
  <br>
  
  <div id="search-result"></div>
  <dl id="browse">
    <dt>Full Category Lists</dt>
    <dd class="first"> <a href="../../../../app/View/author/LoginView.php">
                Author Home </a></dd>
       <dd style="font-size:16px;"> <a href="authordash.php">
                Publishing Book </a></dd>
    <dd style="font-size:16px;"> <a href="../../../../app/Controller/authordash/PublishedBook.php">For Report</a></dd>
    <dd style="font-size:16px;"> <a href="../../../../app/Controller/authordash/EditBook.php">Edit Book</a></dd>
    <dd style="font-size:16px;"> <a href="../../../../app/Controller/authordash/DeleteBook.php">Delete Book</a></dd>
    <dd style="font-size:16px;"> <a href="../../../../app/Controller/author/logout.php">logout</a></dd>
      
    </dl>
        <center>
            <?php
            session_start();
             $authorname=$_SESSION["authorname"]??"login";
             
            echo "<h1 id='welcome'>welcome to Publish Dash <br>$authorname</h1>";
            echo "<br>";?>
        <form action="../../../../app/Controller/authordash/authordash.php" method="post" enctype="multipart/form-data" autocomplete="off" onsubmit="return validateForm()">
        <table id="tables">
       <tr> <td><label>Book Title</label></td></tr>
       <tr><td> <input type="text" name="booktitle" id="booktitles" ></td></tr>
        
        <tr><td><div id="btitle"></div></td></tr>
        
        <tr><td><label>Category</label></td></tr>
        
        <tr><td style="font-size:20px;"><select name="book_category" id="bcategory">
          <option value="Computer Science Engineering">Computer Science Engineering</option>
          <option value="Mechanical Engineering">Mechanical Engineering</option>
          <option value="Electrical Engineering">Electrical Enginering</option>
          <option value="Civil Engineering">Civil Engineering</option>
          <option value="Aeronautical Engineering">Aeronautical Engineering</option>
          <option value="Marine Engineering">Marine Engineering</option>
          <option value="BioMedical Engineering">BioMedical Engineering</option>
          <option value="chemical Engineering">chemical Engineering</option>
          <option value="AutoMobile Engineering">AutoMobile Engineering</option>
          </select>
        </td></tr>
        
        <div id="category"></div>
        
        <tr><td><label> Sub Category</label></td></tr>
        
       <tr><td> <select name="book_subcategory" id="scategory" >
        <option value="programming">programming</option>
        <option value="java">Java</option>
        <option value="Web development">Web development</option>
        <option value="C++">C++</option>
        <option value="database">DataBase</option>
        <option value="MYSQL">MYSQL</option>
        <option value="DataStructure and algorithm">DataStructure and algorithm</option>
        <option value="network">network</option>
        <option value="Mobile Computing">Mobile Computing</option>
        <option value="git hub">git hub</option>
        <option value="operating system">operating system</option>
        <option value="cryptography">cryptography</option>
        <option value="Engineering Mathematics">Engineering Mathematics</option>
        <option value="physics">physics</option>
        <option value="Communication Theory">Communication Theory</option>
        <option value="Analog electronics">Analog electronics</option>
        <option value="Digital Electronics">Digital Electronics</option>
        <option value="microprocessor">microprocessor</option>
        <option value="Microcontroller">Microcontroller</option>
        <option value="Fluid Mechanics">Fluid Mechanics</option>
        <option value="Solid Mechanics">Solid Mechanics</option>
        <option value="ThermoDynamics">ThermoDynamics</option>
        <option value="Tissue Engineering">Tissue Engineering</option>
        <option value="anatomy">Anatomy</option>
        <option value="Automotive Pollution and Control">Automotive Pollution and Control</option>
  </select>
       </td></tr>
        
        <div id="bscategory"></div>
        
        <tr><td><label> Upload Coverpage</label></td></tr>
        
        <tr><td><input type="file" name="coverpage" id="cp"></td></tr>
        <tr><td><div id="coverImage"></div></td></tr>
       
        <tr><td><label>Description</label></td></tr>
        
        <tr><td id="descriptions"><input type="text" name="description" id="description"></td></tr>
        
        <tr><td><div id="desc"></div></td></tr>
        
        <tr><td><label> Price </label></td></tr>
        
        <tr><td><input type="number" name="price" id="bPrice"></td></tr>
        
        <tr><td><div id="price"></div></td></tr>
       
        <tr><td><label> Stock </label></td></tr>
        
        <tr><td><input type="text" name="stock" id="stock"></td></tr>
        
        <tr><td><div id="bstock"></div></td></tr>
       
        <tr><td><input type="submit" value="publish book" style="width:170px;"></td></tr>
        </form>
</table>
        </center>
        </div>
        <!-- end .inner -->
    </div>
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
<script src="../../js/home/homeScripts.js">
  </script>
        <script src="../../js/authordash/publishBook.js"></script>
    </body>
</html>

        
