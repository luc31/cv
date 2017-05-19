<?php 
include("header.php");


switch (isset($GET_["url"]) ? $GET["url"] : "home_page")
 {
    case "home_page": include("/assets/pages/web/cv.php"); break;
    case "home_page": include("page/admin.php"); break; 
    
      
}

include("footer.php");

 ?>
