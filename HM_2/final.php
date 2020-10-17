<?php 

session_start();

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
				<h2>Your Result</h2>
				<p>Congratulation You have completed this test succesfully.</p>
				<p>Your <strong>Score</strong> is <?php echo $_SESSION['score']; ?>  </p>
				<?php unset($_SESSION['score']); ?>
                <?php date_default_timezone_set("Asia/Tbilisi"); $newdt = time(); ?>
                <p>Time spent - <?php
                    include 'date.php';
                    $start_date = $dt;
                    $since_start = $start_date->diff($newdt);
                    echo $since_start->s.' seconds<br>';?></p>
                <form method="post" action="index.php">
                    <input type="submit" name="main-menu" value="MAIN">
                </form>

			</div>

	</main>
</body>
</html>