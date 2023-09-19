<?php 
session_start();
?>
<html>
    <head>
        <title>AUTHORDASH</title>
        <link href="../../../public/assets/css/style.css" rel="stylesheet" type="text/css" />
<style>
   
  </style>

    </head>
    <body>
    <div id="wrapper">
  <div id="inner">
    <div id="header">
      <h1 id="title">Engineering Book Store </h1>
      <h1 id="userloginss"><?php echo $_SESSION['UserName']??"login ";?></h1>
      <nav> <a href="../../../public/assets/html/first.php"><button id="homebutton">Home</button></a> 
           
      <a href="../../../../app/Controller/UserRedirect.php"><button id="homebuttons">Login</button></a>
      </nav>
    <dd class="last"></dd>
 <br>
 <br>
  <br>
  
  
  <dl id="browse">
    <dt>Full Category Lists</dt>
    <dd class="first"> <a href="../../../index.php?action=AuthorWelcome">
                Author Home </a></dd>
       <dd id="option"> <a href="../../index.php?action=publishbook">
                Create  Book </a></dd>
    <dd id="option"> <a href="../../../index.php?action=salesreport">Report</a></dd>
    <dd id="option"> <a href="../../../index.php?action=listbook">List Book</a></dd>
     <dd id="option"> <a href="../../../index.php?action=logout">logout</a></dd>
    <dd id="option"><p onclick="myfun()" id="become">Become User</p></dd>
    <dd id="option"><p onclick="userRedirect()" id="redirect"></p></dd>
               
    </dl>
        <center>
            <?php
           
             $authorname=$_SESSION["UserName"]??"<a href='../../../public/assets/html/accounts/login.php>login</a>";
             
            echo "<h1 id='welcome'>welcome to Publish Dash <br>$authorname</h1>";
            echo "<br>";?>
        <form action="../../../index.php?action=createBook" method="post" enctype="multipart/form-data" autocomplete="off" onsubmit="return validateForm()" id="donoting">
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
        <option value="Aerospace Propulsion"> Aerospace Propulsion</option>
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
<input type='hidden' id='session' value="<?php echo $_SESSION['loggedUser']; ?>" >
<input type="hidden" id="userlogin" value="<?php echo $_SESSION['UserName']; ?>">
        </center>
        </div>
           
    </div>
        
    <div class="clear"></div>
    <div id="footer"> Engineering Book store Phone:044 567890 Email:engineering@bookstore.in &nbsp;
      <div id="footnav">  </div>
        
    </div>
     
  </div>
   
</div>
 

        <script src="../../../public/assets/js/authordash/publishBook.js"></script>
        <script src="../../../public/assets/js/authordash/authordash.js"></script>
        <script src="../../../public/assets/js/home/home.js"></script>
    </body>
</html>

        
