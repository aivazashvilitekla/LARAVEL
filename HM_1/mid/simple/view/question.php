<?php include "../blocks/dbconnect.php"; ?>
<?php session_start(); ?>
<?php
//Set question number
$number = 1;
$stmt = $conn->prepare("SELECT COUNT(*) FROM questions");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$data = $stmt->fetchColumn();
$total_questions = $data;

// Get Question
$query = "select * from `questions` where question_number = '$number'";

//Get result
$stmt = $conn->prepare("select * from `questions` where question_number = '$number'");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$question = $stmt->fetchAll();


// Get Choices

//Get results
$stmt = $conn->prepare("select * from `options` where question_number = '$number'");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$options = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>PHP Quizzer!</title>
</head>
<body>
<div>
    <header>
        <div>
            <h1>PHP Quizzer</h1>
        </div>
    </header>


    <main>
        <div>
            <div>Question <?php echo $number; ?> of <?php echo $total_questions; ?></div>
            <p>
                <?php echo $question[0]['question_text'] ?>
            </p>
            <form method="post" action="process.php">
                <ul class="choices">
                    <?php for($i=0; $i<count($options); $i++): ?>
                        <li><input name="choice" type="radio" value="<?php echo $options[$i]['id']; ?>" />
                            <?php echo $options[$i]['coption']; ?>
                        </li>
                    <?php endfor; ?>
                </ul>
                <input type="submit" value="submit" />
                <input type="hidden" name="number" value="<?php echo $number; ?>" />
            </form>
        </div>
</div>
</main>
</body>
</html>




<?php
//session_start();
////Set Question Number
//$number = $_GET['n'];
//
//$stmt = $conn->prepare("SELECT * FROM questions WHERE question_number = $number");
//$stmt->execute();
//$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//$data = $stmt->fetchAll();
//?>
<article>

</article>
