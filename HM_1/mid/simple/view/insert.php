<?php


if(isset($_POST['insertbutton'])){
      $eng = $_POST['eng'];
      $geo = $_POST['geo'];
    $sql = "INSERT INTO words (engWord, geoWord)
               VALUES (
                  '$eng',  
                  '$geo')";
    $conn -> exec($sql);
    header('Location: ?top=insert');
      
   }          
?>
<article>
     <h1>INSERT</h1>
     <form action="" style="padding:20px" method="post">
         ინგლისური სიტყვა
         <input type="text" name="eng">
         <br>
         <br>
         მნიშვნელობა ქართულად
         <input type="text" name="geo">
         <br>
         <br>
         
         <input type="submit" name="insertbutton" value="INSERT">
     </form>
</article>