<article>
    <h1>Update</h1>
    <div>
        <table border="1" cellpadding="10" >
            <?php
            $stmt = $conn->prepare("SELECT * FROM words");
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $data = $stmt->fetchAll();
            if(!$data){
                die ("Error!!");
            }
            for($i=0; $i<count($data); $i++){
                echo "<tr>
                  <td>".$data[$i]['engWord']."</td>
                  <td><a href='?id=".$data[$i]["id"]."'><button>EDIT</button></a></td>
               </tr>";
            }
            ?>
        </table>
    </div>
</article>