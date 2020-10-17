<?php include "../blocks/dbconnect.php"; ?>
<?php session_start(); ?>
<?php 

      //Check to see if score is set_error_handler
	if (!isset($_SESSION['score'])){
	   $_SESSION['score'] = 0;
	}

//Check if form was submitted
if($_POST){
	$number = $_POST['number'];
	$selected_choice = $_POST['choice'];
	$next=$number+1;
	$total=4;

	//Get total number of questions
    $stmt = $conn->prepare("SELECT COUNT(*) FROM questions");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $data = $stmt->fetchColumn();
    $total_questions = $data;

	//Get correct choice
    $stmt = $conn->prepare("select * from `options` where question_number = $number and is_correct=1");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $question = $stmt->fetchAll();
    $correct_choice=$question['id'];

//	$q = "select * from `choices` where question_number = $number and is_correct=1";
//	$result = $mysqli->query($q) or die($mysqli->error.__LINE__);
//	$row = $result->fetch_assoc();
//	$correct_choice=$row['id'];



	//compare answer with result
	if($correct_choice == $selected_choice){
		$_SESSION['score']++;
	}

	if($number == $total_questions){
		header("Location: final.php");
		exit();
	} else {
	        header("Location: question.php?n=".$next."&score=".$_SESSION['score']);
	}
}
?>