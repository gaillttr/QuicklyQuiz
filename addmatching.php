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
		<title>Add a matching question</title>

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
				<a href="#" class="active">CS266</a>
				<a href="allquizzes.php" class="start">All Quizzes</a>
				<a href="allquestions.php" class="start">All Questions</a>
				<a href="#" class="start">Dashboard</a>
				<a href="players.php" class="start">Members</a>
			</div>

			<!-- =========================== ADD A QUESTION =========================== -->
			<section class="add-question" id="add-question">
				
				<div class="container">

					<!-- question -->
					<p>
						<div class="question">
                            <label class="subtitle">Question :</label>
							<input type="text" name="question" placeholder="Enter a question" required="">
						</div>
					</p>

					<!-- correct answer -->
					<p>
						<div class="list-main">
							<div class="choice-list">
								<label for="choice-list" class="subtitle">Choice :</label>
								<ol>
									<li>
										<span>
											<input type="text" name="" id="">
											<button type="submit" class="delete-button">
												<i class="material-symbols-outlined">close</i>
											</button>
										</span>
										
									</li>
									<li>
										<span>
											<input type="text" name="" id="">
											<button type="submit" class="delete-button">
												<i class="material-symbols-outlined">close</i>
											</button>
										</span>										
									</li>
									<li>
										<span>
											<input type="text" name="" id="">
											<button type="submit" class="delete-button">
												<i class="material-symbols-outlined">close</i>
											</button>
										</span>
									</li>
									<li>
										<span>
											<input type="text" name="" id="">
											<button type="submit" class="delete-button">
												<i class="material-symbols-outlined">close</i>
											</button>
										</span>
									</li>
								</ol>
							</div>
							<div class="ans-list">
								<label for="ans-list" class="subtitle">Answer :</label>
								<ul>
									<li id="a1">
										<span>
											<input type="text" name="" id="">
											<button type="submit" class="delete-button">
												<i class="material-symbols-outlined">close</i>
											</button>
										</span>
										
									</li>
									<li id="a2">
										<span>
											<input type="text" name="" id="">
											<button type="submit" class="delete-button">
												<i class="material-symbols-outlined">close</i>
											</button>
										</span>
									</li>
									<li id="a3">
										<span>
											<input type="text" name="" id="">
											<button type="submit" class="delete-button">
												<i class="material-symbols-outlined">close</i>
											</button>
										</span>
									</li>
									<li id="a4">
										<span>
											<input type="text" name="" id="">
											<button type="submit" class="delete-button">
												<i class="material-symbols-outlined">close</i>
											</button>
										</span>
									</li>
								</ul>
							</div>
							
						  </div>
					</p>
		
					<!-- submit button -->
					<div>
						<p class="format-button-save">
						 <input type="submit" name="submit" value="Save" style="background-color: hsl(200, 97%, 48%);">
						</p>
					   </div>
					   <div>
						<p class="format-button-back">
						 <input type="submit" name="submit" value="Back" style="background-color: #0FA3B1;">
						</p>
					   </div>
					
					</form>

					</div>

				</div>

			</section>

		</main>

		<!-- =========================== JS =========================== -->
		<script src="js/script.js"></script>		

	</body>
</html>