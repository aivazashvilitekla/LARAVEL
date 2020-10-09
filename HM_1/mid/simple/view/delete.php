<?php
    $stmt = $conn->prepare("SELECT id, engWord FROM words");
    $stmt->execute();
      if(isset($_GET['remove'])){
         $remove = $_GET['remove'];
          $sql = "DELETE FROM words WHERE id='$remove'";
          $data = $conn->exec($sql);
          header('Location: ?top=delete');
      }
?>
<article>
      <h1>DELETE</h1>
      <?php
          for($i=0; $i<count($data); $i++){
              if($data[$i]["engWord"]==""){
                  $data[$i]["engWord"] = "delete me!!!";
              }
              echo "<p><a href='?top=delete&remove=".$data[$i]["id"]."'>".$data[$i]["engWord"]."</a></p>";
          }
      ?>
</article>