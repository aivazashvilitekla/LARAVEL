<div class="body">
   <nav style="overflow: scroll">
      <ul>
         <?php
             $stmt = $conn->prepare("SELECT * FROM words");
             $stmt->execute();
             $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
             $data = $stmt->fetchAll();

            if(!$data){
               die ("Error!!");
            }
             for($i=0; $i<count($data); $i++){
                 echo "<li><a href='?cat=".$data[$i]["engWord"]."'>".$data[$i]["engWord"]."</a></li>";
                 echo "<br>";
             }
//
         ?>
      </ul>
   </nav>
   <?php
      if(isset($_GET['top']) && $_GET['top']=="insert"){
         include "view/insert.php"; 
      }else if(isset($_GET['top']) && $_GET['top']=="delete"){
         include "view/delete.php"; 
      }
      else if(isset($_GET['top']) && $_GET['top']=="update"){
          include "view/update.php";
      }
      else if(isset($_GET['top']) && $_GET['top']=="test"){
         include "view/test.php"; 
      }
      else if(isset($_GET['top']) && $_GET['top']=="takeTest"){
          include "view/takeTest.php";
      }
      else if(isset($_GET['top']) && $_GET['top']=="add"){
          include "view/addQuestion.php";
      }
      else if(isset($_GET['top']) && $_GET['top']=="submit"){
          include "view/addQuestion.php";
      }
      else if(isset($_GET['id']) && $_GET['id']!=""){
          include "view/edit.php";
      }
      else{
         include "view/select.php"; 
      }
   ?>
</div>