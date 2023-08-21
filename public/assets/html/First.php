<html>
    <head>
        <title>Home</title>
        <style>
            img
            {
                width: 100;
                height: 100;
                text-align: center;
            }
            #title
            {
               text-align: center;
            }
            #price
            {
                text-align: center;
            }
            </style>
    </head>
    <body>
   
        <br>
        <br>
        <br>
        <nav> 
            <a href="author/login.html"> Author Login</a>
            <a href="author/register.html">Author register</a>
            <a href="user/login.html">User Login</a>
            <a href="user/register.html">User register</a>
        </nav>

    <?php
    if(file_exists("../../../vendor/autoload.php"))
    {
        
        require_once "../../../vendor/autoload.php";
       
    }
    use App\Model\Home\IndexModel;

    $IndexModel=new IndexModel();
    $IndexModel->FetchProduct();
    $product=$IndexModel->getProductData();
    $i=0;
    foreach($product as $products)
    {
       
       $imagePath="../../../app/Model/upload/".$products["coverpage"];
       echo "<div id='price'><img src='$imagePath'></div>";
       $url="../../../app/Controller/Home/indexController.php?id=".$product[$i]["bookid"];
       echo "<div id='price'>BOOK TITLE</div> <a href='$url'>"."<div id='title'>".$products['title']."</div>"."</a>";
       echo "<div id='price'>PRICE</div>"."<div id='price'>".$products["price"]."</div>";
       echo "<br>";
       $i++;
       

     }?>
    
    </body>
</html>