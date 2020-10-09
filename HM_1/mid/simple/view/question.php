<?php
session_start();
//Set Question Number
$number = $_GET['n'];

$stmt = $conn->prepare("SELECT * FROM questions WHERE question_number = $number");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$data = $stmt->fetchAll();
?>
<article>

</article>
