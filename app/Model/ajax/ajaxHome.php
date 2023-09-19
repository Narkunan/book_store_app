<?php
require_once "../../../vendor/autoload.php";
use App\Model\ajax\ajaxModel;
$query=$_GET["title"];
$ajaxmodel=new ajaxModel();
$ajaxmodel->fetchBook();
$arrays =$ajaxmodel->getBook();
$matches=array();
$i=0;
foreach($arrays as $itmes)
{
    //echo $i++;
    //echo $itmes['title'];
    
    if(stripos($itmes['title'],$query)!==false)
    {
      
      $matches[]=$itmes;
    }
}
foreach($matches as $match)
{
    echo "<div id='match'>".$match['title']."</div>";
}