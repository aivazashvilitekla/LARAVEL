<?php  include 'db.php';
if(isset($_POST['submit'])){
	$question_number = $_POST['question_number'];
	$question_text = $_POST['question_text'];
	$correct_choice = $_POST['correct_choice'];
	// Choice Array
	$choice = array();
	$choice[1] = $_POST['choice1'];
	$choice[2] = $_POST['choice2'];

 // First Query for Questions Table

//	$query = "INSERT INTO questions (";
//	$query .= "question_number, question_text )";
//	$query .= "VALUES (";
//	$query .= " '{$question_number}','{$question_text}' ";
//	$query .= ")";

//	$result = mysqli_query($connection,$query);
    $sql = "INSERT INTO questions (question_number, question_text)
  VALUES ('{$question_number}', '{$question_text}')";
    $result = $connection->exec($sql);

	//Validate First Query
	if($result){
		foreach($choice as $option => $value){
			if($value != ""){
				if($correct_choice == $option){
					$is_correct = 1;
				}else{
					$is_correct = 0;
				}
			


				//Second Query for Choices Table
//				$query = "INSERT INTO options (";
//				$query .= "question_number,is_correct,coption)";
//				$query .= " VALUES (";
//				$query .=  "'{$question_number}','{$is_correct}','{$value}' ";
//				$query .= ")";
                $sql = "INSERT INTO options (question_number, is_correct, coption)
  VALUES ('{$question_number}', '{$is_correct}', '{$value}')";
				$insert_row = $connection->exec($sql);
				// Validate Insertion of Choices


				if($insert_row){
					continue;
				}else{
					die("2nd Query for Choices could not be executed");
					
				}

			}
		}
		$message = "Question has been added successfully";
	}

	




}

//		$query = "SELECT * FROM questions";
//		$questions = mysqli_query($connection,$query);
//		$total = mysqli_num_rows($questions);
//		$next = $total+1;

        $stmt = $connection->prepare("SELECT COUNT(*) FROM questions");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetchColumn();
        $total = $data;
        $next = $total+1;
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
				<h2>Add A Question</h2>
				<?php if(isset($message)){
					echo "<h4 style='color: #4CAF50'>" . $message . "</h4>";
				} ?>
								
				<form method="POST" action="add.php">
						<p>
							<label>Question Number:</label>
							<input type="number" name="question_number" value="<?php echo $next;  ?>">
						</p>
						<p>
							<label>Question Text:</label>
							<input type="text" name="question_text">
						</p>
						<p>
							<label>Choice 1:</label>
							<input type="text" name="choice1">
						</p>
						<p>
							<label>Choice 2:</label>
							<input type="text" name="choice2">
						</p>
						<p>
							<label>Correct Option Number</label>
							<input type="number" name="correct_choice">
						</p>
						<input type="submit" name="submit" value ="submit">


				</form>
                <form method="post" action="index.php">
                    <input type="submit" name="main-menu" value ="MAIN">
                </form>
			</div>

	</main>
</body>
</html>