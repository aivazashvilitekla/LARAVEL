<article>
      <?php
         if(isset($_GET["cat"]))
         {

            echo $_GET["cat"];
            $cat = $_GET["cat"];
//            $query = "SELECT * FROM words WHERE engWord='$cat'";
//            $result = mysqli_query($conn, $query);
//            $row = mysqli_fetch_assoc($result);
             $stmt = $conn->prepare("SELECT * FROM words WHERE engWord='$cat'");
             $stmt->execute();
             $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
             $data = $stmt->fetchAll();
            ?>
            <div>
               <br><br>
               ქართული მნიშვნელობა <br>

               <font color=red><?=$data["geoWord"]?></font>
            </div>
            <div>
            </div>
            <?php
         }
      ?>
</article>