<?php 
	session_start();
	include('connection.php');
	if (isset($_SESSION['admin'])) {	
		
		if(isset($_POST['submit'])){
			/*echo "<pre>";
			print_r($_POST);
			echo "</pre>";
			exit(); */
			$qno = $_GET['quizid'];
			for($i=1;$i<=$_POST['amount'];$i++){
				$question = $_POST['question'.$i];
				$ans1 = $_POST['choice1'.$i];
				$ans2 = $_POST['choice2'.$i];
				$ans3 = $_POST['choice3'.$i];
				$ans4 = $_POST['choice4'.$i];
				$correct_answer = $_POST['correct_answer'.$i];
				$query = "INSERT INTO questions (qno,question,ans1,ans2,ans3,ans4,correct_answer) VALUES ('$qno','$question','$ans1','$ans2','$ans3','$ans4','$correct_answer')";

				$run = mysqli_query($conn,$query) or die(mysqli_error($conn));
			}
			if (mysqli_affected_rows($conn) > 0) {
				echo "<script>alert('Question successfully added'); </script> ";
			} else {
				"<script>alert('error, try again!'); </script> ";
			} 
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Add a choices question</title>

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
				<a href="home.php" class="active">CS384</a>
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
						<?php 
							include 'connection.php';
								$qno = $_GET['quizid'];
								$query = "SELECT * FROM quizzes WHERE qno = '$qno'" ;
								$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
								$row = mysqli_fetch_array($run);
								$amount = $row['amount'];
								for($i = 1; $i <= $amount; $i++){ ?>
								
									<input type="hidden" name="amount" value=<?php echo $amount ?> >
									<!-- question -->
									<p>
										<div class="question">
											<label class="subtitle">Question :</label>
											<input type="text" name= "question<?php echo $i; ?>" placeholder="Enter a question" required>
										</div>
									</p>

									<!-- choice title -->
									<p>
										<div class="choose-choice">
											<label class="subtitle">Choices :</label>
										</div>
										
									</p>

											<!-- 1st choice -->
									<p>
										<div class="choice-item">
											<input type="text" name="choice1<?php echo $i; ?>" placeholder="Choice #1" required>
										</div>
									</p>
				
									<!-- 2nd choice -->
									<p>
										<div class="choice-item">
											<input type="text" name="choice2<?php echo $i; ?>" placeholder="Choice #2" required="">
										</div>
									</p>
				
									<!-- 3rd choice -->
									<p>
										<div class="choice-item">
											<input type="text" name="choice3<?php echo $i; ?>" placeholder="Choice #3" required="">
										</div>
									</p>
				
									<!-- 4th choice -->
									<p>
										<div class="choice-item">
											<input type="text" name="choice4<?php echo $i; ?>" placeholder="Choice #4" required="">
										</div>
									</p>

									<!-- correct answer -->
									<p>
										<label class="subtitle">Correct answer :</label>

										<select name="correct_answer<?php echo $i; ?>">
											<option value="a">Choice #1 </option>
											<option value="b">Choice #2</option>
											<option value="c">Choice #3</option>
											<option value="d">Choice #4</option>
										</select>
									</p>
									
								
							<?php	}  ?>
							

							<!-- save button -->
							<p class="form-btn">
								<input type="submit" name="submit" value="Save">
							</p>
						</form>

					</div>

				</div>

			</section>

		</main>		

	</body>
</html>