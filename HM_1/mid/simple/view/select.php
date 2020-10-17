<article>
      <?php
         if(isset($_GET["cat"]))
         {


            $cat = $_GET["cat"];
//            $query = "SELECT * FROM words WHERE engWord='$cat'";
//            $result = mysqli_query($conn, $query);
//            $row = mysqli_fetch_assoc($result);
             $stmt = $conn->prepare("SELECT * FROM words WHERE engWord='$cat'");
             $stmt->execute();
             $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
             $data = $stmt->fetchAll();
             $conn = null;
//             echo $_GET["cat"];
            ?>
            <div style="padding: 20px">
                <?=$_GET["cat"];?> -
               <font color=red><?=$data[0]["geoWord"]?></font>
            </div>
            <div>
            </div>
            <?php
         }
      ?>
</article>