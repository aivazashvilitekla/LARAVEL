
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM words WHERE id=$id");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $data = $stmt->fetchAll();
}
if(isset($_POST['updatebutton'])){
    $id = $_POST['id'];
    $engWord = $_POST['engWord'];
    $geoWord = $_POST['geoWord'];

    $sql = "UPDATE words SET engWord='$engWord', geoWord='$geoWord' WHERE id=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header('Location: ?top=update');
}

?>
<article>
    <h1>Edit Nav Item</h1>
    <form action="" style="padding:20px" method="post">
        Eng
        <br>
        <input type="text" name="productName" value="<?=$data[$id]['engWord']?>">
        <br>
        <br>
        Geo
        <br>
        <input type="number" name="quantity" value="<?=$data[$id]['geoWord']?>">
        <br>
        <br>

        <input type="hidden" name="id" value="<?=$data['id']?>">
        <input type="submit" name="updatebutton" value="UPDATE">
    </form>
</article>

