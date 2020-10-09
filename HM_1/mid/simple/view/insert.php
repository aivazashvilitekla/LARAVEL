<?php


if(isset($_POST['insertbutton'])){
      $eng = $_POST['eng'];
      $geo = $_POST['geo'];
      if((strlen($eng)<2 || strlen($eng)>50) || (strlen($geo)<2 || strlen($geo)>50)){
         echo "<font color=red>wrong length</font>";
      }else{
          $sql = "INSERT INTO words (engWord, geoWord)
               VALUES (
                  '$eng',  
                  '$geo')";
          $conn -> exec($sql);
          header('Location: ?top=insert');
      }
      
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