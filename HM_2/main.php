<?php 
include 'db.php';


$stmt = $connection->prepare("SELECT COUNT(*) FROM questions");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$data = $stmt->fetchColumn();
$total_questions = $data;
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
				<p>
					This is a multiple choice quiz to test your Knowledge.
				</p>
				<ul>
					<li><strong>Number of Questions:</strong><?php echo $total_questions; ?> </li>
					<li><strong>Type:</strong> Multiple Choise</li>
					<li><strong>Estimated Time:</strong> <?php echo $total_questions*1.5; ?></li>
				</ul>
				<a href="question.php?n=1" class="start">Start Quize</a>
			</div>
	</main>

