<?php session_start(); ?>
<?php include "connection.php";
if (isset($_SESSION['admin'])) {
	$subjectid = $_GET['subjectid'];
	$sql = "SELECT * FROM subjects WHERE snum = '$subjectid'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$subjectid = $row['snum'];

	if (isset($_POST['submit'])) {
		$qname = htmlentities(mysqli_real_escape_string($conn, $_POST['qname']));
		$type = htmlentities(mysqli_real_escape_string($conn, $_POST['type']));
		$amount = htmlentities(mysqli_real_escape_string($conn, $_POST['amount']));
		$snum = $subjectid;

		$query = "INSERT INTO quizzes(qname, qtype, amount,snum) VALUES ('$qname','$type', '$amount' , '$snum') ";
		$run = mysqli_query($conn, $query) or die(mysqli_error($conn));

		$last_id = mysqli_insert_id($conn);
		if (mysqli_affected_rows($conn) > 0) {
			if($type == "choices"){
				echo "<script>alert('Question detail successfully added'); </script> ";
				header("location: addchoices.php?quizid=$last_id");
			}
			else if($type == "short"){
				echo "<script>alert('Question detail successfully added'); </script> ";
				header("location: addshortanswer.php?quizid=$last_id");
			}
			else if($type == "matching"){
				echo "<script>alert('Question detail successfully added'); </script> ";
				header("location: addmatching.php?quizid=$last_id");
			}
		} else {
			"<script>alert('error, try again!'); </script> ";
		} 
	}

?>





	<!DOCTYPE html>
	<html>

	<head>
		<title>Add a question</title>

		<!-- =========================== CSS =========================== -->
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	</head>

	<body>

		<!-- =========================== HEADER =========================== -->
		<header class="header" id="header">
			<!-- nav -->
			<nav class="nav">
				<!-- nav logo -->
				<div class="nav-logo">
					<img src="css/img/Quickly Quiz LOGO.png">
				</div>

				<!-- nav icon -->
				<div class="nav-icon">
					<div class="nav-admin">
						<h3>Sararat S.</h3>
					</div>

					<div class="nav-dropdown-icon">
						<i class="material-symbols-outlined">arrow_drop_down</i>

						<!-- nav dropdown content -->
						<div class="nav-dropdown-content hidden" id="nav-dropdown-content">
							<a href="#">Sararat Srihiranpallop</a>
							<a href="#">sararat@tu.ac.th</a>
							<hr>

							<div class="nav-drodown-item">
								<i class="material-symbols-outlined">account_circle</i>
								<a href="#">Profile</a>
							</div>

							<div class="nav-drodown-item">
								<i class="material-symbols-outlined">settings</i>
								<a href="#">Settings</a>
							</div>

							<div class="nav-drodown-item">
								<i class="material-symbols-outlined">logout</i>
								<a href="#">Logout</a>
							</div>
						</div>
					</div>

					<div class="nav-account-icon">
						<i class="material-symbols-outlined">account_circle</i>
					</div>
				</div>
			</nav>
		</header>

		<!-- =========================== MAIN =========================== -->
		<main>

			<!-- back and forward button -->
			<div class="back-forward-btn">
				<div class="back-btn">
					<i class="material-symbols-outlined">arrow_back</i>
				</div>

				<div class="forward">
					<i class="material-symbols-outlined">arrow_forward</i>
				</div>
			</div>

			<div class="container-menu">
				<a href="home.php" class="active"><?php echo $row['sname'];?></a>
				<a href="allquizzes.php" class="start">All Quizzes</a>
				<a href="allquestions.php" class="start">All Questions</a>
				<a href="#" class="start">Dashboard</a>
				<a href="players.php" class="start">Members</a>
			</div>

			<!-- =========================== ADD A QUESTION =========================== -->
			<section class="add-question" id="add-question">

				<div class="container">

					<!-- container title -->
					<div class="container-title">
						<h1>Add a question</h1>
					</div>

					<!-- add a question form -->
					<div class="form">
						<form method="post" action="">
						<!-- quiz name -->
						<div class="quiz-name">
							<label class="subtitle" style="color: var(--color-header)">Quiz Name :</label>
							<input type="text" name="qname" placeholder="Enter a quiz name" required="">
						</div>

						
							<!-- choose question type -->
							<div class="choose-type">
								<label class="subtitle" style="color: var(--color-header)">Question type :</label>

								<input type="radio" name="type" <?php if (isset($type) && $type == "choices") echo "checked"; ?> value="choices"> Choices

								<input type="radio" name="type" <?php if (isset($type) && $type == "short") echo "checked"; ?> value="short"> Short answers

								<input type="radio" name="type" <?php if (isset($type) && $type == "matching") echo "checked"; ?> value="matching"> Matching
							</div>

							<!-- choose amount of question -->
							<div class="choose-amount">
								<label class="subtitle" style="color: var(--color-header)">Number of questions :</label>
								<input type="text" name="amount" required="">
							</div>


							<!-- next button -->
							<div class="next-btn">
								<a href="#"><input type="submit" name="submit" value="Next"></a>
							</div>
						</form>

					</div>

				</div>

			</section>

		</main>

	</body>

</html>





<?php } else {
	header("location: index.php");
}
?>