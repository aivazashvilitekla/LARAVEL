<?php
if(isset($_POST['submit'])){
    $question_number = $_POST['question_number'];
    $question_text = $_POST['question_text'];
    $correct_choice = $_POST['correct_choice'];
    // Choice Array
    $choice = array();
    $choice[1] = $_POST['choice1'];
    $choice[2] = $_POST['choice2'];
    $choice[3] = $_POST['choice3'];
    $choice[4] = $_POST['choice4'];
    $choice[5] = $_POST['choice5'];

    // First Query for Questions Table


    $sql = "INSERT INTO questions (question_number, question_text)
               VALUES (
                  '$question_number',  
                  '$question_text')";
    $conn -> exec($sql);

    //Validate First Query
    if($conn){
        foreach($choice as $option => $value){
            if($value != ""){
                if($correct_choice == $option){
                    $is_correct = 1;
                }else{
                    $is_correct = 0;
                }
                //Second Query for Choices Table
                $sql = "INSERT INTO questions (question_number, question_text)
               VALUES (
                  '$question_number',  
                  '$question_text')";
                $conn -> exec($sql);
                // Validate Insertion of Choices

//                if($insert_row){
//                    continue;
//                }else{
//                    die("2nd Query for Choices could not be executed" . $query);
//
//                }

            }
        }
        $message = "Question has been added successfully";
    }






}
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



$stmt = $conn->prepare("SELECT * FROM questions");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$total = $stmt->fetchColumn();
$next = $total+1;
?>

<article>
    <div class="container">
        <h2>Add A Question</h2>
        <?php if(isset($message)){
            echo "<h4>" . $message . "</h4>";
        } ?>

        <form method="POST" action="">
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
                <label>Choice 3:</label>
                <input type="text" name="choice3">
            </p>
            <p>
                <label>Choice 4:</label>
                <input type="text" name="choice4">
            </p>
            <p>
                <label>Choice 5:</label>
                <input type="text" name="choice5">
            </p>
            <p>
                <label>Correct Option Number</label>
                <input type="number" name="correct_choice">
            </p>
            <input type="submit" name="submit" value ="submit">


        </form>
    </div>
</article>