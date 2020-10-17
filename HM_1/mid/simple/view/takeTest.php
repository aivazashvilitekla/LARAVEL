<?php
$servername = "localhost";
$dbname = "dictionary";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$stmt = $conn->prepare("SELECT COUNT(*) FROM questions");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$data = $stmt->fetchColumn();
$total_questions = $data;

$conn = null;
?>
<article>
    <h2>Test Your Knowledge</h2>
    <ul>
        <li><strong>Number of Questions:</strong><?php echo $total_questions; ?> </li>
        <li><strong>Type:</strong> Multiple Choice</li>

    </ul>

    <a href="view/question.php?n=1" class="start">Start Quiz</a>
</article>