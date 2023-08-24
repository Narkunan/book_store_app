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
    
    #text
    {
      position: absolute;
      top: 78px;
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
class EditSpecificBookView
{
    public function displayBook($books)
    {
        ?>
        <center>  
      <form action='../../Controller/authordash/EditedBook.php' method='post' enctype='multipart/form-data' autocomplete='off' onsubmit="return validateForm()">
      <table id='tables'>
     <tr> <td><label>Book Title</label></td></tr>
     <tr><td> <input type='text' name='booktitle' value="<?php echo $books[0]['title'];?>" id='booktitles'></td></tr>
      
      <tr><td><div id='btitle'></div></td></tr>
      
      <tr><td><label>Category</label></td></tr>
      
      <tr><td style='font-size:20px;'><select name='book_category' id='bcategory'>
        <option value="<?php echo $books[0]['category'];?>"><?php echo $books[0]['category'];?></option>
        <option value='Computer Science Engineering'>Computer Science Engineering</option>
        <option value='Mechanical Engineering'>Mechanical Engineering</option>
        <option value='Electrical Engineering'>Electrical Enginering</option>
        <option value='Civil Engineering'>Civil Engineering</option>
        <option value='Aeronautical Engineering'>Aeronautical Engineering</option>
        <option value='Marine Engineering'>Marine Engineering</option>
        <option value='BioMedical Engineering'>BioMedical Engineering</option>
        <option value='chemical Engineering'>chemical Engineering</option>
        <option value='AutoMobile Engineering'>AutoMobile Engineering</option>
        </select>
      </td></tr>
      
      <div id='category'></div>
      
      <tr><td><label> Sub Category</label></td></tr>
      
     <tr><td> <select name='book_subcategory' id='scategory' >
     <option value="<?php echo $books[0]['sub_category'];?>"><?php echo $books[0]['sub_category'];?></option>
      <option value='programming'>programming</option>
      <option value='java'>Java</option>
      <option value='Web development'>Web development</option>
      <option value='C++'>C++</option>
      <option value='database'>DataBase</option>
      <option value='MYSQL'>MYSQL</option>
      <option value='DataStructure and algorithm'>DataStructure and algorithm</option>
      <option value='network'>network</option>
      <option value='Mobile Computing'>Mobile Computing</option>
      <option value='git hub'>git hub</option>
      <option value='operating system'>operating system</option>
      <option value='cryptography'>cryptography</option>
      <option value='Engineering Mathematics'>Engineering Mathematics</option>
      <option value='physics'>physics</option>
      <option value='Communication Theory'>Communication Theory</option>
      <option value='Analog electronics'>Analog electronics</option>
      <option value='Digital Electronics'>Digital Electronics</option>
      <option value='microprocessor'>microprocessor</option>
      <option value='Microcontroller'>Microcontroller</option>
      <option value='Fluid Mechanics'>Fluid Mechanics</option>
      <option value='Solid Mechanics'>Solid Mechanics</option>
      <option value='ThermoDynamics'>ThermoDynamics</option>
      <option value='Tissue Engineering'>Tissue Engineering</option>
      <option value='anatomy'>Anatomy</option>
      <option value='Automotive Pollution and Control'>Automotive Pollution and Control</option>
</select>
     </td></tr>
      
      <div id='bscategory'></div>
      
      <tr><td><label>Description</label></td></tr>
      
      <tr><td id='descriptions'><input type='text' name='description' id='description' value="<?php echo $books[0]['description'];?>"></td></tr>
      
      <tr><td><div id='desc'></div></td></tr>
      
      <tr><td><label> Price </label></td></tr>
      
      <tr><td><input type='number' value= "<?php echo $books[0]['price']; ?>" name='price' id='bPrice'></td></tr>
      
      <tr><td><div id='price'></div></td></tr>
     
      <tr><td><label> Stock </label></td></tr>
      
      <tr><td><input type='text' value = "<?php echo $books[0]['stock'];?>"name='stock' id='stock'></td></tr>
      
      <tr><td><div id='bstock'></div></td></tr>
      <tr><td><input type='hidden' value="<?php echo $books[0]['bookid'];?>" name='bookid'></td></tr>
      <tr><td><input type='submit' value='Update Book' style='width:170px;'></td></tr>
      </form>
</table>
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
<script>
var titlefield=document.getElementById('booktitles');
var titlefieldDisplayError=document.getElementById('btitle');
 var description=document.getElementById('description');
 var descriptionErrorMsg=document.getElementById('desc');
 var price=document.getElementById('bPrice');
 var priceErrorMsg=document.getElementById('price');
 var stock=document.getElementById('stock');
 var stockErrorMsg=document.getElementById('bstock');
 titlefield.addEventListener('input',validateName);
 function validateName()
 {
  var titles=document.getElementById('btitle');
  var titleValue=titlefield.value;
  console.log(titleValue.length);
  if(titleValue.length>=10&&titleValue.length<=50)
  {
      titles.style.color='green';
      titles.innerHTML='A Valid Title';
  }
  else
  {
      titles.style.color='red';
      titles.innerHTML='Not Valid Title';
  }
 }
 function validateForm()
 {
    if(titlefield.value.length<=0)
    {
      titlefieldDisplayError.style.color='red';
      titlefieldDisplayError.innerHTML='enter a title';
      return false;
    }
    else if(description.value.length<=50)
    {
      descriptionErrorMsg.style.color='red';
      descriptionErrorMsg.innerHTML='enter description with minimum 50 characters';
      return false;
    }
    else if(price.value.length<=0||price.value<=10)
    {
      priceErrorMsg.style.color='red';
      priceErrorMsg.innerHTML='enter a price greater than 10';
      return false;
    }
    else if(stock.value.length<=0||stock.value<=1)
    {
      stockErrorMsg.style.color='red';
      stockErrorMsg.innerHTML='enter a stock greater than 1';
      return false;
    }
 }
 

 </script>"
 ;
 echo "";
    }
}?>

<script src="../../../public/assets/js/home/homeScripts.js">
  </script>
    </body>
</html>