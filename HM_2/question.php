<?php
date_default_timezone_set("Asia/Tbilisi");
global $dt;
$dt = date("h:i:sa");
	include 'db.php';
	session_start(); 
	//Set Question Number
	$number = $_GET['n'];

	//Query for the Question

	// Get the question
    $stmt = $connection->prepare("SELECT * FROM questions WHERE question_number = $number");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $question = $stmt->fetchAll();
	//Get Choices
    $stmt = $connection->prepare("SELECT * FROM options WHERE question_number = $number");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $choices = $stmt->fetchAll();


	// Get Total questions
    $stmt = $connection->prepare("SELECT COUNT(*) FROM questions");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $data = $stmt->fetchColumn();
    $total_questions = $data;



$conn = null;
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

	<header>
		<div class="container">
		</div>
	</header>

	<main>
			<div class="container">
				<div class="current">Question <?php echo $number; ?> of <?php echo $total_questions; ?> </div>
				<p class="question"><?php echo $question[0]['question_text']; ?> </p>
				<form method="POST" action="process.php">
					<ul class="choicess">
                        <?php for($i=0; $i<count($choices); $i++): ?>
                            <li><input name="choice" type="radio" value="<?php echo $choices[$i]['id']; ?>" />
                                <?php echo $choices[$i]['coption']; ?>
                            </li>
                        <?php endfor; ?>
					</ul>
					<input type="hidden" name="number" value="<?php echo $number; ?>">
					<input type="submit" name="submit" value="Submit">
				</form>
                <form method="post" action="index.php">
                    <input type="submit" name="main-menu" value ="MAIN">
                    
                </form>
			</div>
	</main>
</body>
</html>